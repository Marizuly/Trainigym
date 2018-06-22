<?php

namespace Mini\Model;
use Mini\Core\Model;

class asistencia extends Model{

    private $idcomprobante;
    private $cantidad;
    private $diaSemana;


    public function __SET($attr, $valor){
        $this->$attr = $valor;
    }
    public function __GET($attr){
        return $this->$attr;
    }
    public function insertarAsistencia(){
        $sql = "CALL SP_insertarAsistencia(?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->idcomprobante);
        return  $query->execute();
    }


    public function estadoVentaF(){
        $sql = "CALL SP_estadoVentaF(?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->idcomprobante);
        return  $query->execute();
    }
    public function cantidad(){
        $sql = "CALL SP_cantidad(?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->idcomprobante);
        $query->execute();
        return $query->fetch();
    }

    public function diaSemana(){
        $sql = "CALL SP_diaSemana";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch();
    }

    public function valDia(){
        $sql = "CALL SP_dia(?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->diaSemana);
        $query->execute();
        return $query->fetch();
    }
    public function valDia2(){
        $sql = "select ph.dia dia, hv.idcomprobante from planeshorario ph join horarioventa hv on ph.idplanesHorario=hv.idplanesHorario where dia like CONCAT('%',?,'%') and  ph.idplanesHorario=11" ;
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->diaSemana);
        $query->execute();
        return $query->fetchAll();
    }
    
    


    public function fechaActual(){
        $sql = "CALL SP_fechaActual(?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->idcomprobante);
        $query->execute();
        if($query->fetchColumn() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function valHora(){
        $sql = "CALL SP_valHora(?)";
        $query = $this->db->prepare($sql);
        
        $query->bindParam(1, $this->idcomprobante);
        $query->execute();
        if($query->fetchColumn() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function valHora2(){
        $sql = "CALL SP_valHora2(?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->idcomprobante);
        $query->execute();
        return $query->fetch();
    }

    public function consultarAsistencia(){
        $sql = "CALL SP_consultarAsistencia(?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->idcomprobante);
        $query->execute();
        return $query->fetchAll();
    }
    public function listarAsistencia(){
        $sql = "CALL SP_listarAsistencia";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
    public function listarAsistencia2($ids){
        $sql = "CALL SP_listarAsistencia2(?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $ids);
        $query->execute();
        return $query->fetchAll();
    }

    public function actualizarTiquetes(){
        $sql = "CALL SP_actualizarTiquetera(?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->idcomprobante);
        return  $query->execute();
    }
    public function listarDocumento()
    {
        $sql = "CALL SP_listarDocumento";
        $query = $this->db->prepare($sql);
        $query->execute();
        //para capturar lo que nos devuelve
        return $query->fetchAll();
    }

  
   
}
?>