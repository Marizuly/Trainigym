<?php
//crear modelo
namespace Mini\Model;
//usar la conexión
use Mini\Core\Model;
//heredamos
class Acudiente extends Model{

    private $id;
    private $primerN;
    private $segundoN;
    private $primerA;
    private $segundoA;
    private $telefono;
    private $direccion;
    private $estado;

    //SET recibe un atributo y un valor
    public function __SET($attr, $valor){
        $this->$attr = $valor;
    }
    //GET solo recibe el atributo
    public function __GET($attr){
        return $this->$attr;
    }
    //guardar
    public function registrar(){
        $sql = "INSERT INTO acudiente (idacudiente,primerNombre,segundoNombre,primerApellido,
        segundoApellido,telefono,direccion) VALUES (null,?,?,?,?,?,?)";
        $query = $this->db->prepare($sql);

        $query->bindParam(1, $this->primerN);
        $query->bindParam(2, $this->segundoN);
        $query->bindParam(3, $this->primerA);
        $query->bindParam(4, $this->segundoA);
        $query->bindParam(5, $this->telefono);
        $query->bindParam(6, $this->direccion);

        return $query->execute();
    }

    public function MaxIdAcudiente(){
        $sql = "SELECT MAX(idacudiente) id FROM acudiente";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch();
    }

    public function editar()
    {
        $sql = "SELECT idacudiente,primerNombre,segundoNombre,primerApellido,
        segundoApellido,telefono,direccion, estadoAcudiente FROM acudiente WHERE idacudiente = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->id);
        $query->execute();
        //para capturar lo que nos devuelve
        return $query->fetch();
        //fetchAll para devolver varios valores
    }

    public function listar()
    {
        $sql = "SELECT p.documento,p.primerNombre pN,p.segundoNombre sN,p.primerApellido pA,
        p.segundoApellido sA, a.idacudiente,a.primerNombre,a.segundoNombre,a.primerApellido,
        a.segundoApellido,a.telefono,a.direccion, a.estadoAcudiente FROM acudiente  a 
        JOIN persona p on a.idacudiente= p.idacudiente";
        $query = $this->db->prepare($sql);
        $query->execute();
        //para capturar lo que nos devuelve
        return $query->fetchAll();
    }

    public function modificar(){
        $sql = "UPDATE acudiente SET  primerNombre = ?,segundoNombre  = ?,primerApellido  = ?,
        segundoApellido  = ?,telefono = ?,direccion = ? WHERE idacudiente = ?";

        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->primerN);
        $query->bindParam(2, $this->segundoN);
        $query->bindParam(3, $this->primerA);
        $query->bindParam(4, $this->segundoA);
        $query->bindParam(5, $this->telefono);
        $query->bindParam(6, $this->direccion);
        $query->bindParam(7, $this->id);
        return  $query->execute();
    }

    public function cambiarEstado(){
        $sql = "UPDATE acudiente SET estadoAcudiente = ? WHERE idacudiente = ?";

        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->estado);
        $query->bindParam(2, $this->id);
        return  $query->execute();
    }
    
}
?>