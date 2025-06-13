<?php
class Denuncia {
    private $conn;
    private $table_name = "denuncias";

    public $id;
    public $titulo;
    public $descripcion;
    public $ubicacion;
    public $estado;
    public $ciudadano;
    public $telefono_ciudadano;
    public $fecha_registro;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create new complaint
    public function create() {
        $query = "INSERT INTO " . $this->table_name . "
                (titulo, descripcion, ubicacion, estado, ciudadano, telefono_ciudadano)
                VALUES
                (:titulo, :descripcion, :ubicacion, :estado, :ciudadano, :telefono_ciudadano)";

        $stmt = $this->conn->prepare($query);

        // Sanitize input
        $this->titulo = htmlspecialchars(strip_tags($this->titulo));
        $this->descripcion = htmlspecialchars(strip_tags($this->descripcion));
        $this->ubicacion = htmlspecialchars(strip_tags($this->ubicacion));
        $this->estado = htmlspecialchars(strip_tags($this->estado));
        $this->ciudadano = htmlspecialchars(strip_tags($this->ciudadano));
        $this->telefono_ciudadano = htmlspecialchars(strip_tags($this->telefono_ciudadano));

        // Bind values
        $stmt->bindParam(":titulo", $this->titulo);
        $stmt->bindParam(":descripcion", $this->descripcion);
        $stmt->bindParam(":ubicacion", $this->ubicacion);
        $stmt->bindParam(":estado", $this->estado);
        $stmt->bindParam(":ciudadano", $this->ciudadano);
        $stmt->bindParam(":telefono_ciudadano", $this->telefono_ciudadano);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Read all complaints with pagination
    public function read($page = 1, $records_per_page = 10, $search = "") {
        $offset = ($page - 1) * $records_per_page;
        
        $where = "";
        if(!empty($search)) {
            $where = "WHERE titulo LIKE :search 
                     OR ciudadano LIKE :search 
                     OR ubicacion LIKE :search";
        }

        $query = "SELECT * FROM " . $this->table_name . " 
                 " . $where . "
                 ORDER BY fecha_registro DESC 
                 LIMIT :offset, :records_per_page";

        $stmt = $this->conn->prepare($query);
        
        if(!empty($search)) {
            $search = "%{$search}%";
            $stmt->bindParam(":search", $search);
        }
        
        $stmt->bindParam(":offset", $offset, PDO::PARAM_INT);
        $stmt->bindParam(":records_per_page", $records_per_page, PDO::PARAM_INT);
        
        $stmt->execute();
        
        return $stmt;
    }

    // Get total number of records
    public function getTotalRecords($search = "") {
        $where = "";
        if(!empty($search)) {
            $where = "WHERE titulo LIKE :search 
                     OR ciudadano LIKE :search 
                     OR ubicacion LIKE :search";
        }

        $query = "SELECT COUNT(*) as total FROM " . $this->table_name . " " . $where;
        $stmt = $this->conn->prepare($query);

        if(!empty($search)) {
            $search = "%{$search}%";
            $stmt->bindParam(":search", $search);
        }

        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row['total'];
    }

    // Read single complaint
    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row) {
            $this->titulo = $row['titulo'];
            $this->descripcion = $row['descripcion'];
            $this->ubicacion = $row['ubicacion'];
            $this->estado = $row['estado'];
            $this->ciudadano = $row['ciudadano'];
            $this->telefono_ciudadano = $row['telefono_ciudadano'];
            $this->fecha_registro = $row['fecha_registro'];
            return true;
        }
        return false;
    }

    // Update complaint
    public function update() {
        $query = "UPDATE " . $this->table_name . "
                SET
                    titulo = :titulo,
                    descripcion = :descripcion,
                    ubicacion = :ubicacion,
                    estado = :estado,
                    ciudadano = :ciudadano,
                    telefono_ciudadano = :telefono_ciudadano
                WHERE
                    id = :id";

        $stmt = $this->conn->prepare($query);

        // Sanitize input
        $this->titulo = htmlspecialchars(strip_tags($this->titulo));
        $this->descripcion = htmlspecialchars(strip_tags($this->descripcion));
        $this->ubicacion = htmlspecialchars(strip_tags($this->ubicacion));
        $this->estado = htmlspecialchars(strip_tags($this->estado));
        $this->ciudadano = htmlspecialchars(strip_tags($this->ciudadano));
        $this->telefono_ciudadano = htmlspecialchars(strip_tags($this->telefono_ciudadano));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind values
        $stmt->bindParam(":titulo", $this->titulo);
        $stmt->bindParam(":descripcion", $this->descripcion);
        $stmt->bindParam(":ubicacion", $this->ubicacion);
        $stmt->bindParam(":estado", $this->estado);
        $stmt->bindParam(":ciudadano", $this->ciudadano);
        $stmt->bindParam(":telefono_ciudadano", $this->telefono_ciudadano);
        $stmt->bindParam(":id", $this->id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Delete complaint
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(1, $this->id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?> 