<?php
namespace Mini\Controller;
use Mini\Model\TipoMembresia;

class TipoMembresiaController{

    public function __construct(){
        if(!isset($_SESSION['session_username'])){
            header("location:".URL."Login");
        }
    }
    
    public function index()
    {
        $TM= new TipoMembresia();
        $registros = $TM->listar();
        
        include APP.'view/_templates/headerAdmin.php';
        include APP.'view/TipoMembresia/index.php';
        include APP.'view/_templates/footerAdmin.php';
    }
    public function crear()
    {
        include APP.'view/_templates/headerAdmin.php';
        include APP.'view/TipoMembresia/crear.php';
        include APP.'view/_templates/footerAdmin.php';
    }

    public function registrar()
    {
        $TM= new TipoMembresia();
        $TM->__SET('nombre',$_POST['nombre']);

        $valNombre = $TM->validarNombre();
        if($valNombre){
            $_SESSION["mensaje"] = "swal({
                position: 'top-end',
                type: 'error',
                title: 'Error!',
                text: 'El Nombre ya se encuentra registrado',
                showConfirmButton: false,
                timer: 2000
            })";
        }else{
            $respuesta = $TM->registrar();
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
                    title: 'Ups!',
                    text: 'El registro no se pudo realizar',
                    showConfirmButton: false,
                    timer: 2000
                })";
            }
        }
        header("location: ".URL."/TipoMembresia/index");
    }

    public function editar($id)
    {
        $TM= new TipoMembresia;
        $TM->__SET('id',$id);
        $respuesta = $TM->editar();
        echo json_encode($respuesta);
        //include APP.'view/_templates/headerAdmin.php';
        //include APP.'view/TipoMembresia/editar.php';
        //include APP.'view/_templates/footerAdmin.php';
    }

    public function modificar()
    {   
        $TM= new TipoMembresia();
        $TM->__SET('nombre',$_POST['nombre']);
        $TM->__SET('id',$_POST['id']);

        $valNombre = $TM->hola();
        if($valNombre->nombreTipoMembresia != $_POST['nombre']){
            $val = $TM->validarNombre();
            if($val){
                echo json_encode(array("danger" => true));
            }else{
                $respuesta = $TM->modificar();
                if($respuesta){
                    echo json_encode(array("success" => true));
            // $_SESSION["mensaje"]= "alert('¡Modificación Exitosa!')";
                }else{
                    echo json_encode(array("success" => false));
            // $_SESSION["mensaje"]= "alert('¡Ups! Error')";
                }
            }
        }else{
            $respuesta = $TM->modificar();
                if($respuesta){
                    echo json_encode(array("success" => true));
            // $_SESSION["mensaje"]= "alert('¡Modificación Exitosa!')";
                }else{
                    echo json_encode(array("success" => false));
            // $_SESSION["mensaje"]= "alert('¡Ups! Error')";
                }
        }
    }
    
    public function estado($estado, $id)
    {   
        $TM= new TipoMembresia();
        $TM->__SET('estado', $estado);
        $TM->__SET('id', $id);
        $respuesta = $TM->cambiarEstado();  

        if($respuesta){
            $_SESSION["mensaje"]= "swal({
                position: 'top-end',
                type: 'success',
                title: '!Éxito!',
                text: 'El Estado se ha Modificado Exitosamente',
                showConfirmButton: false,
                timer: 3100
            })";
        }else{
            $_SESSION["mensaje"]= "swal({
                position: 'top-end',
                type: 'error',
                title: '!Ups!',
                text: 'No se pudo cambiar el estado', 
                showConfirmButton: false,
                timer: 3100
            })";
        }
        header("location: ".URL."/TipoMembresia");
    }
}
?>