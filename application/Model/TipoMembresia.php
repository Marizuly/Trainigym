<?php
namespace Mini\Model;
use Mini\Core\Model;

class TipoMembresia extends Model{

    private $id;
    private $nombre;
    private $duracion;
    private $estado;

    public function __SET($attr, $valor){
        $this->$attr = $valor;
    }

    public function __GET($attr){
        return $this->$attr;
    }

    public function validarNombre(){
        // $sql = "CALL listarTipoMembresia(?)";
        $sql = "SELECT * FROM tipoMembresia WHERE nombreTipoMembresia = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->nombre);
        $query->execute();

        if($query->fetchColumn() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function hola(){
        $sql = "SELECT * FROM tipoMembresia where idtipoMembresia = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->id);
        $query->execute();
        return $query->fetch();
    }
    
    public function registrar()
    {
        // $sql= "CALL SP_registrarTM(?,?)";
        $sql = "INSERT INTO tipoMembresia (idtipoMembresia,nombreTipoMembresia) VALUES (null,?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->nombre);
        return  $query->execute();
    }

    public function editar()
    {
        $sql = "SELECT idtipoMembresia,nombreTipoMembresia, estadoTM FROM tipoMembresia WHERE idtipoMembresia = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->id);
        $query->execute();
        return $query->fetch();
    }

    public function listar()
    {
        $sql = "SELECT * FROM tipoMembresia";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function listarActivo()
    {
        $sql = "SELECT * FROM tipoMembresia WHERE estadoTM='Activo'";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function modificar(){
        $sql = "UPDATE tipoMembresia SET  nombreTipoMembresia = ?WHERE idtipoMembresia = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->nombre);
        $query->bindParam(2, $this->id);
        return  $query->execute();
    }

    public function cambiarEstado(){
        $sql = "UPDATE tipoMembresia SET estadoTM = ? WHERE idtipoMembresia = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->estado);
        $query->bindParam(2, $this->id);
        return  $query->execute();
    }    
}
?>