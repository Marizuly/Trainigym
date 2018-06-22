<!-- <img src='<?= URL; ?>img/logo.png' width="15%" height="15%" > -->
<!-- MENU BLOCK -->
<div class="menu_block" style="background-color: black; border: 1px solid #e3e3e3 ">
    <!-- CONTAINER -->
    <div class="container clearfix">
        <!-- LOGO -->
        <div class="logo pull-left">
            <a href="#"><img src="images/logox.png" class="Logo" title="Energym Xtreme" alt="Energym Xtreme" width="150px"></a>
        </div>
        <!-- //LOGO -->

        <!-- MENU -->
        <div class="pull-right">
            <nav class="navmenu center">
            </nav>
        </div>
        <!-- //MENU -->
    </div>
</div>
<div id="page-wrapper">
    <div class="container" style="width:60%">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">
                    Formulario de registro
                </h2>
                <h4 style="font-color:gray">Los datos marcados con * son obligatorios</h4>
            </div>
        </div>

        <div class=" well" >
            <form class="form-vertical" method='post' action='<?= URL; ?> Registrar/registrar'>
                <div class="row">

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="" style="display: block;">Tipo Documento * </label>
                            <select name="tipoDoc" class="form-control">
                                <?php foreach ($respuestaTD as $k) { ?>
                                <option value="<?php echo $k->idtipoDocumento ?>"><?php echo $k->nombre ?></option> 
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Documento * </label>
                            <input type="text" class="form-control" name='documento'>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Primer Nombre * </label>
                            <input type="text" class="form-control" name='primerN'>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Segundo Nombre: </label>
                            <input type="text" class="form-control" name='segundoN'>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Primer Apellido * </label>
                            <input type="text" class="form-control" name='primerA'>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Segundo Apellido * </label>
                            <input type="text" class="form-control" name='segundoA'>
                        </div>

                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">fecha de Nacimiento * </label>
                            <input type="date" class="form-control" name='fecha'>
                        </div>
                    </div>


                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="" style="display: block;">Género  </label>
                            <select name="genero" class="form-control select2">
                                <option value=""></option>
                                <?php foreach ($respuestaGe as $k) { ?>
                                <option value="<?php echo $k->idgenero ?>"><?php echo $k->nombreGenero ?></option> 
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Telefono * </label>
                            <input type="text" class="form-control" name='telefono'>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Celular: </label>
                            <input type="text" class="form-control" name='celular'>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="" style="display: block;">Eps *</label>
                            <select name="eps" class="form-control">
                                <?php foreach($respuestaE as $key){?>
                                <option value="<?php echo $key->ideps ?>"><?php echo $key->nombreEps ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="" style="display: block;">Estado Civil </label>

                            <select name="estadoC" class="form-control">
                                <option value="soltero">Soltero</option>
                                <option value="casado">Casado</option>
                                <option value="union libre">Unión libre</option>
                            </select>
                        </div>
                    </div>


                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Correo*: </label>
                            <input type="text" class="form-control" name='correo'>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Dirección: </label>
                            <input type="text" class="form-control" name='direccion'>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Dirección: </label>
                            <input type="text" class="form-control" name='direccion'>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">GUARDAR</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.container-fluid -->
    </div>
</div>