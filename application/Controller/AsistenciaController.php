<?php
namespace Mini\Controller;

use Mini\Model\asistencia;
use Mini\Model\Persona;
class asistenciaController {
    
    public function __construct(){
        if(!isset($_SESSION['admin']) && !isset($_SESSION['cliente'])){
            header("location:".URL."Login");
        }
    }
    
    public function crear($insert = 0, $volver = 0){
        $TD= new asistencia();         
        $res = $TD->listarDocumento();
        $asis = $insert; 
        include APP.'view/_templates/headerAdmin.php';
        include APP.'view/asistencia/crear.php';
        include APP.'view/_templates/footerAdmin.php';
    }


    public function index(){
        $control = new asistencia;
        if(isset($_SESSION['admin'])){
        $asis = $control -> listarAsistencia();
    }if(isset($_SESSION['cliente'])){
        $ids=$_SESSION["idAdmin"];
        $asis = $control -> listarAsistencia2($ids);
    }
        include APP.'view/_templates/headerAdmin.php';
        include APP.'view/asistencia/index.php';
        include APP.'view/_templates/footerAdmin.php';

    }

//metodo que instancia el modelo, manda los datos por set
    public function registrar(){
        if (isset($_POST["guardar"])) {       
        $control = new asistencia;  
        $control->__SET('idcomprobante',$_POST['documento']);
        
        $idcompro = $_POST['documento'];
        $documen = $_POST['documento'];
        $con=$control->cantidad();
        $can=$con->cantidad;
        $fechaA=$control->fechaActual();
        $valHora=$control->valHora();
        $valHora2=$control->valHora2();
         $valHora3=$valHora2->hora;
        // $diaSemana = $control->diaSemana();
        // $diaSemana2 = $diaSemana->DIA_SEMANA;
        // $control->__SET('diaSemana',$diaSemana2);

        // $dia = $control->valDia2();
        // $dia2 = $dia->dia;

        // validacion campos vacios
        if ($documen == 0) {
            
            $_SESSION["mensaje"] = "swal({
                position: 'top-end',
                type: 'error',
                title: '¡Error!',
                text: 'los campos son obligatorios',
                showConfirmButton: false,
                confirmButtonColor: '#d33'
            })";

            header("location: ".URL."/asistencia/crear");
         
        }//Actualizamos asistencia 
        elseif ($fechaA) {
        //    var_dump($dia2);
            $_SESSION["mensaje"] = "swal({
                position: 'top-end',
                type: 'error',
                title: '¡Error!',
                text: 'El usuario ya registró la asistencia de   hoy ',
                showConfirmButton: false,
                timer: 2000
            })";
            header("location: ".URL."/asistencia/crear");
        }elseif ($valHora == false) {
           
            $_SESSION["mensaje"] = "swal({
                position: 'top-end',
                title: '¡Error!',
                text: 'La hora de ingreso no corresponde a su membresía         ".$valHora3."' ,
                type: 'error',
                confirmButtonColor: '#d33'
            })";
            header("location: ".URL."/asistencia/crear");
        }else{
            $insert = $control->insertarAsistencia();
            if ($can == 0) {
             if ($insert) {
                // echo '<script>alert("Tiquetera actualizada (Mem)");</script>'; 
                $insert = $control->consultarAsistencia();
                $this->crear($insert, $volver = 1);
            }
            //Actualizamos tiquetes y se marca asistencia
         } if ($can != 0) {
            $insert = $control->actualizarTiquetes();
            if ($insert) {
                // echo '<script>alert("Tiquetera actualizada (Tiq)");</script>'; 
                // header("location: ".URL."/asistencia/crear");
                $insert = $control->consultarAsistencia();
                $this->crear($insert, $volver = 1);
                $can = $can - 1;
                if ($can == 0) {
                    $cambiarE = $control->estadoVentaF();
                }          
            }
        }
    }
}else{
    header("location: ".URL."/asistencia/crear");
    }
}
 
   
    public function editar($idcontrolE_S)
    {
        $control= new controlE_S;
        $control->__SET('idcontrolE_S',$idcontrolE_S);
        $respuesta = $control->editar();
        include APP.'view/_templates/headerAdmin.php';
        include APP.'view/controlE_S/editar.php';
        include APP.'view/_templates/footerAdmin.php';
    }


    //metodo que instancia el modelo, manda los datos por set
    public function modificar()
    {   
         $control= new controlE_S();
        $control->__SET('idcontrolE_S',$_POST['idcontrolE_S']);
        $control->__SET('horaE',$_POST['horaE']);
        $control->__SET('horaS',$_POST['horaS']);
        $control->__SET('fecha',$_POST['fecha']);
        //llama al metodo guardar
        $respuesta = $control->modificar();       
    } 
}
?>