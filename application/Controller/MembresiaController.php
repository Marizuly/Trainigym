<?php
namespace Mini\Controller;
use Mini\Model\Membresia;
use Mini\Model\TipoMembresia;
use Mini\Model\Tarifas;
use Mini\Model\horario;

class MembresiaController{

    public function __construct(){
        if(!isset($_SESSION['admin'])){
            header("location:".URL."Login");
        } 
    }
    
    public function index()
    {
        $mem= new Membresia();
        $registros = $mem->listar();
        $TM= new TipoMembresia();
        $tipoM= $TM->listarActivo();
        $tarifa = new Tarifas();
        $tar = $tarifa->listarActivo();
        include APP.'view/_templates/headerAdmin.php';
        include APP.'view/Membresia/index.php';
        include APP.'view/_templates/footerAdmin.php';
    }

    public function crear(){
        $mem= new Membresia();
        $registrosM =$mem->listarActivo();
        $TM= new TipoMembresia();
        $tipoM= $TM->listarActivo();
        $tarifa = new Tarifas();
        $tar = $tarifa->listarActivo();
        include APP.'view/_templates/headerAdmin.php';
        include APP.'view/Membresia/crear.php';
        include APP.'view/_templates/footerAdmin.php';
    }

    public function registrar()
    {
        $mem= new Membresia();
        $horario= new Horario();
        if(!isset($_POST['beneficiarioM'])){
            $_POST['beneficiarioM'] = 0;
        }else{
            $_POST['beneficiarioM'] = 1;
        }
        $mem->__SET('nombre',$_POST['nombre']);
        $mem->__SET('cantidad',$_POST['cantidad']);
        $mem->__SET('tipoM',$_POST['tipoM']);
        $mem->__SET('tarifa',$_POST['tar']);
        $mem->__SET('beneficiario',$_POST['beneficiarioM']);
        $respuesta = $mem->registrar();

        // var_dump($_POST['beneficiarioM']);
        // exit;

        if(isset($_POST["gender"])== true){
            $dias = "";
            foreach($_POST['states'] AS $row){
                $dias = $dias.", ".$row;
            }
            $dia = substr($dias, 2);
            $idMembresia = $mem->MaxId();
            $horario->__SET('membresia',$idMembresia->idMem);
            $horario->__SET('iam',$_POST['iam']);
            $horario->__SET('fam',$_POST['fam']);
            $horario->__SET('ipm',$_POST['ipm']);
            $horario->__SET('fpm',$_POST['fpm']);
            $horario->__SET('dia',$dia);
            $respuesta = $horario->registrar();
            
        }else{
            $idMembresia = $mem->MaxId();
            $horario->__SET('membresia',$idMembresia->idMem);
            $horario->__SET('iam','06:00:00');
            $horario->__SET('fam','11:59:00');
            $horario->__SET('ipm','14:00:00');
            $horario->__SET('fpm','22:00:00');
            $horario->__SET('dia','Ninguno');
            $respuesta = $horario->registrar();
        }

        if($respuesta){
            $_SESSION["mensaje"] = "swal({
                position: 'top-end',
                type: 'success',
                title: 'Éxito!',
                text: 'El registro se  realizó correctamente',
                showConfirmButton: false,
                timer: 5000
            })";
        }else{
            $_SESSION["mensaje"] = "swal({
                position: 'top-end',
                type: 'error',
                title: 'No se pudo hacer el Registro',
                showConfirmButton: false,
                timer: 5000
            })";
        }
        header("location: ".URL."/Membresia/crear");
    }

    public function editar($id)
    {
        $mem= new Membresia;
        $mem->__SET('id',$id);
        $respuesta = $mem->editar();
        echo json_encode($respuesta);
    }

    public function modificar()
    {   
        $mem= new Membresia();
        $horario= new Horario();

        if(!isset($_POST['beneficiarioM'])){
            $_POST['beneficiarioM'] = 0;
        }else{
            $_POST['beneficiarioM'] = 1;
        }

        $mem->__SET('id',$_POST['id']);
        $mem->__SET('nombre',$_POST['nombre']);
        $mem->__SET('cantidad',$_POST['cantidad']);
        $mem->__SET('tipoM',$_POST['tipoM']);
        $mem->__SET('tarifa',$_POST['tar']);
        $mem->__SET('beneficiario',$_POST['beneficiarioM']);
        

        $respuesta = $mem->modificar();
        $dias = "";
        foreach($_POST['states'] AS $row){
            $dias = $dias.", ".$row;
        }
        $dia = substr($dias, 2);
        $horario->__SET('membresia',$_POST['id']);
        $horario->__SET('iam',$_POST['iam']);
        $horario->__SET('fam',$_POST['fam']);
        $horario->__SET('ipm',$_POST['ipm']);
        $horario->__SET('fpm',$_POST['fpm']);
        $horario->__SET('dia',$dia);
        $respuesta = $horario->modificar();
        
        if($respuesta){
            echo json_encode(array('success'=>true));
        }else{
            echo json_encode(array('success'=>false));
        }
    }

    public function estado($estado, $id)
    {   
        $mem= new Membresia();
        $mem->__SET('estado', $estado);
        $mem->__SET('id', $id);
        $respuesta = $mem->cambiarEstado();  

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
        
        header("location: ".URL."/Membresia");
    }
}
?>
