<?php
namespace Mini\Controller;

use Mini\Model\Clase;

class ClaseController{
//el controlador tiene  dos metodos
//index que muestra la vista
public function __construct(){
    if ((!isset($_SESSION["admin"])) && (!isset($_SESSION["instructor"]))) {
        header("location: ".URL."/admin");
      }
}  
public function index(){

        $Clase= new Clase();
        $Clase1 = $Clase->listarIndex();
        
        include APP.'view/_templates/headerAdmin.php';
        include APP.'view/Clase/index.php';
        include APP.'view/_templates/footerAdmin.php';
    }


    public function crear()
    {
        
                include APP.'view/_templates/headerAdmin.php';
                include APP.'view/Clase/crear.php';
                include APP.'view/_templates/footerAdmin.php';
    }
        
        //metodo que instancia el modelo, manda los datos por set
            public function registrar()
            {
                $TM= new Clase();
                $TM->__SET('nombre',$_POST['nombreClase']);
                $TM->__SET('descripcion',$_POST['descripcion']);
                $respuesta = $TM->registrar();

                if($respuesta){
            $_SESSION["mensaje"]= "swal({
                position: 'top-end',
                type: 'success',
                title: '!Éxito!',
                text: 'El registro se ha realizado corectamente',
                showConfirmButton: false,
                timer: 3100
            })";
        }else{
            $_SESSION["mensaje"]= "swal({
                position: 'top-end',
                type: 'error',
                title: '!Error!',
                text: 'No se pudo hacer el Registro', 
                showConfirmButton: false,
                timer: 3100
            })";
        }
        
        header("location: ".URL."/Clase/index");
    }   
            public function editar($id){
                //instancia
                $Clase= new Clase;
                $Clase->__SET('id',$id);
                //metodo que voy a llamar
                $respuesta = $Clase->editar();
                //luego se llama a la vistar
                echo json_encode($respuesta);


            }
// function validar(){
//         var campo = document.getElementById('clase').value;
//         if(campo == null || campo.length == 0 || /^\s+$/.test(campo)){
            
//             alertify.alert('Titulo','Debes llenar el campo');
//             return false;
//             }

// }
            //metodo que instancia el modelo, manda los datos por set
            public function modificar()
            {   
                $Clase= new Clase();
                $Clase->__SET('nombre',$_POST['nombre']);
                $Clase->__SET('descripcion',$_POST['descripcion']);
                $Clase->__SET('id',$_POST['id']);
                $respuesta = $Clase->modificar();
                
                $array = array('success' => $respuesta );
                echo json_encode($array);
                

        //        
        
        // header("location: ".URL."/Clase/index");
    }   
           public function estado($estado, $id)
    {   
        $TM= new Clase();
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
                title: '!Error!',
                text: 'No se pudo cambiar el estado', 
                showConfirmButton: false,
                timer: 3100
            })";
        }
        
        header("location: ".URL."/Clase/index");
    }   
}

?>