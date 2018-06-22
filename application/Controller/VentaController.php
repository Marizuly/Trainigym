<?php
namespace Mini\Controller;
use Mini\Model\Venta;
use Mini\Model\Persona;
use Mini\Model\horario;
use Mini\Model\Membresia;
use Mini\Model\Tarifas;


class VentaController{
    
    public function __construct(){
        if(!isset($_SESSION['admin'])&& !isset($_SESSION['cliente'])){
            header("location:".URL."Login");
        } 
    }
    
    public function index()
    {
        $venta= new Venta();
        // $registros = $venta->listar();
        $persona= new Persona();
        $per = $persona->listarCliente();
        $horario= new Horario();
        $hora = $horario->listar();
        $mem= new Membresia();
        $membresia = $mem->listarActivo2();
        setlocale(LC_ALL,"es_CO");
        $hoy = date("Y-m-d");
        $cambiarEstado = $venta->listarPorEstado("Activa");

        foreach($cambiarEstado as $value){
            if($value->fechaFin < $hoy){
                $venta->cambiarEstadoVenta($value->idcomprobanteServicio);
            }
        }
        
        if(isset($_GET["estado"])){
            $registros = $venta->listarPorEstado($_GET["estado"]);
        }else{
            $registros = $venta->listar();
        } 
        include APP.'view/_templates/headerAdmin.php';
        include APP.'view/Venta/index.php';
        include APP.'view/_templates/footerAdmin.php';
    }

    public function crear(){
        $venta= new Venta();
        $registros = $venta->listar();
        $persona= new Persona();
        $per = $persona->listarCliente();
        $horario= new Horario();
        $hora = $horario->listar();
        $mem= new Membresia();
        $membresia = $mem->listarActivo2();
        
        setlocale(LC_ALL,"es_CO");
        $hoy = date("Y-m-d");
        $cambiarEstado = $venta->listarPorEstado("Activa");

        foreach($cambiarEstado as $value){
            if($value->fechaFin < $hoy){
                $venta->cambiarEstadoVenta($value->idcomprobanteServicio);
            }
        }
        
        include APP.'view/_templates/headerAdmin.php';
        include APP.'view/venta/crear.php';
        include APP.'view/_templates/footerAdmin.php';
    }

    public function registrar(){
        $venta= new Venta();
        $venta->__SET('cantidad',$_POST['cantidad']);
        $venta->__SET('fechaFin',$_POST['fechaFin']);
        $venta->__SET('total',$_POST['total']);
        $venta->__SET('fecha',$_POST['date']);
        $venta->__SET('usuario',$_POST['documento']);
        $venta->__SET('beneficiario',$_POST['documento1']);

        $valusu= $venta->validarVenta();
        if($valusu){
            $_SESSION["mensaje"] = "swal({
                position: 'top-end',
                type: 'error',
                title: '¡Error!',
                text: 'El usuario ya tiene una venta',
                showConfirmButton: false,
                timer: 2000
            })";
        }else{

        $respuesta = $venta->registrar();

        if($respuesta){
            $max = $venta->maxId();
            $horario = $_POST["IdHorario"];
            $detalle = $venta->registrarDetalle($max->id, $horario);

            if($detalle){
                $_SESSION["mensaje"] = "swal({
                    position: 'top-end',
                    type: 'success',
                    title: 'Éxito!',
                    text: 'La venta se realizó Correctamente',
                    showConfirmButton: false,
                    timer: 2000
                })";
            }else{
                $_SESSION["mensaje"] = "swal({
                    position: 'top-end',
                    type: 'error',
                    title: 'No se hizo el registro de venta',
                    showConfirmButton: false,
                    timer: 2000
                })";
            }
            
        }else{
            $_SESSION["mensaje"] = "swal({
                position: 'top-end',
                type: 'error',
                title: 'No se hizo el registro de venta',
                showConfirmButton: false,
                timer: 2000
            })";
        }
    }
        header("location: ".URL."/Venta/crear");
        // var_dump($_POST['fechaFin']);
    }

    public function estado($estado, $id){   
        $venta= new Venta();
        $venta->__SET('estado', $estado);
        $venta->__SET('id', $id);
        $respuesta = $venta->cambiarEstado();  

        if($respuesta){
            echo json_encode(array('success' => true));
        }else{
            echo json_encode(array('success' => false));
        } 

    }

    public function consultarDatosMembresia($id){
        $venta = new Venta();
        $valores = $venta->consultarDatosMembresia($id);
        echo json_encode($valores);
    }

    public function consultarDatosPersona($idPersona){
        $persona= new Persona();
        $valores =$persona->consultarDatos($idPersona);
        echo json_encode($valores);
    }

    public function ejemploPDF(){
        $mpdf = new \Mpdf\Mpdf();
        $venta = new Venta();
        $ListaVenta = $venta->listarV();
        $tBody = "";
        foreach($ListaVenta as $value){
            $tBody .= "<tr><td style='text-align:center;'>".$value->doc."</td>
                            <td style='text-align:center;'>".$value->pn." ".$value->sn." ".$value->pa." ".$value->sa."</td>
                            <td style='text-align:center;'>".$value->mem."</td>
                            <td style='text-align:center;'>".$value->cant."</td>
                            <td style='text-align:center;'>".$value->venta."</td>
                            <td style='text-align:center;'>".$value->final."</td>
                            <td style='text-align:center;'>".$value->total."</td>
                            <td style='text-align:center;'>".$value->estado."</td>";
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
                        <h1 style='text-align:center;color:#1ba40b;'>Reporte de Ventas</h1>
                            <table border='1' cellspacing='0' width='100%'>
                            <thead>
                                <tr>
                                <th>N° documento</th>
                                <th>Nombres</th>
                                <th>Membresía</th>
                                <th>Cantidad</th>
                                <th>fecha de Inicio</th>
                                <th>fecha de Terminación</th>
                                <th>Total pagado</th>
                                <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                            ".$tBody."
                            </tbody>
                        </table>
                    </body>";
    
        $mpdf->WriteHTML($html);
        
        $mpdf->Output("Ventas.pdf", "I");
    }
}
?>