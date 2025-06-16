<?php

class DenunciaController {
    private $denunciaModel;

    public function __construct() {
        $this->denunciaModel = new Denuncia();
    }


    public function index() {
        try {
            $denuncias = $this->denunciaModel->obtenerTodasLasDenuncias();
            view('denuncias/index', ['denuncias' => $denuncias]);
        } catch (Exception $e) {
            $_SESSION['error'] = 'Error al cargar las denuncias: ' . $e->getMessage();
            view('denuncias/index', ['denuncias' => []]);
        }
    }


    public function crear() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $datos = [
                    'titulo' => trim($_POST['titulo']),
                    'descripcion' => trim($_POST['descripcion']),
                    'ubicacion' => trim($_POST['ubicacion']),
                    'estado' => 'pendiente',
                    'ciudadano' => trim($_POST['ciudadano']),
                    'telefono_ciudadano' => trim($_POST['telefono_ciudadano'])
                ];

                if($this->denunciaModel->crearDenuncia($datos)) {
                    $_SESSION['success'] = 'Denuncia creada exitosamente';
                    redirect('?controller=denuncias');
                } else {
                    throw new Exception('Error al crear la denuncia');
                }
            } catch (Exception $e) {
                $_SESSION['error'] = $e->getMessage();
                view('denuncias/create', ['datos' => $datos]);
            }
        } else {
            view('denuncias/create');
        }
    }


    public function editar() {
        try {
            $id = isset($_GET['id']) ? $_GET['id'] : null;
            
            if(!$id) {
                throw new Exception('ID de denuncia no especificado');
            }

            $denuncia = $this->denunciaModel->obtenerDenunciaPorId($id);
            
            if(!$denuncia) {
                throw new Exception('Denuncia no encontrada');
            }

            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                $datos = [
                    'id' => $id,
                    'titulo' => trim($_POST['titulo']),
                    'descripcion' => trim($_POST['descripcion']),
                    'ubicacion' => trim($_POST['ubicacion']),
                    'estado' => trim($_POST['estado']),
                    'ciudadano' => trim($_POST['ciudadano']),
                    'telefono_ciudadano' => trim($_POST['telefono_ciudadano'])
                ];

                if($this->denunciaModel->actualizarDenuncia($datos)) {
                    $_SESSION['success'] = 'Denuncia actualizada exitosamente';
                    redirect('?controller=denuncias');
                } else {
                    throw new Exception('Error al actualizar la denuncia');
                }
            }

            view('denuncias/edit', ['denuncia' => $denuncia]);
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            redirect('?controller=denuncias');
        }
    }


    public function eliminar() {
        try {
            $id = isset($_GET['id']) ? $_GET['id'] : null;
            
            if(!$id) {
                throw new Exception('ID de denuncia no especificado');
            }

            if($this->denunciaModel->eliminarDenuncia($id)) {
                $_SESSION['success'] = 'Denuncia eliminada exitosamente';
            } else {
                throw new Exception('Error al eliminar la denuncia');
            }
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
        }
        
        redirect('?controller=denuncias');
    }


    public function actualizarEstado() {
        try {
            $id = isset($_GET['id']) ? $_GET['id'] : null;
            $estado = isset($_GET['estado']) ? $_GET['estado'] : null;
            
            if(!$id || !$estado) {
                throw new Exception('Parámetros incompletos');
            }

            if($this->denunciaModel->actualizarEstado($id, $estado)) {
                $_SESSION['success'] = 'Estado actualizado exitosamente';
            } else {
                throw new Exception('Error al actualizar el estado');
            }
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
        }
        
        redirect('?controller=denuncias');
    }
}
?> 