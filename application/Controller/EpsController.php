<?php
namespace Mini\Controller;
use Mini\Model\Eps;

class EpsController{
    
    public function __construct(){
        if(!isset($_SESSION['admin'])){
            header("location:".URL."Login");
        }
    }
    
    public function index()
    {
        $eps= new Eps();
        $registros = $eps->listar();
        include APP.'view/_templates/headerAdmin.php';
        include APP.'view/Eps/index.php';
        include APP.'view/_templates/footerAdmin.php';
    }

    public function crear()
    {
        include APP.'view/_templates/headerAdmin.php';
        include APP.'view/Eps/crear.php';
        include APP.'view/_templates/footerAdmin.php';
    }

    public function registrar()
    {
        $eps= new Eps();
        $eps->__SET('nombre',$_POST['nombre']);

        $valEps = $eps->validarNombre();
        if($valEps){
            $_SESSION["mensaje"]= "swal({
                position: 'top-end',
                type: 'error',
                title: 'Error!',
                text: 'El nombre ya se encuentra registrado',
                showConfirmButton: false,
                timer: 5000
            })";
        }else{
            $respuesta = $eps->registrar();
            
            if($respuesta){
                $_SESSION["mensaje"]= "swal({
                    position: 'top-end',
                    type: 'success',
                    title: 'Éxito!',
                    text: 'El registro se  realizó correctamente',
                    showConfirmButton: false,
                    timer: 5000
                })";
            }else{
                $_SESSION["mensaje"]= "swal({
                    position: 'top-end',
                    type: 'success',
                    title: 'Éxito!',
                    text: 'El registro se  realizó correctamente',
                    showConfirmButton: false,
                    timer: 5000
                })";
            }
        }
        header("location: ".URL."/Eps/index");
    }

    public function editar($id)
    {
        $eps= new Eps;
        $eps->__SET('id',$id);
        $respuesta = $eps->editar();
        echo json_encode($respuesta);
        //include APP.'view/_templates/heade  rAdmin.php';
        //include APP.'view/Eps/editar.php';
        //include APP.'view/_templates/footerAdmin.php';
    }

    public function modificar()
    {   
        $eps= new Eps();
        $eps->__SET('nombre',$_POST['nombre']);
        $eps->__SET('id',$_POST['id']);

        $valNombre = $eps->validarNombre();
        if($valNombre){
            echo json_encode(array("danger" => true));
        }else{
        $respuesta = $eps->modificar();
        if($respuesta){
            echo json_encode(array("success" => true));
           // $_SESSION["mensaje"]= "alert('¡Modificación Exitosa!')";
        }else{
            echo json_encode(array("success" => false));
           // $_SESSION["mensaje"]= "alert('¡Ups! Error')";
        }
        //header("location: ".URL."/Eps");
    }
}

    public function estado($estado, $id)
    {   
        $eps= new Eps();
        $eps->__SET('estado', $estado);
        $eps->__SET('id', $id);
        $respuesta = $eps->cambiarEstado();  

        if($respuesta){
            $_SESSION["mensaje"]= "swal({
                position: 'top-end',
                type: 'success',
                title: '!Éxito!',
                text: 'El estado se ha modificado Exitosamente',
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
        
        header("location: ".URL."/Eps");
    }
}
?>