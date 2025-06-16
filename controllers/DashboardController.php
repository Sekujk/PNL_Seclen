<?php
class DashboardController {
    private $denunciaModel;

    public function __construct() {
        $this->denunciaModel = new Denuncia();
    }

    public function index() {
        try {
            $stats = [
                'total' => $this->denunciaModel->contarDenuncias(),
                'pendientes' => $this->denunciaModel->contarDenunciasPorEstado('pendiente'),
                'en_proceso' => $this->denunciaModel->contarDenunciasPorEstado('en_proceso'),
                'resueltas' => $this->denunciaModel->contarDenunciasPorEstado('resuelto')
            ];

            $denuncias_recientes = $this->denunciaModel->obtenerDenunciasRecientes(5);
            
            view('dashboard/index', [
                'stats' => $stats,
                'denuncias_recientes' => $denuncias_recientes
            ]);
        } catch (Exception $e) {
            $_SESSION['error'] = 'Error al cargar el dashboard: ' . $e->getMessage();
            view('dashboard/index', [
                'stats' => [
                    'total' => 0,
                    'pendientes' => 0,
                    'en_proceso' => 0,
                    'resueltas' => 0
                ],
                'denuncias_recientes' => []
            ]);
        }
    }

    public function denunciasPorCiudadano($ciudadano) {
        $denuncias = $this->denunciaModel->obtenerDenunciasPorCiudadano($ciudadano);
        
        $data = [
            'denuncias' => $denuncias,
            'ciudadano' => $ciudadano
        ];
        
        view('dashboard/denuncias_ciudadano', $data);
    }

    public function denunciasPorUbicacion($ubicacion) {
        $denuncias = $this->denunciaModel->obtenerDenunciasPorUbicacion($ubicacion);
        
        $data = [
            'denuncias' => $denuncias,
            'ubicacion' => $ubicacion
        ];
        
        view('dashboard/denuncias_ubicacion', $data);
    }

    public function historial() {
        $denuncias = $this->denunciaModel->obtenerTodasLasDenuncias();
        
        $data = [
            'denuncias' => $denuncias
        ];
        
        view('dashboard/historial', $data);
    }
} 