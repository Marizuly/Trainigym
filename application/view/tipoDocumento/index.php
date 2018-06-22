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
                    Tipo de Documento
                </h1>
                <a href="<?= URL ?>TipoDocumento/crear" class="btn btn-success"><i class= "fa fa-plus"></i> Agregar</a>
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
                                    <td><?= $value->nombre?></td>
                                    <td><?= $value->estadoTD?></td>
                                    <td>
                                        <a onclick="editar('<?= $value->idtipoDocumento ?>')" class="btn btn-success">Editar</a>
                                        <?php if($value->estadoTD == "Activo"): ?>
                                            <!--controlador/metodo/id parametro-->
                                            <a href="<?= URL ?>TipoDocumento/estado/Inactivo/<?= $value->idtipoDocumento ?>" class="btn btn-default">Estado</a>
                                        <?php else: ?>
                                            <a href="<?= URL ?>TipoDocumento/estado/Activo/<?= $value->idtipoDocumento ?>" class="btn btn-danger">Estado</a>
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
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar Tipo de Documento</h4>
    </div>

    <div class="modal-body">
        <div class="well">
           <form class="form-inline" id="formEditar">
             <input type="hidden" name="id" id="id" value="<?= $respuesta->idtipoDocumento ?>">
             <div class="form-group">
               <label for="">Nombre :</label>
               <input type="text" class="form-control"maxLength="45" name='nombre' id="nombre" value="<?= $respuesta->nombre?>">
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
        url: '<?=URL?>TipoDocumento/editar/'+id,
        type: 'GET',
        dataType: 'JSON'
    }).done(function(data){
        $(".dtr-bs-modal").modal("hide");
        $("#id").val(data.idtipoDocumento);
        $("#nombre").val(data.nombre);
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
      text: 'El numero de caracteres minimos deben de ser 3',
      type: 'error',
      showConfirmButton: false,
      timer: 5000
    });    
  }else if(!letras.test(nombre)){
    swal({
      title: '¡Error!',
      text: 'Solo se permiten letras',
      type: 'error',
      showConfirmButton: false,
      timer: 5000
    });
  }else if(nombre.toLowerCase() == 'null'){
   swal({
     title: '¡Error!',
     text: 'Cáracter no válido',
     type: 'error',
     showConfirmButton: false,
     timer: 5000
   });
 }else{
    $.ajax({
        url: '<?=URL?>TipoDocumento/modificar',
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
        timer: 5000
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
        timer: 5000
      });
    }
  }).fail(function(){
    swal({
      position: 'top-end',
      type: 'error',
      title: '!Error!',
      text: 'Algo salío mal.',
      showConfirmButton: false,
      timer: 5000
    });
  });
}
}
</script>