<?php
namespace Mini\Controller;

use Mini\Model\Acudiente;

class AcudienteController{

    public function __construct(){
        if(!isset($_SESSION['admin'])){
            header("location:".URL."Login");
        }
    }
    
    public function index()
    {
        $acu= new Acudiente();
        $registros = $acu->listar();
        include APP.'view/_templates/headerAdmin.php';
        include APP.'view/Acudiente/index.php';
        include APP.'view/_templates/footerAdmin.php';
    }

    // public function crear(){
    //     include APP.'view/_templates/headerAdmin.php';
    //     include APP.'view/Acudiente/crear.php';
    //     include APP.'view/_templates/footerAdmin.php';
    // }

    // public function registrar(){
    //     $acu= new Acudiente();
    //     $acu->__SET('primerN',$_POST['primerN']);
    //     $acu->__SET('segundoN',$_POST['segundoN']);
    //     $acu->__SET('primerA',$_POST['primerA']);
    //     $acu->__SET('segundoA',$_POST['segundoA']);
    //     $acu->__SET('telefono',$_POST['telefono']);
    //     $acu->__SET('direccion',$_POST['direccion']);
    //     $respuesta = $acu->registrar();

    //     if($respuesta){
    //         $_SESSION["mensaje"]= "alert('¡Registro Exitoso!')";
    //     }else{
    //         $_SESSION["mensaje"]= "alert('¡Ups! Error')";
    //     }
    //     header("location: ".URL."/Acudiente/crear");
    // }

    public function editar($id)
    {
        $acu= new Acudiente;
        $acu->__SET('id',$id);
        $respuesta = $acu->editar();
        echo json_encode($respuesta);

        // include APP.'view/_templates/headerAdmin.php';
        // include APP.'view/Acudiente/editar.php';
        // include APP.'view/_templates/footerAdmin.php';
    }

    public function modificar()
    {   
        $acu= new Acudiente();
        $acu->__SET('primerN',$_POST['primerN']);
        $acu->__SET('segundoN',$_POST['segundoN']);
        $acu->__SET('primerA',$_POST['primerA']);
        $acu->__SET('segundoA',$_POST['segundoA']);
        $acu->__SET('telefono',$_POST['telefono']);
        $acu->__SET('direccion',$_POST['direccion']);
        $acu->__SET('id',$_POST['id']);
        $respuesta = $acu->modificar();
        // var_dump($respuesta);
        if($respuesta){
            echo json_encode(array("success" => true));
        // $_SESSION["mensaje"]= "alert('¡Modificación Exitosa!')";
        
        }else{
            echo json_encode(array("success" => false));
        // $_SESSION["mensaje"]= "alert('¡Ups! Error')";
        }

        // header("location: ".URL."/Acudiente");
    }

    public function estado($estado, $id)
    {   
        $acu= new Acudiente();
        $acu->__SET('estado', $estado);
        $acu->__SET('id', $id);
        $respuesta = $acu->cambiarEstado();  

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
                title: '!Error!',
                text: 'No se pudo cambiar el estado', 
                showConfirmButton: false,
                timer: 3100
            })";
        }
        
        header("location: ".URL."/Acudiente");
    }
}
?>