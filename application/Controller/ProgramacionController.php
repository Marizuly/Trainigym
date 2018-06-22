<?php
namespace Mini\Controller;
use Mini\Model\programacion;
use Mini\Model\clase;
use Mini\Model\persona;

class ProgramacionController{


//     dayClick: function(date, allDay, jsEvent, view){
// //captura los datos de fecha en inputs de tipo hidden
// $("#input_date").val($.fullCalendar.formatDate( date, 'yyyy-MM-dd HH:mm:ss' ));
// $("#input_allDay").val(allDay);

// }
public function __construct(){
    if ((!isset($_SESSION["admin"])) && (!isset($_SESSION["instructor"])) && (!isset($_SESSION["cliente"]))) {
        header("location: ".URL."/admin");
      }
}

    public function index(){

        $programacion= new programacion();
        $registros = $programacion->listar();
        $clase = new clase();
        $registro = $clase->listar();
        $persona = new persona();
        $reg = $persona->listarInstructor();
        $registrosEditar= $clase->lis();
        include APP. 'view/_templates/headerAdmin.php';
        include APP.'view/programacion/index.php';
        include APP.'view/_templates/footerAdmin.php';
    }

    public function registrar(){
        $programacion= new Programacion();
        $programacion->__SET('fecha',$_POST['fecha']);
        $programacion->__SET('horaInicio',$_POST['horaInicio']);
        $programacion->__SET('horaFinal',$_POST['horaFinal']);
        $programacion->__SET('color',$_POST['color']);
        $programacion->__SET('idClase',$_POST['clase']);
        $programacion->__SET('idusuario',$_POST['instructor']);

        // El campo clase no puede estar vacio 
        // $idClas = $_POST['clase']; 

        if($_POST['horaInicio'] > $_POST['horaFinal']){
            $_SESSION["mensaje"] = "swal({
                position: 'top-end',
                type: 'error',
                title: '!Error!',
                text: 'La hora de inicio no puede ser superior a la hora final',
                showConfirmButton: false,
                timer: 5000
            })";
        }else{
        $respuesta = $programacion->registrar();

        if($respuesta){
            $_SESSION["mensaje"] = "swal({
                position: 'top-end',
                type: 'success',
                title: '¡Éxito!',
                text: 'El registro se  realizó correctamente',
                showConfirmButton: false,
                timer: 5000
            })";
        }
        // else{
        //     $_SESSION["mensaje"] = "swal({
        //         position: 'top-end',
        //         type: 'error',
        //         title: 'Debe de seleccionar todos los campos',
        //         showConfirmButton: false,
        //         timer: 5000
        //     })";
        // }
}

        header("location: ".URL."/programacion/index");
    }

    public function modificar(){
        $programacion= new Programacion();
        $programacion->__SET('fecha',$_POST['fechaEdit']);
        $programacion->__SET('horaInicio',$_POST['horaInicioEdit']);
        $programacion->__SET('horaFinal',$_POST['horaFinalEdit']);
        $programacion->__SET('color',$_POST['colorEdit']);
        $programacion->__SET('idClase',$_POST['claseEdit']);
        $programacion->__SET('idusuario',$_POST['instructorEdit']);
        $programacion->__SET('id',$_POST['idProgramacion']);
        

        if($_POST['horaInicioEdit'] >= $_POST['horaFinalEdit']){
            $_SESSION["mensaje"] = "swal({
                position: 'top-end',
                type: 'error',
                title: '!Error!',
                text: 'La hora de inicio no puede ser superior a la hora final',
                showConfirmButton: false,
                timer: 5000
            })";
        }
        else{
        $respuesta = $programacion->modificar();



        if($respuesta){
            $_SESSION["mensaje"] = "swal({
                position: 'top-end',
                type: 'success',
                title: '¡Éxito!',
                text: 'El registro se ha  modificado exitosamente',
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
}
        header("location: ".URL."/programacion/index");
    }
    public function eliminar(){
        $programacion= new programacion;
        $programacion->__SET('id',$_POST['idProgramacion']);
        $respuesta = $programacion->eliminar();

        if($respuesta){
            $_SESSION["mensaje"]= "swal({
                position: 'top-end',
                type: 'success',
                title: '!Éxito!',
                text: 'El evento se eliminó correctamente',
                showConfirmButton: false,
                timer: 5000
            });";
        }else{
            $_SESSION["mensaje"]= "swal({
                position: 'top-end',
                type: 'error',
                title: '!Error!',
                text: 'No se puede eliminar el evento',
                showConfirmButton: false,
                timer: 5000
            });";
        }

        header("location: ".URL."/programacion/index");
    }
}
?>