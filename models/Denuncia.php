<?php

class Denuncia {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function obtenerTodasLasDenuncias() {
        $this->db->query('SELECT * FROM denuncias ORDER BY fecha_registro DESC');
        return $this->db->resultSet();
    }


    public function obtenerDenunciaPorId($id) {
        $this->db->query('SELECT * FROM denuncias WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }


    public function obtenerTotalDenuncias() {
        $this->db->query('SELECT COUNT(*) as total FROM denuncias');
        return $this->db->single()->total;
    }


    public function obtenerDenunciasPorEstado($estado) {
        $this->db->query('SELECT COUNT(*) as total FROM denuncias WHERE estado = :estado');
        $this->db->bind(':estado', $estado);
        return $this->db->single()->total;
    }


    public function obtenerDenunciasRecientes($limite) {
        $this->db->query('SELECT * FROM denuncias ORDER BY fecha_registro DESC LIMIT :limite');
        $this->db->bind(':limite', $limite);
        return $this->db->resultSet();
    }


    public function obtenerDenunciasPorCiudadano($ciudadano) {
        $this->db->query('SELECT * FROM denuncias WHERE ciudadano = :ciudadano ORDER BY fecha_registro DESC');
        $this->db->bind(':ciudadano', $ciudadano);
        return $this->db->resultSet();
    }


    public function obtenerDenunciasPorUbicacion($ubicacion) {
        $this->db->query('SELECT * FROM denuncias WHERE ubicacion = :ubicacion ORDER BY fecha_registro DESC');
        $this->db->bind(':ubicacion', $ubicacion);
        return $this->db->resultSet();
    }


    public function crearDenuncia($datos) {
        $this->db->query('INSERT INTO denuncias (titulo, descripcion, ubicacion, estado, ciudadano, telefono_ciudadano) 
                         VALUES (:titulo, :descripcion, :ubicacion, :estado, :ciudadano, :telefono_ciudadano)');
        
        $this->db->bind(':titulo', $datos['titulo']);
        $this->db->bind(':descripcion', $datos['descripcion']);
        $this->db->bind(':ubicacion', $datos['ubicacion']);
        $this->db->bind(':estado', $datos['estado']);
        $this->db->bind(':ciudadano', $datos['ciudadano']);
        $this->db->bind(':telefono_ciudadano', $datos['telefono_ciudadano']);

        return $this->db->execute();
    }


    public function actualizarEstado($id, $estado) {
        $this->db->query('UPDATE denuncias SET estado = :estado WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':estado', $estado);
        return $this->db->execute();
    }


    public function eliminarDenuncia($id) {
        $this->db->query('DELETE FROM denuncias WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }


    public function actualizarDenuncia($datos) {
        $this->db->query('UPDATE denuncias 
                         SET titulo = :titulo, 
                             descripcion = :descripcion, 
                             ubicacion = :ubicacion, 
                             estado = :estado, 
                             ciudadano = :ciudadano, 
                             telefono_ciudadano = :telefono_ciudadano 
                         WHERE id = :id');
        
        $this->db->bind(':id', $datos['id']);
        $this->db->bind(':titulo', $datos['titulo']);
        $this->db->bind(':descripcion', $datos['descripcion']);
        $this->db->bind(':ubicacion', $datos['ubicacion']);
        $this->db->bind(':estado', $datos['estado']);
        $this->db->bind(':ciudadano', $datos['ciudadano']);
        $this->db->bind(':telefono_ciudadano', $datos['telefono_ciudadano']);

        return $this->db->execute();
    }


    public function contarDenuncias() {
        $this->db->query('SELECT COUNT(*) as total FROM denuncias');
        $result = $this->db->single();
        return $result->total;
    }


    public function contarDenunciasPorEstado($estado) {
        $this->db->query('SELECT COUNT(*) as total FROM denuncias WHERE estado = :estado');
        $this->db->bind(':estado', $estado);
        $result = $this->db->single();
        return $result->total;
    }
}
?> 