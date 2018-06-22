<?php
namespace Mini\Model;
use Mini\Core\Model;

class TipoNovedad extends Model{

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
        $sql = "SELECT * FROM tiponovedades WHERE nombreNovedad = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->nombre);
        $query->execute();

        if($query->fetchColumn() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function registrarTN()
    {
        $sql = "INSERT INTO tiponovedades (idtipoNovedades,nombreNovedad) VALUES (null,?)";

        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->nombre);
        return  $query->execute();
    }

    public function editar()
    {
        $sql = "SELECT idtipoNovedades,nombreNovedad, estadoTN FROM tiponovedades WHERE idtipoNovedades = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->id);
        $query->execute();
        return $query->fetch();
    }

    public function listar()
    {
        $sql = $sql = "SELECT idtipoNovedades,nombreNovedad, estadoTN FROM tiponovedades";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
        
    }

    public function listarActivo()
    {
        $sql =  "SELECT idtipoNovedades,nombreNovedad  FROM tiponovedades WHERE estadoTN ='Activo'";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function modificar(){
        $sql = "UPDATE tiponovedades SET  nombreNovedad = ? WHERE idtipoNovedades = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->nombre);
        $query->bindParam(2, $this->id);
        return  $query->execute();
    }

    public function cambiarEstado(){
        $sql = "UPDATE tiponovedades SET estadoTN = ? WHERE idtipoNovedades = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->estado);
        $query->bindParam(2, $this->id);
        return  $query->execute();
    }
    
}
?>