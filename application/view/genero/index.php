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
       <a href="<?= URL ?>Genero/crear" class="btn btn-success"><i class= "fa fa-plus"></i> Agregar</a>
       <br><br>
       <!-- <a href="<?= URL ?>Genero/crear"><button class="btn btn-success fa fa-plus" ><p style="font-family:arial; display:inline-block ">Agregar</p>  </button></a> -->
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
                <td><?= $value->nombreGenero?></td>
                <td><?= $value->estadoGenero?></td>
                <td>

                  <a onclick="editar('<?= $value->idgenero ?>')" class="btn btn-success">Editar</a>
                  <?php if($value->estadoGenero == "Activo"): ?>
                    <!--controlador/metodo/id parametro-->
                    <a href="<?= URL ?>Genero/estado/Inactivo/<?= $value->idgenero ?>" class="btn btn-default">Estado</a>
                  <?php else: ?>
                    <a href="<?= URL ?>Genero/estado/Activo/<?= $value->idgenero ?>" class="btn btn-danger">Estado</a>
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
<div id="ModalEditar" class="modal fade"  role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar Genero</h4>
      </div>

      <div class="modal-body">
        <div class="well">
         <form class="form-inline" id="formEditar">
           <input type="hidden" name="id" id="id" value="<?= $respuesta->idgenero ?>">
           <div class="form-group">
             <label for="">Nombre *</label>
             <input type="text" class="form-control" name='nombre' id="nombre" value="<?= $respuesta->nombreGenero ?>" maxLength="30">
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
      url: '<?=URL?>Genero/editar/'+id,
      type: 'GET',
      dataType: 'JSON'
    }).done(function(data)
    {
      $(".dtr-bs-modal").modal("hide");
      $("#id").val(data.idgenero);
      $("#nombre").val(data.nombreGenero);
      $("#ModalEditar").modal("show");
    });
  }

  function modificar(){
    var letras = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{3,45}$/i;
    var nombre =$('#nombre').val().trim();
    $('#nombre').val(nombre);

    if (nombre === '' ) {
     swal({
       title: '¡Error!',
       text: 'No se permite campo Vacío',
       type: 'error',
       confirmButtonColor: '#d33'
     });       
   }else if(nombre.length < 3){
    swal({
      title: '¡Error!',
      text: 'El nùmero de caracteres minimo deben de ser 3',
      type: 'error',
      showConfirmButton: false,
      timer: 2000
    });    
  }else if(!letras.test(nombre)){
    swal({
      title: '¡Error!',
      text: 'Solo se permiten letras',
      type: 'error',
      showConfirmButton: false,
      timer: 2000
    });
  }else if(nombre.toLowerCase() == 'null'){
   swal({
     title: '¡Error!',
     text: 'Cáracter no válido',
     type: 'error',
     showConfirmButton: false,
     timer: 2000
   });
 }else{
  $.ajax({
    url: '<?=URL?>Genero/modificar',
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
