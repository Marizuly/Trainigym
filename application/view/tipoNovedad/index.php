<div id="page-wrapper">
  <div class="container-fluid">
    <ol class="breadcrumb">
      <li class="hover">
        <i class="fa fa-dashboard"></i> <a href="..." id="eti">Ayuda</a>
      </li>
      <li class="active">
        <i class="fa fa-desktop"></i> <a href="..." id="eti">Bootstrap Elements</a>
      </li>
    </ol>

    <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">
          Tipo de Novedad
        </h1>
        <a href="<?= URL ?>TipoNovedad/crear" class="btn btn-success"><i class= "fa fa-plus"></i> Agregar</a>
        <br><br>

        <div class="table-responsive">  
          <table class="table table-striped" id="dataTable">
            <thead>
              <!--Fila-->
              <tr>
                <!--Columna-->
                <th>Nombre</th>
                <th>Estado</th>
                <th>Opciones</th>
              </tr>
            </thead>

            <tbody>
              <!--Listar la varible-->
              <?php foreach($registros as $key => $value): ?>
                <tr>
                  <td><?= $value->nombreNovedad?></td>
                  <td><?= $value->estadoTN?></td>
                  <td>
                    <a onclick="editar('<?= $value->idtipoNovedades ?>')" class="btn btn-success">Editar</a>
                    <?php if($value->estadoTN == "Activo"): ?>
                      <!--controlador/metodo/id parametro-->
                      <a href="<?= URL ?>TipoNovedad/estado/Inactivo/<?= $value->idtipoNovedades ?>" class="btn btn-default">Estado</a>
                    <?php else: ?>
                      <a href="<?= URL ?>TipoNovedad/estado/Activo/<?= $value->idtipoNovedades ?>" class="btn btn-danger">Estado</a>
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
<div id="ModalEditar" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar tipo de Novedad</h4>
      </div>

      <div class="modal-body">
        <div class="well">
         <form class="form-inline" id="formEditar">
           <input type="hidden" name="id" id="id" value="<?= $respuesta->idtipoNovedades ?>">
           <div class="form-group">
             <label for="">Nombre :</label>
             <input type="text" class="form-control" name='nombre' id="nombre" value="<?= $respuesta->nombreNovedad ?>">
           </div>
         </form>
       </div>
     </div>

     <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      <button type="submit" class="btn btn-success" onclick="modificar()">Modificar</button>
    </div>

  </div>
</div>
</div>

<script>
  function editar(id){
    $.ajax({
      url: '<?=URL?>TipoNovedad/editar/'+id,
      type: 'GET',
      dataType: 'JSON'
    }).done(function(data)
    {
      $("#id").val(data.idtipoNovedades);
      $("#nombre").val(data.nombreNovedad);
      $("#ModalEditar").modal("show");
    });
  }

  function modificar(){
    $.ajax({
      url: '<?=URL?>TipoNovedad/modificar',
      data: $("#formEditar").serialize(),
      type: 'POST',
      dataType: 'JSON'
    }).done(function(data){
      if(data.success){
        $("#ModalEditar").modal("hide");
        setTimeout(function(){
          alert("se modificó exitosamente");
          location.reload();
        },200);
      }else{
        alert("No se pudo modificar");
      }
    }).fail(function(){
      alert("Error");
    });
  }
</script>