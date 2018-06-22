<?php
namespace Mini\Model;

use Mini\Core\Model;

class Datos extends Model{


    private $id;
    private $primerN;
    private $segundoN;
    private $primerA;
    private $segundoA;
    private $telefono;
    private $celular;
    private $estadoC;
    private $eps;

    public function __SET($attr, $valor){
        $this->$attr = $valor;
    }

    public function __GET($attr){
        return $this->$attr;
    }
    
    public function modificar(){
        $sql = "UPDATE persona SET  primerNombre = ?,segundoNombre  = ?,primerApellido  = ?, segundoApellido = ?, telefono = ?, celular = ?,estadoCivil =  ?, direccion =  ?,  ideps = ? WHERE idusuario = ?";

        $query = $this->db->prepare($sql);
        
        $query->bindParam(1, $this->primerN);
        $query->bindParam(2, $this->segundoN);
        $query->bindParam(3, $this->primerA);
        $query->bindParam(4, $this->segundoA);
        $query->bindParam(5, $this->telefono);
        $query->bindParam(6, $this->celular);
        $query->bindParam(7, $this->estadoC);
        $query->bindParam(8, $this->direccion);
        $query->bindParam(9, $this->eps);
        $query->bindParam(10, $this->id);
        
        return  $query->execute();
    }
}

?>
