<?php
//crear modelo
namespace Mini\Model;
//usar la conexión
use Mini\Core\Model;
//heredamos
class Membresia extends Model{

    private $id;
    private $nombre;
    private $estado;
    private $tipoM;
    private $cantidad;
    private $tarifa;
    private $beneficiario;

    //SET recibe un atributo y un valor
    public function __SET($attr, $valor){
        $this->$attr = $valor;
    }
    //GET solo recibe el atributo
    public function __GET($attr){
        return $this->$attr;
    }
    
    public function MaxId(){
        $sql = "CALL SP_maxIdMembresia";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch();
    }

    public function registrar(){
        $sql = "CALL SP_insertarMembresia(?,?,?,?,?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->nombre);
        $query->bindParam(2, $this->cantidad);
        $query->bindParam(3, $this->tipoM);
        $query->bindParam(4, $this->tarifa);
        $query->bindParam(5, $this->beneficiario);
        return $query->execute();
    }

    public function editar()
    {
        $sql = "CALL SP_editarMembresia(?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->id);
        $query->execute();
        return $query->fetch();
    }

    public function modificar(){
        $sql = "CALL SP_modificarMembresia(?,?,?,?,?,?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->nombre);
        $query->bindParam(2, $this->cantidad);
        $query->bindParam(3, $this->tipoM);
        $query->bindParam(4, $this->tarifa);
        $query->bindParam(5, $this->id);
        $query->bindParam(6, $this->beneficiario);
        
        return  $query->execute();
    }

    public function cambiarEstado(){
        $sql = "CALL SP_ceMembresia(?,?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->estado);
        $query->bindParam(2, $this->id);
        return  $query->execute();
    }

    public function listar()
    {
        $sql = "CALL SP_listarMembresia";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    //las maestras
    public function listarActivo(){
        $sql = "CALL SP_listarAMembresia";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    //para la venta
    public function listarActivo2(){
        $sql = "CALL SP_listarA2Membresia";
        $query = $this->db->prepare($sql);
        $query->execute();
        //para capturar lo que nos devuelve
        return $query->fetchAll();
    } 
}
?>