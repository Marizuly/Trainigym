<?php

/**
 * Class HomeController
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

namespace Mini\Controller;
use Mini\Model\Login;
class LoginController
{
    
    public function __construct(){
         
        //  $_SESSION["admin"];
            if ((isset($_SESSION["admin"])) || (isset($_SESSION["instructor"]))) {
          header("location: ".URL."/admin");
        }
        // if (isset($_SESSION["instructor"])) {
        //     header("location: ".URL."/admin");
        //   }
        
    }
    public function index(){
        
        require APP . 'view/_templates/headerRegistro.php';
        require APP . 'view/login/index.php';
        
         
    }

    // public function registrar(){
       
    //                 $persona= new Login();
       
    //                 $persona->__SET('documento',$_POST['documento']);
    //                 $persona->__SET('primerN',$_POST['primerN']);
    //                 $persona->__SET('segundoN',$_POST['segundoN']);
    //                 $persona->__SET('primerA',$_POST['primerA']);
    //                 $persona->__SET('segundoA',$_POST['segundoA']);
    //                 $persona->__SET('fecha',$_POST['fecha']);
    //                 $persona->__SET('telefono',$_POST['telefono']);
    //                 $persona->__SET('celular',$_POST['celular']);
    //                 $persona->__SET('estadoC',$_POST['estadoC']);
    //                 $persona->__SET('correo',$_POST['correo']);
    //                 $persona->__SET('direccion',$_POST['direccion']);
    //                 $persona->__SET('perfil',$_POST['perfil']);
    //                 $persona->__SET('tipoDoc',$_POST['tipoDoc']);
    //                 $persona->__SET('genero',$_POST['genero']);
    //                 $persona->__SET('eps',$_POST['eps']);
            
    //                 $valDoc = $persona->ValidarDocumento();
            
    //                 if($valDoc){
    //                     $_SESSION["mensaje"] = "swal({
    //                         position: 'top-end',
    //                         type: 'error',
    //                         title: 'Error!',
    //                         text: 'El documento ya se encuentra registrado',
    //                         showConfirmButton: false,
    //                         timer: 2000
    //                     })";
    //                 }else{
    //                     $respuesta = $persona->registrar();
                        
    //                     if($respuesta){
    //                         $_SESSION["mensaje"] = "swal({
    //                             position: 'top-end',
    //                             type: 'success',
    //                             title: 'Éxito!',
    //                             text: 'El registro se  realizó correctamente',
    //                             showConfirmButton: false,
    //                             timer: 2000
    //                         })";
    //                     }else{
    //                         $_SESSION["mensaje"] = "swal({
    //                             position: 'top-end',
    //                             type: 'error',
    //                             title: 'No se pudo hacer el Registro',
    //                             showConfirmButton: false,
    //                             timer: 2000
    //                         })";
    //                     }
    //                 }
    //                 header("location: ".URL."/Persona/crear");
    //             }
    //         }
    

                public function inicioAdmin()
                {

                    // if ($row['correo']== $user && password_verify($pass, $row['contrasena'])){
                    //     if($row['estadoPersona']=='Activo'){
                    //         switch ($row['idPerfil']) {
                    //             case 1:$_SESSION['administrador'] = $row['idusuario'];
                    //             header("Location:".URL."Admin/index");
                    //                 break;
                                
                    //             default:
                                    # code...
                    //                 break;
                    //         }
            
                    //     }else{
                    //         $_SESSION["mensaje"] = "swal({
                    //                             position: 'top-end',
                    //                             type: 'error',
                    //                             title: 'Error!',
                    //                             text: 'Contraseña o usuario incorrecto',
                    //                             showConfirmButton: false,
                    //                             timer: 2000
                    //                         })";
                    //     }
                    // }
                    // load views
                    session_start();
                    if(isset($_POST["login"])){
                    $login= new Login();
                    $loginC = $login->inicioAdmin($_POST['correo'] ,md5($_POST ['contrasena']) );
                    // var_dump($loginC);
                       if(!empty($_POST['correo']) && !empty (md5($_POST['contrasena']))) {
                           $correo=$_POST['correo'];
                           $contrasena=md5($_POST['contrasena']);
                                   $idusuario=$loginC->idusuario;
                                   $dbcorreo=$loginC->correo;
                                   $dbcontrasena=$loginC->contrasena;
                                   $dbpersona=$loginC->persona;
                                   $dbPerfil=$loginC->idPerfil;
                                   if($correo == $dbcorreo && $contrasena == $dbcontrasena){
                                   switch ($dbPerfil) {
                                    case 1:                                       
                                    $_SESSION['admin']=$dbpersona;
                                    $_SESSION['idAdmin']=$idusuario;
                                    $_SESSION['password']=$_POST['contrasena'];
                                    /* Redirect browser */
                                    header("Location:".URL."Admin/index");
                                       break;

                                       case 2:
                                         $_SESSION['instructor']=$dbpersona;
                                        $_SESSION['idAdmin']=$idusuario;
                                         
                                        /* Redirect browser */
                                        header("Location:".URL."Programacion/index");
                                       break;
                                       case 3:
                                       $_SESSION['idAdmin']=$idusuario;
                                        

                                       
                                        $estadoI = $login -> consultarEstado($idusuario);
                                        $estado2 = $estadoI->estadoRegistro;
                                        
                                        if ($estado2 == "Sin confirmar") {
                                            header("Location:".URL."login");
                                        $_SESSION["mensaje"] = "
                                        <script>
                                        swal({
                                            position: 'top-end',
                                            type: 'error',
                                            title: 'Error!',
                                            text: 'Debe de tener una venta',
                                            showConfirmButton: false,
                                            timer: 5000
                                        })</script>";   
                                       }else{
                                       $_SESSION['cliente']=$dbpersona;
                                      /* Redirect browser */
                                      header("Location:".URL."Admin/index");
                                       }
                                  
                                     break;
                                     
                                     default:
                                     header("Location:".URL."login");
                                           break;
                                   }

                                }
                                //    $_SESSION['contrasena']=$data->contrasena;
                                
                                if($correo != $dbcorreo || $contrasena != $dbcontrasena) {
                                    header("Location:".URL."login"); 
                                    $_SESSION["mensaje"] = "
                                    <script>
                                    swal({
                                        position: 'top-end',
                                        type: 'error',
                                        title: 'Error!',
                                        text: 'Contraseña o usuario incorrecto',
                                        showConfirmButton: false,
                                        timer: 5000
                                    })</script>";   
    
                           }
                             }
                            
                           
                       
                    }
                    //header("Location:".URL."login");
                    //    } else {
                    //    $message = "Todos los campos son requeridos!";
                    //    }
                   }  
    //                     public function inicioUsuario()
    //    {
    //        // load views
    //        if(isset($_POST["login"])){
    //        $login= new Login();
    //        $loginC = $login->inicioAdmin($_POST['correo'] ,$_POST['contrasena']);
    //        // var_dump($loginC);
    //           if(!empty($_POST['correo']) && !empty($_POST['contrasena'])) {
    //               $correo=$_POST['correo'];
    //               $contrasena=$_POST['contrasena'];
    //               // $query =mysql_query("SELECT * FROM persona WHERE correo='".$correo."' AND contraseña='".$contrasena."'",$con);
              
    //               // $rows=mysql_num_rows($query);
                      
    //                       $dbcorreo=$loginC->correo;
    //                       $dbcontrasena=$loginC->contrasena;
    //                    //    $_SESSION['contrasena']=$data->contrasena;
                      
    //                   if($correo == $dbcorreo && $contrasena == $dbcontrasena){
    //                       $_SESSION['session_username']=$correo;
    //                       /* Redirect browser */
    //                       header("Location:".URL."Admin/index");
                          
    //                   }else{
    //                       header("Location:".URL);
    //                   }
    //               } else {
    //                   $message = "Nombre de usuario ó contraseña invalida!";
    //               }
    //           } else {
    //           $message = "Todos los campos son requeridos!";
    //           }
    //       }
   
    }

?>