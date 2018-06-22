<div id="page-wrapper">
    <div class="container-fluid">

        <ol class="breadcrumb">
            <li class="hover">
                
            </li>
            <li class="active">
            </li>
        </ol>

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Genero
                </h1>
            </div>
        </div>

        <div class="well">
            <form class="form-inline" method='post' action='<?= URL; ?> Genero/registrar' onsubmit="return validar()">
                <div class="row">

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Nombre * </label>
                            <input type="text" class="form-control" name='nombre' id="nombre" maxLength="30">
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
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->


<script></script>