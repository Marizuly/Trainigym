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
         Tarifas
       </h1>
       <a href="<?= URL ?>Tarifas/crear" class="btn btn-success"><i class= "fa fa-plus"></i> Agregar</a>
       <br><br>
       <div class="table-responsive">  
         <table class="table table-striped" id="dataTable">
          <thead>
            <!--Fila-->
            <tr>
              <!--Columna-->
              <th>Valor</th>
              <th>Año</th>
              <th>Estado</th>
              <th>Opciones</th>
            </tr>
          </thead>

          <tbody>
            <!--Listar la varible-->
            <?php foreach($registros as $key => $value): ?>
              <tr>
                <td><?= $value->valor?></td>
                <td><?= $value->year?></td>
                <td><?= $value->estadoTarifa?></td>
                <td>

                  <a onclick="editar('<?= $value->idtarifas ?>')" class="btn btn-success">Editar</a>
                  <?php if($value->estadoTarifa == "Activo"): ?>
                    <!--controlador/metodo/id parametro-->
                    <a href="<?= URL ?>Tarifas/estado/Inactivo/<?= $value->idtarifas ?>" class="btn btn-default">Estado</a>
                  <?php else: ?>
                    <a href="<?= URL ?>Tarifas/estado/Activo/<?= $value->idtarifas ?>" class="btn btn-danger">Estado</a>
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
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar Tarifa</h4>
      </div>

      <div class="modal-body">
        <div class="well">
         <form class="form-inline" id="formEditar" onsubmit="return modificar()">
           <input type="hidden" name="id" id="id" value="<?= $respuesta->idtarifas ?>">
           <div class="form-group">
             <label for="">Valor *</label>
             <input type="text" class="form-control num" maxlength="9" name='valor' id="valor" value="<?= $respuesta->valor ?>">
           </div>

           <div class="form-group">
             <label for="">Año *</label>
             <input type="text"class="form-control num" maxlength="4" name='ano' id="ano" value="<?= $respuesta->year ?>">
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
      url: '<?=URL?>Tarifas/editar/'+id,
      type: 'GET',
      dataType: 'JSON'
    }).done(function(data)
    {
      $("#id").val(data.idtarifas);
      $("#valor").val(data.valor);
      $("#ano").val(data.year);
      // $(".dtr-bs-modal").modal("hide");
      $("#ModalEditar").modal("show");
    });
  }

  function modificar(){
    var valor = $('#valor').val().trim();
    var ano = $('#ano').val().trim();

    if (valor === '' || ano === '') {
        swal({
            title: '¡Error!',
            text: 'No se permiten campos Vacíos',
            type: 'error',
            confirmButtonColor: '#d33'
        });
        return false;
    }else{
    $.ajax({
      url: '<?=URL?>Tarifas/modificar',
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
          text: 'No se pudo hacer el registro',
          showConfirmButton: false,
          timer: 2000
        });
      }
    }).fail(function(){
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
}
</script>