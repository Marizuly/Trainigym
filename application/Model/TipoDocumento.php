<?php
namespace Mini\Model;
use Mini\Core\Model;

class TipoDocumento extends Model{

    private $id;
    private $nombre;
    private $estado;

    public function __SET($attr, $valor){
        $this->$attr = $valor;
    }

    public function __GET($attr){
        return $this->$attr;
    }

    public function validar(){
        $sql = "SELECT * FROM tipodocumento WHERE nombre = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->nombre);
        $query->execute();

        if($query->fetchColumn() > 0){
            return true;
        }else{
            return false;
        }
    }
    
    public function registrarTD()
    {
        $sql = "INSERT INTO tipodocumento (idtipoDocumento,nombre) VALUES (null,?)";

        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->nombre);
        return  $query->execute();
    }

    public function editar()
    {
        $sql = "SELECT idtipoDocumento,nombre, estadoTD FROM tipodocumento WHERE idtipoDocumento = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->id);
        $query->execute();
        return $query->fetch();
    }

    public function listarActivo()
    {
        $sql =  "SELECT idtipoDocumento,nombre  FROM tipodocumento WHERE estadoTD ='Activo'";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function listar()
    {
        $sql =  "SELECT idtipoDocumento,nombre, estadoTD FROM tipodocumento";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
        
    }

    public function modificar(){
        $sql = "UPDATE tipodocumento SET  nombre = ? WHERE idtipoDocumento = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->nombre);
        $query->bindParam(2, $this->id);
        return  $query->execute();
    }

    public function cambiarEstado(){
        $sql = "UPDATE tipodocumento SET estadoTD = ? WHERE idtipoDocumento = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->estado);
        $query->bindParam(2, $this->id);
        return  $query->execute();
    }
    
}
?>