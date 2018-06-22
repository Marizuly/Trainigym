<?php
namespace Mini\Controller;
use Mini\Model\Registrar;
use Mini\Model\TipoDocumento;
use Mini\Model\Genero;
use Mini\Model\Eps;

class RegistrarController{
    public function index()
    {
        $persona= new Registrar();
        $registros = $persona->listar();
        $perfil = $persona->ListarPerfil();
        $TD= new TipoDocumento();
        $respuestaTD = $TD->listarActivo();
        $Genero= new Genero();
        $respuestaGe = $Genero->listarActivo();
        $eps= new Eps();
        $respuestaE = $eps->listarActivo();
        include APP.'view/_templates/headerRegistro.php';
        include APP.'view/registro/index.php';
    }
    public function crear()
    {
        include APP.'view/_templates/headerAdmin.php';
        include APP.'view/TipoMembresia/crear.php';
        include APP.'view/_templates/footerAdmin.php';
    }

    public function registrar()
    {
        $persona= new Persona();
        $persona->__SET('documento',$_POST['documento']);
        $persona->__SET('primerN',$_POST['primerN']);
        $persona->__SET('segundoN',$_POST['segundoN']);
        $persona->__SET('primerA',$_POST['primerA']);
        $persona->__SET('segundoA',$_POST['segundoA']);
        $persona->__SET('fecha',$_POST['fecha']);
        $persona->__SET('telefono',$_POST['telefono']);
        $persona->__SET('celular',$_POST['celular']);
        $persona->__SET('estadoC',$_POST['estadoC']);
        $persona->__SET('correo',$_POST['correo']);
        $persona->__SET('direccion',$_POST['direccion']);
        $persona->__SET('tipoDoc',$_POST['tipoDoc']);
        $persona->__SET('genero',$_POST['genero']);
        $persona->__SET('eps',$_POST['eps']);
        
    $correoEnvia = "mateovasqueza@gmail.com";
    $correoContra = "maleficioinfernal";
    $correoRecibe = $_POST["correo"];

        // $valDoc = $persona->ValidarDocumento();

        // if($valDoc){
        //     $_SESSION["mensaje"] = "swal({
        //         position: 'top-end',
        //         type: 'error',
        //         title: 'Error!',
        //         text: 'El documento ya se encuentra registrado',
        //         showConfirmButton: false,
        //         timer: 2000
        //     })";
        //}
        // else{
            $respuesta2 = $persona->insertarInscripcion();
            $max = $persona->maxid();
            $respuesta = $persona->registrar($max->id);
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
        //}
    }

}
?>