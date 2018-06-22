<?php
namespace Mini\Model;
use Mini\Core\Model;

class Eps extends Model{

    private $id;
    private $nombre;
    private $estado;

    public function __SET($attr, $valor){
        $this->$attr = $valor;
    }

    public function __GET($attr){
        return $this->$attr;
    }

    public function validarNombre(){
        $sql = "SELECT * FROM eps WHERE nombreEps = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->nombre);
        $query->execute();
        if($query->fetchColumn() > 0){
            return true;
        }else{
            return false;
        }
    }
    public function registrar()
    {
        $sql = "INSERT INTO eps (ideps,nombreEps) VALUES (null,?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->nombre);
        return  $query->execute();
    }

    public function editar()
    {
        $sql = "SELECT ideps,nombreEps, estadoEps FROM eps WHERE ideps = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->id);
        $query->execute();
        return $query->fetch();
    }

    public function listar()
    {
        $sql = "SELECT ideps,nombreEps, estadoEps FROM eps";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
        
    }

    public function listarActivo()
    {
        $sql = "SELECT ideps,nombreEps, estadoEps FROM eps WHERE estadoEps= 'Activo' ";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
        
    }

    public function modificar(){
        $sql = "UPDATE eps SET  nombreEps = ? WHERE ideps = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->nombre);
        $query->bindParam(2, $this->id);
        return  $query->execute();
    }

    public function cambiarEstado(){
        $sql = "UPDATE eps SET estadoEps = ? WHERE ideps = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->estado);
        $query->bindParam(2, $this->id);
        return  $query->execute();
    }
    
}
?>