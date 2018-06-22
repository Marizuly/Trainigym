<?php
namespace Mini\Model;
use Mini\Core\Model;

class Genero extends Model{

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
        $sql="SELECT * FROM genero WHERE nombreGenero = ?";
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
        $sql = "CALL SP_insertarGenero";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->nombre);
        return  $query->execute();
    }

    public function editar()
    {
        $sql = "SELECT idgenero,nombreGenero FROM genero WHERE idgenero = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->id);
        $query->execute();
        return $query->fetch();
    }

    public function listar()
    {
        $sql ="SELECT * FROM genero";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
        
    }
//activos
    public function listarActivo()
    {
        $sql = "SELECT idgenero,nombreGenero,estadoGenero FROM genero WHERE estadoGenero ='Activo'";
        $query = $this->db->prepare($sql);
        $query->execute();    
        return $query->fetchAll();
        
    }

    public function modificar(){
        $sql = "UPDATE genero SET  nombreGenero = ? WHERE idgenero = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->nombre);
        $query->bindParam(2, $this->id);
        return  $query->execute();
    }

    public function cambiarEstado(){
        $sql = "UPDATE genero SET estadoGenero = ? WHERE idgenero = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->estado);
        $query->bindParam(2, $this->id);
        return  $query->execute();
    }
    
}
?>