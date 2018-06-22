<?php
namespace Mini\Controller;

use Mini\Model\Tarifas;

class TarifasController{

    public function __construct(){
        if(!isset($_SESSION['admin'])){
            header("location:".URL."Login");
        } 
    }
    
    public function index()
    {
        $tarifa = new Tarifas();
        $registros= $tarifa->listar();

        include APP.'view/_templates/headerAdmin.php';
        include APP.'view/Tarifas/index.php';
        include APP.'view/_templates/footerAdmin.php';
        }

    public function crear()
    {
        include APP.'view/_templates/headerAdmin.php';
        include APP.'view/Tarifas/crear.php';
        include APP.'view/_templates/footerAdmin.php';
    }

    public function registrar()
    {
        $tarifa = new tarifas();
        $tarifa->__SET('valor',$_POST['valor']);
        $tarifa->__SET('ano',$_POST['ano']);
        $respuesta = $tarifa->registrarT();
    

    if($respuesta){
        $_SESSION["mensaje"] = "swal({
            position: 'top-end',
            type: 'success',
            title: 'Éxito!',
            text: 'El registro se  realizó correctamente',
            showConfirmButton: false,
            timer: 2000
        })";
    }else{
        $_SESSION["mensaje"] = "swal({
            position: 'top-end',
            type: 'error',
            title: 'No se pudo hacer el Registro',
            showConfirmButton: false,
            timer: 2000
        })";
    }
    header("location: ".URL."/Tarifas/index");
}

    public function editar($id)
    {
        $tarifa = new tarifas();
        $tarifa->__SET('id',$id);
        $respuesta=$tarifa->editar();
        echo json_encode($respuesta);
    }   

    public function modificar()
    {
        $tarifa = new tarifas();
        $tarifa->__SET('valor',$_POST['valor']);
        $tarifa->__SET('ano',$_POST['ano']);
        $tarifa->__SET('id',$_POST['id']);
        $respuesta = $tarifa->modificar();

        if($respuesta){
            echo json_encode(array("success" => true));
        }else{
            echo json_encode(array("success" => false));
        }
    }

    public function estado($estado, $id)
    {
        $tarifa = new tarifas();
        $tarifa->__SET('estado', $estado);
        $tarifa->__SET('id', $id);
        $respuesta = $tarifa->cambiarEstado();

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
        header("location: ".URL."/Tarifas");
    }
}
?>