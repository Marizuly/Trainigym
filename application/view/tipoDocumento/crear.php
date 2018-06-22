<div id="page-wrapper">
    <div class="container-fluid">

        <ol class="breadcrumb">
            <li class="hover">
                <i class="fa fa-dashboard"></i> <a href="..." id="eti">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-desktop"></i> <a href="..." id="eti">Bootstrap Elements</a>
            </li>
        </ol>

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Tipo de Documento
                </h1>
            </div>
        </div>

        <div class="well">
            <form class="form-inline" method='post' action='<?= URL; ?> TipoDocumento/registrar' onsubmit= "return validar()">
                <div class="row">

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Nombre: </label>
                            <input type="text" class="form-control" maxLength="45" name='nombre' id="nombre">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-success">GUARDAR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->