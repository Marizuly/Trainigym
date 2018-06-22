<?php
namespace Mini\Model;
use Mini\Core\Model;

class Clase extends Model{

    private $id;
    private $nombre;
    private $descripcion;
    private $estado;

    public function __SET($attr, $valor){
        $this->$attr = $valor;
    }

    public function __GET($attr){
        return $this->$attr;
    }

    public function registrar()
    {

        $sql = "INSERT INTO Clase (idClase,nombreClase,descripcion) VALUES (null,?,?)";

        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->nombre);
        $query->bindParam(2, $this->descripcion);
        return  $query->execute();
    }

    public function editar()
    {
        $sql = "SELECT idClase,nombreClase,descripcion, estadoClase FROM Clase WHERE idClase = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->id);
        $query->execute();
        return $query->fetch();
    }

    public function listar()
    {
        $sql = "SELECT idClase,nombreClase,descripcion, estadoClase FROM Clase where estadoClase='Activo'";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
        
    }
       public function listarIndex()
    {
        $sql = "SELECT idClase,nombreClase,descripcion, estadoClase FROM Clase";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
        
    }

     public function lis()
    {
        $sql  = "SELECT idClase,nombreClase,descripcion, estadoClase FROM Clase where estadoClase='Activo'";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
        
    }



    public function modificar(){
        $sql = "UPDATE Clase SET  nombreClase = ?, descripcion = ? WHERE idClase = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->nombre);
        $query->bindParam(2, $this->descripcion);
        $query->bindParam(3, $this->id);
        return  $query->execute();
    }

    public function cambiarEstado(){
        $sql = "UPDATE Clase SET estadoClase = ? WHERE idClase = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->estado);
        $query->bindParam(2, $this->id);
        return  $query->execute();
    }

    
}
?>