<?php
//crear modelo
namespace Mini\Model;
//usar la conexión
use Mini\Core\Model;
//heredamos
class Persona extends Model{

    private $id;
    private $documento;
    private $primerN;
    private $segundoN;
    private $primerA;
    private $segundoA;
    private $fecha;
    private $telefono;
    private $celular;
    private $estadoC;
    private $correo;
    private $direccion;
    private $perfil;
    private $tipoDoc;
    private $genero;
    private $acudiente;
    private $eps;
    private $estado;

    //SET recibe un atributo y un valor
    public function __SET($attr, $valor){
        $this->$attr = $valor;
    }
    //GET solo recibe el atributo
    public function __GET($attr){
        return $this->$attr;
    }

    public function ValidarDocumento(){
        $sql = "SELECT * FROM persona WHERE documento = ? and idtipoDocumento = ? ";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->documento);
        $query->bindParam(2, $this->tipoDoc);
        $query->execute();
        if($query->fetchColumn() > 0){
            return true;
        }else{
            return false;
        }
    }

    //guardar
    public function registrar(){
        $sql = "INSERT INTO persona (idusuario,documento,primerNombre,segundoNombre,primerApellido,
        segundoApellido,fechaNacimiento,telefono,celular,estadoCivil,correo,direccion,idPerfil,idtipoDocumento,
         idgenero,idacudiente,ideps) VALUES
         (null,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $query = $this->db->prepare($sql);

        $query->bindParam(1, $this->documento);
        $query->bindParam(2, $this->primerN);
        $query->bindParam(3, $this->segundoN);
        $query->bindParam(4, $this->primerA);
        $query->bindParam(5, $this->segundoA);
        $query->bindParam(6, $this->fecha);
        $query->bindParam(7, $this->telefono);
        $query->bindParam(8, $this->celular);
        $query->bindParam(9, $this->estadoC);
        $query->bindParam(10, $this->correo);
        $query->bindParam(11, $this->direccion);
        $query->bindParam(12, $this->perfil);
        $query->bindParam(13, $this->tipoDoc);
        $query->bindParam(14, $this->genero);
        $query->bindParam(15, $this->acudiente);
        $query->bindParam(16, $this->eps);

        return $query->execute();
    }

    public function editar()
    {
        $sql = "SELECT * FROM persona WHERE idusuario = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->id);
        $query->execute();
        //para capturar lo que nos devuelve
        return $query->fetch();
        //fetchAll para devolver varios valores
    }

    public function listar()
    {
        //SELECT tp.nombre, p.idusuario, p.primerNombre, p.segundoNombre, p.primerApellido, p.segundoApellido, p.fechaNacimiento, g.nombreGenero, p.telefono, p.celular, e.nombreEps, p.estadoCivil, p.correo, p.direccion, pf.nombreRol FROM persona p JOIN tipodocumento tp on p.idtipoDocumento = tp.idtipoDocumento JOIN genero g on p.idgenero = g.idgenero JOIN perfil pf on p.idPerfil= pf.idPerfil JOIN eps e on p.ideps = e.ideps
        $sql = "SELECT * FROM persona p
        JOIN tipodocumento tp on p.idtipoDocumento = tp.idtipoDocumento 
        JOIN genero g on p.idgenero = g.idgenero
        JOIN perfil pf on p.idPerfil = pf.idPerfil
        JOIN eps e on p.ideps = e.ideps";
        $query = $this->db->prepare($sql);
        $query->execute();
        //para capturar lo que nos devuelve
        return $query->fetchAll();
    }

    public function listarPorPerfil($tipo)
    {
        $sql = "SELECT * FROM persona p
        JOIN tipodocumento tp on p.idtipoDocumento = tp.idtipoDocumento 
        JOIN genero g on p.idgenero = g.idgenero
        JOIN perfil pf on p.idPerfil = pf.idPerfil
        JOIN eps e on p.ideps = e.ideps WHERE p.idPerfil = $tipo";
        $query = $this->db->prepare($sql);
        $query->execute();
        //para capturar lo que nos devuelve
        return $query->fetchAll();
    }

    public function modificar(){
        $sql = "UPDATE persona SET  documento = ?,primerNombre = ?,segundoNombre  = ?,primerApellido  = ?, segundoApellido  = ?,
        fechaNacimiento = ?,telefono = ?,celular = ?,estadoCivil = ?,correo = ?,direccion = ?, idPerfil = ?, idtipoDocumento = ?,
         idgenero = ?, ideps = ? WHERE idusuario = ?";

        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->documento);
        $query->bindParam(2, $this->primerN);
        $query->bindParam(3, $this->segundoN);
        $query->bindParam(4, $this->primerA);
        $query->bindParam(5, $this->segundoA);
        $query->bindParam(6, $this->fecha);
        $query->bindParam(7, $this->telefono);
        $query->bindParam(8, $this->celular);
        $query->bindParam(9, $this->estadoC);
        $query->bindParam(10, $this->correo);
        $query->bindParam(11, $this->direccion);
        $query->bindParam(12, $this->perfil);
        $query->bindParam(13, $this->tipoDoc);
        $query->bindParam(14, $this->genero);
        $query->bindParam(15, $this->eps);
        $query->bindParam(16, $this->id);
        return  $query->execute();
    }

    public function cambiarEstado(){
        $sql = "UPDATE persona SET estadoPersona = ? WHERE idusuario = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->estado);
        $query->bindParam(2, $this->id);
        return  $query->execute();
    }

    public function ListarPerfil(){
        $sql = "SELECT * FROM perfil ORDER BY idPerfil desc";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
   
   

    public function listarInscripcion()
    {
        //SELECT tp.nombre, p.idusuario, p.primerNombre, p.segundoNombre, p.primerApellido, p.segundoApellido, p.fechaNacimiento, g.nombreGenero, p.telefono, p.celular, e.nombreEps, p.estadoCivil, p.correo, p.direccion, pf.nombreRol FROM persona p JOIN tipodocumento tp on p.idtipoDocumento = tp.idtipoDocumento JOIN genero g on p.idgenero = g.idgenero JOIN perfil pf on p.idPerfil= pf.idPerfil JOIN eps e on p.ideps = e.ideps
        $sql = "CALL SP_listarInscripcion";
        $query = $this->db->prepare($sql);
        $query->execute();
        //para capturar lo que nos devuelve
        return $query->fetchAll();
    }

    public function listarActivo()
    {
        $sql = "SELECT * FROM persona WHERE estadoPersona = 'Activo'";
        $query = $this->db->prepare($sql);
        $query->execute();
        //para capturar lo que nos devuelve
        return $query->fetchAll();
    }
    public function listarClienteVentaActiva()
    {
        $sql = "SELECT * FROM persona WHERE estadoPersona = 'Activo' AND idPerfil=3 and idusuario in (select idPersona from comprobanteservicio where estadoVenta = 'Activa') ";
        $query = $this->db->prepare($sql);
        $query->execute();
        //para capturar lo que nos devuelve
        return $query->fetchAll();
    }   
    
    public function listarCliente()
    {
        $sql = "SELECT * FROM persona WHERE estadoPersona = 'Activo' AND idPerfil=3";
        $query = $this->db->prepare($sql);
        $query->execute();
        //para capturar lo que nos devuelve
        return $query->fetchAll();
    }

    public function listarInstructor(){
        $sql =  "SELECT * FROM persona WHERE idPerfil=2 and estadoPersona = 'Activo' ";
        $query = $this->db->prepare($sql);
        $query->execute();
        //para capturar lo que nos devuelve
        return $query->fetchAll();
    }

     public function consultarDatos($idPersona){
        $sql ="SELECT * FROM persona where idusuario= ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $idPersona);
        $query->execute();
        return $query->fetch();
    }
    
    //listar PDF
    public function listarPdf($idPerfil)
    {
        //SELECT tp.nombre, p.idusuario, p.primerNombre, p.segundoNombre, p.primerApellido, p.segundoApellido, p.fechaNacimiento, g.nombreGenero, p.telefono, p.celular, e.nombreEps, p.estadoCivil, p.correo, p.direccion, pf.nombreRol FROM persona p JOIN tipodocumento tp on p.idtipoDocumento = tp.idtipoDocumento JOIN genero g on p.idgenero = g.idgenero JOIN perfil pf on p.idPerfil= pf.idPerfil JOIN eps e on p.ideps = e.ideps
        if($idPerfil == 0){
            $sql = "SELECT p.documento doc, p.primerNombre pn, p.segundoNombre sn, p.primerApellido pa,
         p.segundoApellido sa, p.telefono tel, e.nombreEps eps ,p.correo correo, p.estadoPersona estado FROM persona p
          JOIN tipodocumento tp on p.idtipoDocumento = tp.idtipoDocumento 
          JOIN genero g on p.idgenero = g.idgenero 
          JOIN perfil pf on p.idPerfil = pf.idPerfil 
          JOIN eps e on p.ideps = e.ideps";
        }else{
            $sql = "SELECT p.documento doc, p.primerNombre pn, p.segundoNombre sn, p.primerApellido pa,
         p.segundoApellido sa, p.telefono tel, e.nombreEps eps ,p.correo correo, p.estadoPersona estado FROM persona p
          JOIN tipodocumento tp on p.idtipoDocumento = tp.idtipoDocumento 
          JOIN genero g on p.idgenero = g.idgenero 
          JOIN perfil pf on p.idPerfil = pf.idPerfil 
          JOIN eps e on p.ideps = e.ideps where pf.idPerfil= $idPerfil";
        }
        $query = $this->db->prepare($sql);
        $query->execute();
        //para capturar lo que nos devuelve
        return $query->fetchAll();
    }
    
}
?>