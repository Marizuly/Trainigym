<div id="page-wrapper">
 <div class="container-fluid">
  <!-- Page Heading -->
  <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Instructor
        </h1>
    </div>
</div>

<div class="well">
    <form class="form-inline" method='post' action='<?= URL; ?> Instructor/modificar'>
        <input type="hidden" name="id" value="<?= $respuesta->idinstrcutor ?>">

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Primer Nombre</label>
                    <input type="text" class="form-control" name='primerN' value="<?= $respuesta->primerNombre ?>">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Segundo Nombre:</label>
                    <input type="text" class="form-control" name='segundoN' value="<?= $respuesta->segundoNombre ?>">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Primer Apellido:</label>
                    <input type="text" class="form-control" name='primerA' value="<?= $respuesta->primerApellido ?>">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Segundo Apellido:</label>
                    <input type="text" class="form-control" name='segundoA' value="<?= $respuesta->segundoApellido ?>">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Telefono :</label>
                    <input type="text" class="form-control" name='telefono' value="<?= $respuesta->telefono ?>">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Direccion :</label>
                    <input type="text" class="form-control" name='direccion' value="<?= $respuesta->direccion ?>">
                </div>
            </div>

            <div class="col-md-3">
                <button type="submit" class="btn btn-success" id="per">Modificar</button>
            </div>
        </div>
    </form>
</div>
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->