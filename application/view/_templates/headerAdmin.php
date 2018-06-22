<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="<?= URL ?>/img/lpesa.png">
    <title>Energym Xtreme</title>
    
    <!-- Bootstrap Core CSS -->
    <link href="<?= URL ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= URL ?>css/sweetalert2.min.css" rel="stylesheet">
    <link href="<?= URL ?>css/dataTables.min.css" rel="stylesheet">
    <link href="<?= URL ?>css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?= URL ?>css/sb-admin.css" rel="stylesheet">
    <link href="<?= URL ?>css/select2.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Morris Charts CSS -->
    <link href="<?= URL ?>css/plugins/morris.css" rel="stylesheet">
    <link href="<?= URL ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- Style CSS -->
    <link rel="stylesheet" type="text/css" href="<?= URL ?>/css/style1.css">
    <link rel="stylesheet" type="text/css" href="<?= URL ?>/css/styleAdmin.css">
    <link rel="stylesheet" type="text/css" href="<?= URL ?>/css/fullcalendar.css">

    <script src="<?php echo URL; ?>js/jquery-1.10.2.js"></script>
    <script src="<?php echo URL; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo URL; ?>js/jquery.dataTables.min.js"></script>
    <script src="<?php echo URL; ?>js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo URL; ?>js/dataTable.responsive.min.js"></script>
    <script src="<?php echo URL; ?>js/responsive.bootstrap.min.js"></script>

    <!-- <script src="//cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="//cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script> -->

    <script src="<?php echo URL; ?>js/sweetalert2.min.js"></script>
    <script src="<?php echo URL; ?>js/bootstrap-datepicker.js"></script>
    <script src="<?php echo URL; ?>js/select2.min.js"></script>
    <script src="<?php echo URL; ?>js/script/validaciones.js"></script>
    <script src="<?php echo URL; ?>js/script/datatable.js"></script>
    <script src="<?php echo URL; ?>js/moment.min.js"></script>
    <script src="<?php echo URL; ?>js/fullcalendarLocale-es.js"></script>
    <script src="<?php echo URL; ?>js/fullcalendar.min.js"></script>
    
    <!-- calendario -->
    <!-- <link href="<?= URL ?>css/datepicker.css" rel="stylesheet"> -->
</head>

<body>
    <!-- Navigation -->
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <!-- Energym Xtreme -->
                    <img src="<?= URL ?>img/logo1.png" class="Logo" title="Energym Xtreme" alt="Energym Xtreme" width="160px">
                </a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="medi-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php if(isset($_SESSION["instructor"]) ){ ?><i class="fa fa-user"></i> <?php echo($_SESSION["instructor"]) ?> <?php } elseif(isset($_SESSION["admin"]) ){ ?><i class="fa fa-user"></i> <?php echo($_SESSION["admin"]) ?> <?php } elseif(isset($_SESSION["cliente"])){ ?><i class="fa fa-user"></i> <?php echo($_SESSION["cliente"]) ?> <?php } ?> <b class="caret"></b></a>   <ul class="dropdown-menu">

                            <li>
                            <a href="<?= URL ?>Datos/index"><i class="fa fa-fw fa-user"></i> Mis datos </a>
                        </li>
                            <!-- <li>
                                <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                            </li>
                            <li class="divider"></li> -->
                            <li>
                                <form method="post">
                                    <center><button type="submit" class="btn" href="login.php" name="log"><i class="fa fa-fw fa-power-off"></i> Cerrar sesión</button></center>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <?php if(isset($_SESSION["admin"])){ ?>

                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-group"></i> Usuarios<i class="fa fa-fw fa-caret-down" ></i></a>
                            <ul id="demo" class="collapse">
                                <li><a href="<?= URL ?>persona/inscripcion">Inscripción</a></li>
                                <li><a href="<?= URL ?>persona/crear">Registrar Usuarios</a></li>
                                <li><a href="<?= URL ?>persona/index">Consultar Usuarios</a></li>
                            </ul>
                        </li>
                        <?php } ?>
                        <?php if((isset($_SESSION["admin"]) || isset ($_SESSION["cliente"]))){ ?>
                    <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-shopping-cart"></i> Venta <i class="fa fa-fw fa-caret-down"></i></a>
                            <ul id="demo1" class="collapse">
                            <?php if(isset($_SESSION["admin"])){ ?>
                                <li> <a href="<?= URL ?>Venta/crear">Registrar venta</a></li>
                                <?php } ?>
                                <li> <a href="<?= URL ?>Venta/index">Consultar venta</a></li>
                            </ul>
                        </li>
                        <?php } ?>
                        <?php if((isset($_SESSION["admin"])) || (isset($_SESSION["instructor"])) || (isset($_SESSION["cliente"]))){ ?>
                     <li>
                            <a href="<?= URL ?>programacion/index" data-toggle="collapse" data-target="#demo4"><i class="fa fa-calendar"></i> Programación <i class="fa fa-fw fa-caret-down"></i></a>
                       
                    </li>
                    <?php } ?>
                    <?php if((isset($_SESSION["admin"])) || (isset($_SESSION["instructor"]))){ ?>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo3"><i class="fa fa-thumb-tack"></i> Clases <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo3" class="collapse">
                            <li><a href="<?= URL ?>clase/crear">Registrar Clase</a></li>
                            <li><a href="<?= URL ?>clase/index">Consultar Clase</a></li>
                        </ul>
                    </li>
                    <?php } ?>
                    <?php if(isset($_SESSION["admin"])){ ?>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo5"><i class="fa fa-ticket"></i> Membresía <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo5" class="collapse">
                            <li><a href="<?= URL ?>Membresia/crear">Registrar Membresía</a></li>
                            <li> <a href="<?= URL ?>Membresia/index">Consultar Membresía</a></li>
                        </ul>
                    </li>
                    <?php } ?>
                    <?php if(isset($_SESSION["admin"]) || (isset($_SESSION["cliente"]))){ ?>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo6"><i class="fa fa-check-square-o"></i> Asistencia <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo6" class="collapse">
                        <?php if( isset($_SESSION["admin"])){ ?>
                            <li> <a href="<?= URL ?>asistencia/crear">Registrar Asistencía</a></li>
                            <?php } ?>
                            <li><a href="<?= URL ?>asistencia/index">Consultar Asistencía</a></li>
                        </ul>
                    </li>
                    <?php } ?>
                    <?php if(isset($_SESSION["admin"])){ ?>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo7"><i class="fa fa-plus-square-o"></i> Novedades <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo7" class="collapse">
                            <li><a href="<?= URL ?>Novedades/crear">Registrar Novedad</a> </li>
                            <li><a href="<?= URL ?>Novedades/index">Consultar Novedad</a></li>
                        </ul>
                    </li>
                    <?php } ?>
                    <?php if(isset($_SESSION["admin"])){ ?>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo8"><i class="fa fa-cogs" ></i> Configuración <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo8" class="collapse">


                            <li><a href="<?= URL ?>Tarifas/index" data-toggle="collapse" data-target="#demo82"><i class="fa fa-cog"></i> Tarifas </a>
                                <ul id="demo82" class="collapse "></ul>
                            </li>

                            <li><a href="<?= URL ?>acudiente/index" data-toggle="collapse" data-target="#demo83"><i class="fa fa-cog"></i> Acudiente   </a>
                                <ul id="demo83" class="collapse"></ul>
                            </li>

                            <li><a href="<?= URL ?>eps/index" data-toggle="collapse" data-target="#demo84"><i class="fa fa-cog"></i> Eps  </a>
                                <ul id="demo84" class="collapse"></ul>
                            </li>

                            <li><a href="<?= URL ?>tipoDocumento/index" data-toggle="collapse" data-target="#demo85"><i class="fa fa-cog"></i> Tipo de documento</a></li>
                            <ul id="demo85" class="collapse"></ul>

                            <!-- <li><a href="<?= URL ?>tipoMembresia/index" data-toggle="collapse" data-target="#demo86"><i class="fa fa-cog"></i> Tipo de membresía</a></li>
                            <ul id="demo86" class="collapse">
                            </ul> -->

                            <!-- <li><a href="<?= URL ?>tipoNovedad/index" data-toggle="collapse" data-target="#demo87"><i class="fa fa-cog"></i> Tipo de Novedad</a></li>
                            <ul id="demo87" class="collapse">
                            </ul>
                        </li> -->
                    </ul>
                    <?php } ?>

                </div>
                <!-- /.navbar-collapse -->
            </nav>
            <?php if(isset($_POST['log'])){
             session_destroy(); ?>

             <script>
                 location.reload();
             </script>
             <?php } ?>
