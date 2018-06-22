<div id="page-wrapper">
    <div class="container-fluid">
       <div class="row">
        <div class="col-lg-12">
                <!--<h1 class="page-header">
                    <center> Energym Xtreme</center>
                </h1>-->
                <ol class="breadcrumb">
                    <li class="hover">
                        <i class="fa fa-dashboard"></i> <a href="..." id="eti">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-desktop"></i> <a href="..." id="eti">Bootstrap Elements</a>
                    </li>
                </ol>
            </div>
        </div>

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Control de entrdas y salidas
                </h1>
            </div>
        </div>

        <div class="well">
            <form class="form-inline" method='post' action='<?= URL; ?> controlE_S/modificar'>
                <input type="hidden" name="idcontrolE_S" value="<?= $respuesta->idcontrolE_S ?>">
              <div class="form-group">
                    <label for="">Hora entrada:</label>
                    <input type="time" class="form-control" name='horaE'>
                </div>
                <div class="form-group">
                    <label for="">Hora salida:</label>
                    <input type="time" class="form-control" name='horaS'>
                </div>
                <div class="form-group">
                    <label for="">Fecha:</label>
                    <input type="date" class="form-control" name='fecha'>
                </div>
                <br>
                <br>
                <button type="submit" class="btn btn-success">Modificar</button>
            </form>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->