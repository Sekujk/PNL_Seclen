<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Denuncia.php';

class DenunciaController {
    private $db;
    private $denuncia;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->denuncia = new Denuncia($this->db);
    }

    public function index() {
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $search = isset($_GET['search']) ? $_GET['search'] : "";
        $records_per_page = 10;

        $stmt = $this->denuncia->read($page, $records_per_page, $search);
        $total_records = $this->denuncia->getTotalRecords($search);
        $total_pages = ceil($total_records / $records_per_page);

        include __DIR__ . '/../views/denuncias/index.php';
    }

    public function create() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->denuncia->titulo = $_POST['titulo'];
            $this->denuncia->descripcion = $_POST['descripcion'];
            $this->denuncia->ubicacion = $_POST['ubicacion'];
            $this->denuncia->estado = $_POST['estado'];
            $this->denuncia->ciudadano = $_POST['ciudadano'];
            $this->denuncia->telefono_ciudadano = $_POST['telefono_ciudadano'];

            if($this->denuncia->create()) {
                header("Location: index.php?action=index");
                exit();
            }
        }
        include __DIR__ . '/../views/denuncias/create.php';
    }

    public function edit() {
        if(!isset($_GET['id'])) {
            header("Location: index.php?action=index");
            exit();
        }

        $this->denuncia->id = $_GET['id'];
        $this->denuncia->readOne();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->denuncia->titulo = $_POST['titulo'];
            $this->denuncia->descripcion = $_POST['descripcion'];
            $this->denuncia->ubicacion = $_POST['ubicacion'];
            $this->denuncia->estado = $_POST['estado'];
            $this->denuncia->ciudadano = $_POST['ciudadano'];
            $this->denuncia->telefono_ciudadano = $_POST['telefono_ciudadano'];

            if($this->denuncia->update()) {
                header("Location: index.php?action=index");
                exit();
            }
        }
        include __DIR__ . '/../views/denuncias/edit.php';
    }

    public function delete() {
        if(isset($_GET['id'])) {
            $this->denuncia->id = $_GET['id'];
            if($this->denuncia->delete()) {
                header("Location: index.php?action=index");
                exit();
            }
        }
        header("Location: index.php?action=index");
        exit();
    }
}
?> 