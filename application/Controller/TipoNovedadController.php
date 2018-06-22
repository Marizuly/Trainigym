<?php
namespace Mini\Controller;
use Mini\Model\TipoNovedad;

class TipoNovedadController{
    
    public function __construct(){
        if(!isset($_SESSION['admin'])){
            header("location:".URL."Login");
        }
    }
    
    public function index()
    {
        $TM= new TipoNovedad();
        $registros = $TM->listar();
        
        include APP.'view/_templates/headerAdmin.php';
        include APP.'view/TipoNovedad/index.php';
        include APP.'view/_templates/footerAdmin.php';
    }


    public function crear(){

        include APP.'view/_templates/headerAdmin.php';
        include APP.'view/TipoNovedad/crear.php';
        include APP.'view/_templates/footerAdmin.php';
    }

    public function registrar(){

        $TM= new TipoNovedad();
        $TM->__SET('nombre',$_POST['nombre']);
        $respuesta = $TM->registrarTN();

        if($respuesta){
            $_SESSION["mensaje"]= "alert('¡Registro Exitoso!')";
        }else{
            $_SESSION["mensaje"]= "alert('¡Ups! Error')";
        }

        header("location: ".URL."/TipoNovedad/index");
    }

    public function editar($id)
    {
        $TM= new TipoNovedad;
        $TM->__SET('id',$id);
        $respuesta = $TM->editar();
        echo json_encode($respuesta);
        //include APP.'view/_templates/headerAdmin.php';
       // include APP.'view/TipoNovedad/editar.php';
        //include APP.'view/_templates/footerAdmin.php';
    }

    public function modificar()
    {   
        $TM= new TipoNovedad();
        $TM->__SET('nombre',$_POST['nombre']);
        $TM->__SET('id',$_POST['id']);
        $respuesta = $TM->modificar();
        
        if($respuesta){
            echo json_encode(array("success" => true));
           // $_SESSION["mensaje"]= "alert('¡Modificación Exitosa!')";
        }else{
            echo json_encode(array("success" => false));
           // $_SESSION["mensaje"]= "alert('¡Ups! Error')";
        }

        //header("location: ".URL."/TipoNovedad");
    }

    public function estado($estado, $id)
    {   
        $TM= new TipoNovedad();
        $TM->__SET('estado', $estado);
        $TM->__SET('id', $id);
        $respuesta = $TM->cambiarEstado();  

        if($respuesta){
            $_SESSION["mensaje"]= "alert('¡Modificación Exitosa!')";
        }else{
            $_SESSION["mensaje"]= "alert('¡Ups! Error')";
        }
        
        header("location: ".URL."/TipoNovedad");
    }
}
?>