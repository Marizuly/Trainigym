<?php
namespace Mini\Controller;

use Mini\Model\novedades;
use Mini\Model\TipoNovedad;
use Mini\Model\persona;

class novedadesController{

    public function __construct(){
        if(!isset($_SESSION['admin'])){
            header("location:".URL."Login");
        } 
    }

    public function index(){
        $novedad= new novedades();
        $registros = $novedad->listar();
        $TN= new TipoNovedad();
        $p= new persona();
        $datos = $p->listarCliente();
        $tipoN= $TN->listarActivo();
        include APP.'view/_templates/headerAdmin.php';
        include APP.'view/novedades/index.php';
        include APP.'view/_templates/footerAdmin.php';
    }
    public function eliminar(){


        $novedad= new novedades();
        $novedad->__SET('idComprobante',$_POST['id']);
        $respuesta=$novedad->eliminar();
    
        if ($respuesta==1){
            $array = array('status' => "true" );
        echo json_encode($array);
        }elseif ($respuesta==0) {
            $array = array('status' => "false"  );
        echo json_encode($array);
    
        }
    }   

    public function crear(){


        $novedad= new novedades();
        $TN= new TipoNovedad();
        $tipoN= $TN->listarActivo();
        $p= new persona();
        //listar a los clientes
        $datos = $p->listarClienteVentaActiva();
        
        // $registrosN =$novedad->listarActivo();

        include APP.'view/_templates/headerAdmin.php';
        include APP.'view/novedades/crear.php';
        include APP.'view/_templates/footerAdmin.php';
    }

//metodo que instancia el modelo, manda los datos por set
    public function registrar(){

        $novedad= new novedades();
        
        $novedad->__SET('descripcion',$_POST['descripcion']);
        $novedad->__SET('idComprobante',$_POST['documento']);
        $novedad->__SET('tipoN',$_POST['tipoN']);
        $novedad->__SET('fechaNovedad',$_POST['fechaNovedad']);

        $respuesta = $novedad->registrarnovedades();
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
         header("location: ".URL."/novedades/crear");

    }

    public function editar($idNovedades)
    {
        $novedad= new novedades;
        $novedad->__SET('idNovedades',$idNovedades);
        $respuesta = $novedad->editar();
         echo json_encode($respuesta);
    }


    //metodo que instancia el modelo, manda los datos por set
    public function modificar()
    {   
        $novedad= new novedades();
        $novedad->__SET('descripcion',$_POST['descripcion']);
        $novedad->__SET('fechaNovedad',$_POST['fechaNovedad']);
        $novedad->__SET('idNovedades',$_POST['idNovedades']);
        $novedad->__SET('tipoN',$_POST['tipoN']);
        $novedad->__SET('p',$_POST['p']);
        //llama al metodo guardar
        $respuesta = $novedad->modificar();  
         if($respuesta){
            echo json_encode(array('success'=>true));
        }else{
            echo json_encode(array('success'=>false));
        }
    }     
   

    public function consultarDatosPersona($idPersona){
        $persona= new Persona();
        $valores =$persona->consultarDatos($idPersona);
        echo json_encode($valores);
    }
}