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
                    Eps
                </h1>
            </div>
        </div>

        <div class="well">
            <form class="form-inline" method='post' action='<?= URL; ?> Eps/registrar' onsubmit="return validar()">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Nombre *</label>
                            <input type="text" class="form-control" name='nombre' id='nombre' maxLength="45">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-success">GUARDAR</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
<!-- /#page-wrapper -->