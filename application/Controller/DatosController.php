<?php
namespace Mini\Controller;
use Mini\Model\Persona;
use Mini\Model\Eps;
use Mini\Model\Genero;
use Mini\Model\tipoDocumento;
use Mini\Model\Datos;

class DatosController{


 public function __construct(){
        if(!isset($_SESSION['instructor']) && !isset($_SESSION['cliente']) && !isset($_SESSION['admin'])){
            header("location:".URL."Login");
        }
    }
public function index(){
        $persona= new Persona();
        $persona->__SET('id',$_SESSION['idAdmin']);
        $respuesta = $persona->editar();
        $eps = new Eps();
        $respuestaE = $eps->listar();
        $genero = new Genero();
        $respuestaGe = $genero->listar();
        $TD= new TipoDocumento();
        $respuestaTD = $TD->listar();

        include APP.'view/_templates/headerAdmin.php';
        include APP.'view/datos/index.php';
        include APP.'view/_templates/footerAdmin.php';
        

}

public function editar(){
    $persona= new Persona;
        $persona->__SET('id',$_SESSION['idAdmin']);
        $respuesta = $persona->editar();
        echo json_encode($respuesta);
}

 public function modificar()
    {   
        $persona= new Datos();
        $persona->__SET('primerN',trim($_POST['primerN']));
        $persona->__SET('segundoN',trim($_POST['segundoN']));
        $persona->__SET('primerA',$_POST['primerA']);
        $persona->__SET('segundoA',trim($_POST['segundoA']));
        $persona->__SET('telefono',$_POST['telefono']);
        $persona->__SET('celular',$_POST['celular']);
        $persona->__SET('estadoC',$_POST['estadoC']);
        $persona->__SET('direccion',$_POST['direccion']);
        $persona->__SET('eps',$_POST['eps']);
        $persona->__SET('id',$_POST['id']);
        $respuesta = $persona->modificar();
        
        if($respuesta){
            echo json_encode(array("success" => true));
           // $_SESSION["mensaje"]= "alert('¡Modificación Exitosa!')";
        }else{
            echo json_encode(array("success" => false));
           // $_SESSION["mensaje"]= "alert('¡Ups! Error')";
        }
    }



}
?>