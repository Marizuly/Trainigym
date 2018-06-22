<?php
//crear modelo
namespace Mini\Model;
//usar la conexión
use Mini\Core\Model;
//heredamos
class Programacion extends Model{

    private $id;
    private $fecha;
    private $idClase;
    private $idusuario;
    private $horaInicio;
    private $horaFinal;
    private $color;

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
        $sql = "INSERT INTO 
        programacion (idProgramacion, fecha, horaInicio, horaFin, color, idClase, idusuario) 
        VALUES (null,?,?,?,?,?,?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->fecha);
        $query->bindParam(2, $this->horaInicio);
        $query->bindParam(3, $this->horaFinal);
        $query->bindParam(4, $this->color);
        $query->bindParam(5, $this->idClase);
        $query->bindParam(6, $this->idusuario);
        return $query->execute();
    }

    public function modificar(){
        $sql = "UPDATE programacion SET  fecha = ?, horaInicio  = ?, horaFin  = ?, color = ?, idClase = ?, 
        idusuario  = ? WHERE idProgramacion = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->fecha);
        $query->bindParam(2, $this->horaInicio);
        $query->bindParam(3, $this->horaFinal);
        $query->bindParam(4, $this->color);
        $query->bindParam(5, $this->idClase);
        $query->bindParam(6, $this->idusuario);
        $query->bindParam(7, $this->id);
    
        return  $query->execute();
    }

    public function eliminar(){
        $sql = "DELETE FROM programacion WHERE idProgramacion = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->id);
        return  $query->execute();
    }

    
    public function listar()
    {
        $sql = "SELECT * FROM programacion p 
        join clase c on p.idClase = c.idClase 
        join persona per on p.idusuario=per.idusuario";


        $query = $this->db->prepare($sql);
        $query->execute();
        //para capturar lo que nos devuelve
        return $query->fetchAll();

        


    }

    

     public function listarClase(){
      $sql="SELECT `idClase`, `nombreClase`, `descripcion`, `estadoClase` FROM `clase` WHERE estadoClase='Activo'";
          $query = $this->db->prepare($sql);
         $query->execute();
    return $query->fetchAll();
     }
    

    
}
?>