<?php
namespace Mini\Controller;

use Mini\Model\Persona;
use Mini\Model\TipoDocumento;
use Mini\Model\Genero;
use Mini\Model\Eps;
use Mini\Model\Acudiente;

class PersonaController{

   public function __CONSTRUCT(){
    
    if(!isset($_SESSION['admin']) && !isset($_SESSION['cliente']) && !isset($_SESSION['instructor'])){
        header("location:".URL."Login");
  }
}

public function index()
{
    $persona= new Persona();
        // $registros = $persona->listar();
    $perfil = $persona->ListarPerfil();
    $TD= new TipoDocumento();
    $respuestaTD = $TD->listarActivo();
    $Genero= new Genero();
    $respuestaGe = $Genero->listarActivo();
    $eps= new Eps();
    $respuestaE = $eps->listarActivo();

    if (isset($_GET["tipo"])) {
        $registros = $persona->listarPorPerfil($_GET["tipo"]);
    }else{
        $registros = $persona->listar();
    }

    include APP.'view/_templates/headerAdmin.php';
    include APP.'view/Persona/index.php';
    include APP.'view/_templates/footerAdmin.php';
}

public function inscripcion()
    {
        $persona= new Persona();
        $registros = $persona->listarInscripcion();
 
        include APP.'view/_templates/headerAdmin.php';
        include APP.'view/Persona/inscripcion.php';
        include APP.'view/_templates/footerAdmin.php';
    }
public function crear(){
        //crea un objeto que contiene las funciones del modelo
    $TD = new TipoDocumento();
        //llamar la funcion listar del modelo TD
    $TipoD = $TD->listarActivo();
    $persona= new Persona();
    $perfil = $persona->ListarPerfil();
    $Genero= new Genero();
    $registro= $Genero->listarActivo();
    $eps= new Eps();
    $registroE= $eps->listarActivo();

    include APP.'view/_templates/headerAdmin.php';
    include APP.'view/persona/crear.php';
    include APP.'view/_templates/footerAdmin.php';
}

public function registrar(){
    $acu= new Acudiente();
    $persona= new Persona();
    $idAcudiente= NULL; 

    if($_POST["gender"] == "menor"){

        $acu->__SET('primerN',trim($_POST['primerNA']));
        $acu->__SET('segundoN',trim($_POST['segundoNA']));
        $acu->__SET('primerA',trim($_POST['primerAA']));
        $acu->__SET('segundoA',trim($_POST['segundoAA']));
        $acu->__SET('telefono',$_POST['telefonoA']);
        $acu->__SET('direccion',trim($_POST['direccionA']));
        $respuesta = $acu->registrar(); 
        $idAcudiente= $acu->MaxIdAcudiente(); 
    }

    $persona->__SET('documento',$_POST['documento']);
    $persona->__SET('primerN',trim($_POST['primerN']));
    $persona->__SET('segundoN',trim($_POST['segundoN']));
    $persona->__SET('primerA',trim($_POST['primerA']));
    $persona->__SET('segundoA',trim($_POST['segundoA']));
    $persona->__SET('fecha',$_POST['fecha']);
    $persona->__SET('telefono',$_POST['telefono']);
    $persona->__SET('celular',$_POST['celular']);
    $persona->__SET('estadoC',$_POST['estadoC']);
    $persona->__SET('correo',trim($_POST['correo']));
    $persona->__SET('direccion',trim($_POST['direccion']));
    $persona->__SET('perfil',$_POST['perfil']);
    $persona->__SET('tipoDoc',$_POST['tipoDoc']);
    $persona->__SET('genero',$_POST['genero']);
    $persona->__SET('acudiente',$idAcudiente->id);
    $persona->__SET('eps',$_POST['eps']); 
    
    $valDoc = $persona->ValidarDocumento();
    
        if($valDoc){
            $_SESSION["mensaje"] = "swal({
                position: 'top-end',
                type: 'error',
                title: '¡Error!',
                text: 'El correo ya se encuentra registrado',
                showConfirmButton: false,
                timer: 5000
            })";
        }else{
        $respuesta = $persona->registrar();
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
    }
    header("location: ".URL."/Persona/crear");
}



public function editar($id)
{
    $persona= new Persona;
    $persona->__SET('id',$id);
    $respuesta = $persona->editar();
    echo json_encode($respuesta);
}

public function modificar()
{   
    $persona= new Persona();
    $persona->__SET('documento',$_POST['documento']);
    $persona->__SET('primerN',trim($_POST['primerN']));
    $persona->__SET('segundoN',trim($_POST['segundoN']));
    $persona->__SET('primerA',trim($_POST['primerA']));
    $persona->__SET('segundoA',trim($_POST['segundoA']));
    $persona->__SET('fecha',$_POST['fecha']);
    $persona->__SET('telefono',$_POST['telefono']);
    $persona->__SET('celular',$_POST['celular']);
    $persona->__SET('estadoC',$_POST['estadoC']);
    $persona->__SET('correo',trim($_POST['correo']));
    $persona->__SET('direccion',trim($_POST['direccion']));
    $persona->__SET('perfil',$_POST['perfil']);
    $persona->__SET('tipoDoc',$_POST['tipoDoc']);
    $persona->__SET('genero',$_POST['genero']);
    $persona->__SET('eps',$_POST['eps']);
    $persona->__SET('id',$_POST['id']);
    $respuesta = $persona->modificar();
    
    if($respuesta){
        echo json_encode(array("success" => true));
    }else{
        echo json_encode(array("success" => false));
    }
}

public function estado($estado, $id)
{   
    $persona= new Persona();
    $persona->__SET('estado', $estado);
    $persona->__SET('id', $id);
    $respuesta = $persona->cambiarEstado();  

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
    
    header("location: ".URL."/Persona");
}

public function validar($tipo, $documento){
    $persona= new Persona();
    $persona->__SET('tipoDoc', $tipo);
    $persona->__SET('documento', $documento);
    $respuesta = $persona->validarDocumento();

    if($respuesta){
        echo json_encode(array("success"=>true));
    }else{
        echo json_encode(array("success"=>false));
    }
}

public function ejemploPDF($val){
    $mpdf = new \Mpdf\Mpdf();
    $persona= new Persona();
    $titulo = "";
    $ListaUsuarios = $persona->listarPdf($val);
    if($val == 0){
        $titulo = "Lista de todas las personas";
    }else {
        if($val == 3){
            $titulo = "Lista de clientes";
        }else{
            $titulo = "Lista de instructores";            
        }
    }
    $tBody = "";
    
    foreach($ListaUsuarios as $value){
        $tBody .= "<tr><td style='text-align:center;'>".$value->doc."</td>
                        <td style='text-align:center;'>".$value->pn." ".$value->sn." ".$value->pa." ".$value->sa."</td>
                        <td style='text-align:center;'>".$value->tel."</td>
                        <td style='text-align:center;'>".$value->eps."</td>
                        <td style='text-align:center;'>".$value->correo."</td>";
    }

    $html = "<style>@page {
                    margin-top: 0.5cm;
                    margin-bottom: 0.5cm;
                    margin-left: 0.5cm;
                    margin-right: 0.5cm;
                }
            </style>".
                "<body>
                <img src='img/Logo.png' style='text-align:center;' width='270px' height='110px'></a>
                    <h1 style='text-align:center;color:#1ba40b;'>".$titulo."</h1>
                        <table border='1' cellspacing='0' width='100%'>
                        <thead>
                            <tr>
                            <th>Documento</th>
                            <th>Nombres</th>
                            <th>Teléfono</th>
                            <th>Eps</th>
                            <th>Correo</th>
                            </tr>
                        </thead>
                        <tbody>
                        ".$tBody."
                        </tbody>
                    </table>
                </body>";

    $mpdf->WriteHTML($html);
    
    $mpdf->Output("Usuarios.pdf", "I");
}
}
?>