<?php
//crear modelo
namespace Mini\Model;
//usar la conexión
use Mini\Core\Model;
//heredamos
class Instructor extends Model{

    private $id;
    private $PNombre;
    private $SNombre;
    private $PApellido;
    private $SApellido;
    private $Fecha;
    private $Tel;
    private $Cel;
    private $ECivil;
    private $Correo;
    private $Direccion;
    private $Estado;

    //SET recibe un atributo y un valor
    public function __SET($attr, $valor){
        $this->$attr = $valor;
    }
    //GET solo recibe el atributo
    public function __GET($attr){
        return $this->$attr;
    }
    //guardar
    // public function registrarInstructor(){
    //     //para conectarnos primero se hace el query de la BD
    //     $sql = "INSERT INTO Instructor (idUsuario,primerNombre,segundoNombre,primerApellido,
    //     segundoApellido,fechaNacimiento,telefono,celular,estadoCivil,correo,direccion) VALUES (null,?,?,?,?,?,?,?,?,?,?)";

    //     //prepara la consulta
    //     $query = $this->db->prepare($sql);

    //     //pasa los parametros
    //     $query->bindParam(1, $this->PNombre);
    //     $query->bindParam(2, $this->SNombre);
    //     $query->bindParam(3, $this->PApellido);
    //     $query->bindParam(4, $this->SApellido);
    //     $query->bindParam(5, $this->Fecha);
    //     $query->bindParam(6, $this->Tel);
    //     $query->bindParam(7, $this->Cel);
    //     $query->bindParam(8, $this->ECivil);
    //     $query->bindParam(9, $this->Correo);
    //     $query->bindParam(10, $this->Direccion);

    //     //ejecuta la consulta
    //     return  $query->execute();
    // }

    public function editarInstructor(){
        $sql = "SELECT idUsuario,primerNombre,segundoNombre,primerApellido,
        segundoApellido,fechaNacimiento,telefono,celular,estadoCivil,correo,direccion, estadoInstuctor FROM Instructor WHERE idUsuario = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->id);
        $query->execute();
        //para capturar lo que nos devuelve
        return $query->fetch();
        //fetchAll para devolver varios valores
    }

    public function listarInstructor(){
        $sql =  "SELECT * FROM persona WHERE idPerfil=2";
        $query = $this->db->prepare($sql);
        $query->execute();
        //para capturar lo que nos devuelve
        return $query->fetchAll();
        
    }

    public function modificar(){
        $sql = "UPDATE Instructor SET  primerNombre = ?,segundoNombre  = ?,primerApellido  = ?,
        segundoApellido  = ?,fechaNacimiento = ?,telefono = ?,celular = ?,estadoCivil = ?,correo = ?,direccion = ? WHERE idUsuario = ?";

        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->PNombre);
        $query->bindParam(2, $this->SNombre);
        $query->bindParam(3, $this->PApellido);
        $query->bindParam(4, $this->SApellido);
        $query->bindParam(5, $this->Fecha);
        $query->bindParam(6, $this->Tel);
        $query->bindParam(7, $this->Cel);
        $query->bindParam(8, $this->ECivil);
        $query->bindParam(9, $this->Correo);
        $query->bindParam(10, $this->Direccion);
        $query->bindParam(11, $this->id);
        return  $query->execute();
    }

    public function cambiarEstado(){
        $sql = "UPDATE Instructor SET estado = ? WHERE id = ?";

        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->Estado);
        $query->bindParam(2, $this->id);
        return  $query->execute();
    }
    
}
?>