<?php
namespace Mini\Model;
use Mini\Core\Model;

class Tarifas extends Model{

    private $id;
    private $valor;
    private $ano;
    private $estado;

    public function __SET($attr, $valor){
        $this->$attr = $valor;
    }

    public function __GET($attr){
        return $this->$attr;
    }

    public function MaxIdTarifa(){
        $sql = "CALL SP_maxIdTarifa";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch();
    }

    public function registrarT()
    {
        $sql = "CALL SP_insertarTarifa(?,?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->valor);
        $query->bindParam(2, $this->ano);
        return  $query->execute();
    }

    public function editar()
    {
        $sql = "CALL SP_editarTarifa(?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->id);
        $query->execute();
        return $query->fetch();
    }

    public function listar()
    {
        $sql =  "CALL SP_listarTarifa";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
        
    }

    public function modificar()
    {
        $sql = "CALL SP_modificarTarifa(?,?,?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->valor);
        $query->bindParam(2, $this->ano);
        $query->bindParam(3, $this->id);
        return  $query->execute();
    }

    public function cambiarEstado(){
        $sql = "CALL SP_ceTarifa(?,?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->estado);
        $query->bindParam(2, $this->id);
        return  $query->execute();
    }
    
    public function listarActivo()
    {
        $sql = "CALL SP_listarTarifaActiva";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
}
?>