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
          Acudiente
        </h1>

        <div class="table-responsive">  
          <table class="table table-bordered table-striped" id="dataTable">
            <thead>
              <!--Fila-->
              <tr>
                <!--Columna-->
                <th>Documento del Cliente</th>
                <!-- <th>cliente </th> -->
                <th>Primer Nombre</th>
                <th>Segundo Nombre</th>
                <th>Primer Apellido</th>
                <th>Segundo Apellido</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Estado</th>
                <th>Opciones</th>
              </tr>
            </thead>

            <tbody>
              <!--Listar la varible-->
              <?php foreach($registros as $key => $value): ?>
                <tr>
                  <td><?= $value->documento?></td>
                  <!-- <td><?= $value->pN." ".$value->sN." ".$value->pA." ".$value->sA?></td> -->
                  <td><?= $value->primerNombre?></td>
                  <td><?= $value->segundoNombre?></td>
                  <td><?= $value->primerApellido?></td>
                  <td><?= $value->segundoApellido?></td>
                  <td><?= $value->telefono?></td>
                  <td><?= $value->direccion?></td>
                  <td><?= $value->estadoAcudiente?></td>
                  <td>
                    <a onclick="editar('<?= $value->idacudiente ?>')" class="btn btn-success">Editar</a>
                    <!-- <a href="<?= URL ?>Acudiente/editar/<?= $value->idacudiente ?>" class="btn btn-success">Editar</a> -->
                    <?php if($value->estadoAcudiente == "Activo"): ?>
                      <!--controlador/metodo/id parametro-->
                      <a href="<?= URL ?>Acudiente/estado/Inactivo/<?= $value->idacudiente ?>" class="btn btn-default">Estado</a>
                    <?php else: ?>
                      <a href="<?= URL ?>Acudiente/estado/Activo/<?= $value->idacudiente ?>" class="btn btn-danger">Estado</a>
                    <?php endif ?>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<!-- Modal -->
<div class="modal fade" id="ModalEditar" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar Acudiente</h4>
      </div>

      <div class="modal-body">
        <div class="well">
          <form class="form-inline" id="formEditar">
            <input type="hidden" name="id" id="id" value="<?= $respuesta->idacudiente ?>">

            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Primer Nombre:</label>
                  <input type="text" class="form-control" name='primerN' id="primerN" value="<?= $respuesta->primerNombre ?>">
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Segundo Nombre:</label>
                  <input type="text" class="form-control" name='segundoN' id="segundoN" value="<?= $respuesta->segundoNombre ?>">
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Primer Apellido:</label>
                  <input type="text" class="form-control" name='primerA' id="primerA" value="<?= $respuesta->primerApellido ?>">
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Segundo Apellido:</label>
                  <input type="text" class="form-control" name='segundoA' id="segundoA" value="<?= $respuesta->segundoApellido ?>">
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Teléfono :</label>
                  <input type="text" class="form-control" name='telefono' id="telefono" value="<?= $respuesta->telefono ?>">
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Dirección :</label>
                  <input type="text" class="form-control" name='direccion' id="direccion" value="<?= $respuesta->direccion ?>">
                </div>
              </div>

            </div>
          </form>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-success" onclick="modificar()">Modificar</button>
      </div>
    </div>

  </div>
</div>

<script>
  function editar(id){
    $.ajax({
      url: '<?=URL?>Acudiente/editar/'+id,
      type: 'GET',
      dataType: 'JSON'
    }).done(function(data)
    {
      $("#id").val(data.idacudiente);
      $("#primerN").val(data.primerNombre);
      $("#segundoN").val(data.segundoNombre);
      $("#primerA").val(data.primerApellido);
      $("#segundoA").val(data.segundoApellido);
      $("#telefono").val(data.telefono);
      $("#direccion").val(data.direccion);
      $("#ModalEditar").modal("show");
    });
  }

  function modificar(){
    $.ajax({
      url: '<?=URL?>Acudiente/modificar',
      data: $("#formEditar").serialize(),
      type: 'POST',
      dataType: 'JSON'
    }).done(function(data){
      if(data.success){
        $("#ModalEditar").modal("hide");
        swal({
          position: 'top-end',
          type: 'success',
          title: '!Éxito!',
          text: 'Modificación Exitosa',
          showConfirmButton: false,
          timer: 2000
        });
        setTimeout(function(){
          location.reload();
        },2100);
      }else{
        swal({
          position: 'top-end',
          type: 'error',
          title: '!Error!',
          text: 'Ya hay un registro con ese nombre',
          showConfirmButton: false,
          timer: 2000
        });
      }
    }).fail(function() {
      swal({
        position: 'top-end',
        type: 'error',
        title: '!Error!',
        text: 'Algo salío mal.',
        showConfirmButton: false,
        timer: 2000
      });
    });
  }
</script>