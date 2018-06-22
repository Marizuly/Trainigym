<?php

namespace Mini\Model;
use Mini\Core\Model;

class novedades extends Model{

    private $idNovedades;
    private $descripcion;
    private $fechaNovedad;
    private $tipoN; 
    private $idComprobante;

    public function __SET($attr, $valor){
        $this->$attr = $valor;
    }
    public function __GET($attr){
        return $this->$attr;
    }

    // public function validar(){
    //     $sql = "SELECT * FROM novedades WHERE descripcion = ?, fechaNovedad = ?";
    //     $query = $this->db->prepare($sql);
    //     $query->bindParam(1, $this->descripcion);
    //     $query->bindParam(2, $this->fechaNovedad);
    //     $query->execute();

    //     if($query->fetchColumn() > 0){
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }

      

    public function registrarnovedades(){ 
        $sql = "INSERT INTO novedades VALUES (null,?,?,?,?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->descripcion);   
        $query->bindParam(2, $this->idComprobante);
        $query->bindParam(3, $this->tipoN);
        $query->bindParam(4, $this->fechaNovedad);
        
        return  $query->execute();
    }

    // public function validar(){
    //     $sql = "SELECT * FROM novedades WHERE fechaNovedad = ? ,descripcion = ? ";
    //     $query = $this->db->prepare($sql);
    //     $query->bindParam(1, $this->fechaNovedad;
    //     $query->bindParam(2, $this->descripcion;
    //     $query->execute();

    //     if($query->fetchColumn() > 0){
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }

    // public function editar(){
    //     // $sql = "SELECT idNovedades,descripcion,fechaNovedad FROM novedades WHERE idNovedades = ?";
    //     $sql = "SELECT `idNovedades`, `descripcion`, `idcomprobante`, `idtipoNovedades`, `fechaNovedad` FROM `novedades` WHERE idNovedades = ?";
    //     $query = $this->db->prepare($sql);
    //     $query->bindParam(1, $this->idNovedades);
    //     $query->execute();
    //     //para capturar lo que nos devuelve
    //     return $query->fetch();
    //     //fetchAll para devolver varios valores
    // }

    public function listar(){
        // $sql = "SELECT idNovedades,descripcion,fechaNovedad FROM novedades ";
        $sql = " SELECT novedades.idcomprobante,persona.primerNombre,persona.segundoNombre,persona.primerApellido,persona.segundoApellido,novedades.descripcion, tiponovedades.nombreNovedad, novedades.fechaNovedad FROM `novedades` JOIN persona on novedades.idcomprobante=persona.idusuario join tiponovedades on novedades.idtipoNovedades=tiponovedades.idtipoNovedades";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function modificar(){
        $sql = "UPDATE novedades SET  descripcion = ?,fechaNovedad = ? ,idtipoNovedades  = ? ,idcomprobante  = ? WHERE idNovedades = ?";

        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->descripcion);
        $query->bindParam(2, $this->fechaNovedad);
        $query->bindParam(3, $this->tipoN);
        $query->bindParam(4, $this->p);
        $query->bindParam(5, $this->idNovedades);
        return  $query->execute();
    }

    public function eliminar(){
        $sql = "DELETE FROM novedades WHERE idcomprobante=?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->idComprobante);
        return  $query->execute();
    }




    
}
?>






















