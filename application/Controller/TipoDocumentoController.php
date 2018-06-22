<?php
namespace Mini\Controller;
use Mini\Model\TipoDocumento;

class TipoDocumentoController{
    
    public function __construct(){
        if(!isset($_SESSION['admin'])){
            header("location:".URL."Login");
        }
    }
    
    public function index()
    {
        $TD= new TipoDocumento();
        $registros = $TD->listar();
        include APP.'view/_templates/headerAdmin.php';
        include APP.'view/TipoDocumento/index.php';
        include APP.'view/_templates/footerAdmin.php';
    }

    public function crear()
    {
        include APP.'view/_templates/headerAdmin.php';
        include APP.'view/TipoDocumento/crear.php';
        include APP.'view/_templates/footerAdmin.php';
    }

    public function registrar(){

        $TD= new TipoDocumento();
        $TD->__SET('nombre',$_POST['nombre']);

        $validarNombre = $TD->validar();

        if($validarNombre){
            $_SESSION["mensaje"]= "swal({
                position: 'top-end',
                type: 'error',
                title: '!Error!',
                text: 'El Nombre ya se encuentra registrado',
                showConfirmButton: false,
                timer: 5000
            })"; 
        }else{

            $respuesta = $TD->registrarTD();

            if($respuesta){
                $_SESSION["mensaje"]= "swal({
                    position: 'top-end',
                    type: 'success',
                    title: '!Éxito!',
                    text: 'Registro Exitoso',
                    showConfirmButton: false,
                    timer: 5000
                })";
            }else{
                $_SESSION["mensaje"]= "swal({
                    position: 'top-end',
                    type: 'error',
                    title: 'Error!',
                    text: 'El registro no se pudo realizar',
                    showConfirmButton: false,
                    timer: 5000
                })";
            }
        }
        header("location: ".URL."/TipoDocumento/index");
    }

    public function editar($id)
    {
        $TD= new TipoDocumento;
        $TD->__SET('id',$id);
        $respuesta = $TD->editar();
        echo json_encode($respuesta);
        //include APP.'view/_templates/headerAdmin.php';
        //include APP.'view/TipoDocumento/editar.php';
        //include APP.'view/_templates/footerAdmin.php';
    }

    public function modificar()
    {   
        $TD= new TipoDocumento();
        $TD->__SET('nombre',$_POST['nombre']);
        $TD->__SET('id',$_POST['id']);

        $valNombre = $TD->validar();
        
        if($valNombre){
            echo json_encode(array("danger" => true));

        }else{
        $respuesta = $TD->modificar();

        if($respuesta){
            echo json_encode(array("success" => true));
           // $_SESSION["mensaje"]= "alert('¡Modificación Exitosa!')";
        }else{
            echo json_encode(array("success" => false));
           // $_SESSION["mensaje"]= "alert('¡Ups! Error')";
        }

        //header("location: ".URL."/TipoDocumento");
    }
    }
    public function estado($estado, $id)
    {   
        $TD= new TipoDocumento();
        $TD->__SET('estado', $estado);
        $TD->__SET('id', $id);
        $respuesta = $TD->cambiarEstado();  
        
        if($respuesta){
            $_SESSION["mensaje"]= "swal({
                position: 'top-end',
                type: 'success',
                title: '!Éxito!',
                text: 'El Estado se ha Modificado Exitosamente',
                showConfirmButton: false,
                timer: 5000
            })";        
        }else{
            $_SESSION["mensaje"]= "swal({
                position: 'top-end',
                type: 'error',
                title: '!Error!',
                text: 'No se pudo cambiar el estado', 
                showConfirmButton: false,
                timer: 5000
            })";
  }
        
        header("location: ".URL."/TipoDocumento");
    }
}
?>