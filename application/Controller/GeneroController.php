<?php
namespace Mini\Controller;
use Mini\Model\Genero;

class GeneroController{
    
    public function __construct(){
        if(!isset($_SESSION['admin'])){
            header("location:".URL."Login");
        }
    }
    
    public function index()
    {
        $Genero= new Genero();
        $registros = $Genero->listar();
        
        include APP.'view/_templates/headerAdmin.php';
        include APP.'view/Genero/index.php';
        include APP.'view/_templates/footerAdmin.php';
    }

    public function crear(){

        include APP.'view/_templates/headerAdmin.php';
        include APP.'view/Genero/crear.php';
        include APP.'view/_templates/footerAdmin.php';
    }

    public function registrar(){

        $Genero= new Genero();
        $Genero->__SET('nombre',$_POST['nombre']);

        $valNombre = $Genero->validarNombre();

        if($valNombre){
            $_SESSION["mensaje"]= "swal({
                position: 'top-end',
                type: 'error',
                title: '!Error!',
                text: 'El Nombre ya se encuentra registrado',
                showConfirmButton: false,
                timer: 2000
            })"; 
        }else{

        $respuesta = $Genero->registrar();
        
        if($respuesta){
            $_SESSION["mensaje"]= "swal({
                position: 'top-end',
                type: 'success',
                title: '!Éxito!',
                text: 'Registro Exitoso',
                showConfirmButton: false,
                timer: 2000
            })";
        }else{
            $_SESSION["mensaje"]= "swal({
                position: 'top-end',
                type: 'error',
                title: 'Error!',
                text: 'El registro no se pudo realizar',
                showConfirmButton: false,
                timer: 2000
            })";
        }
    }
        header("location: ".URL."/Genero/index");
    }

    public function editar($id)
    {
        $Genero= new Genero();
        $Genero->__SET('id',$id);
        $respuesta = $Genero->editar();
        echo json_encode($respuesta);
    }

    public function modificar()
    {   
        $Genero= new Genero();
        $Genero->__SET('nombre',$_POST['nombre']);
        $Genero->__SET('id',$_POST['id']);

        $valNombre = $Genero->validarNombre();

        if($valNombre){
            echo json_encode(array("danger" => true));

        }else{

        $respuesta = $Genero->modificar();

        if($respuesta){
            echo json_encode(array("success" => true));
        }else{
            echo json_encode(array("success" => false));
        }
    }
    }

    public function estado($estado, $id)
    {   
        $Genero= new Genero();
        $Genero->__SET('estado', $estado);
        $Genero->__SET('id', $id);
        $respuesta = $Genero->cambiarEstado();  

        if($respuesta){
            $_SESSION["mensaje"]= "swal({
                position: 'top-end',
                type: 'success',
                title: '!Éxito!',
                text: 'El Estado se ha Modificado Exitosamente',
                showConfirmButton: false,
                timer: 2000
            })";
        }else{
            $_SESSION["mensaje"]= "swal({
                position: 'top-end',
                type: 'error',
                title: '!Error!',
                text: 'No se pudo cambiar el estado', 
                showConfirmButton: false,
                timer: 2000
            })";
        }
        
        header("location: ".URL."/Genero");
    }
}
?>