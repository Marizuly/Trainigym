<?php
namespace Mini\Model;
use Mini\Core\Model;
class horario extends Model{

    private $id;
    private $iam;
    private $fam;
    private $ipm;
    private $fpm;
    private $dia;
    private $membresia;
    private $estado;


    public function __SET($attr, $valor){
        $this->$attr = $valor;
    }

    public function __GET($attr){
        return $this->$attr;
    }

    public function registrar(){
        $sql = "INSERT INTO planeshorario(idplanesHorario,rangoInicioM,rangoFinM,rangoInicioT,rangoFinT,dia,idMembresia) 
        VALUES (null,?,?,?,?,?,?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->iam);
        $query->bindParam(2, $this->fam);
        $query->bindParam(3, $this->ipm);
        $query->bindParam(4, $this->fpm);
        $query->bindParam(5, $this->dia);
        $query->bindParam(6, $this->membresia);
        return $query->execute();
    }

    public function editar(){
        $sql = "SELECT idplanesHorario,rangoInicioM,rangoFinM,rangoInicioT,rangoFinT,dia FROM planeshorario
         WHERE idplanesHorario = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->id);
        $query->execute();
        return $query->fetch();
    }

    public function listar(){
        $sql = "SELECT * FROM planeshorario";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function modificar(){
        $sql = "UPDATE planeshorario SET rangoInicioM = ?,rangoFinM = ?,rangoInicioT = ?,rangoFinT = ?, dia = ?
         WHERE idMembresia = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->iam);
        $query->bindParam(2, $this->fam);
        $query->bindParam(3, $this->ipm);
        $query->bindParam(4, $this->fpm);
        $query->bindParam(5, $this->dia);
        $query->bindParam(6, $this->membresia);
        return $query->execute();
    }

    public function cambiarEstado(){
        $sql = "UPDATE planeshorario SET estadoHorario = ? WHERE idplanesHorario = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->estado);
        $query->bindParam(2, $this->id);
        return  $query->execute();
    }

}
?>