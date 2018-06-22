<div id="page-wrapper">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="hover">
                <i class="fa fa-dashboard"></i> <a href="..." id="eti">Ayuda    </a>
            </li>
            <li class="active">
                <!-- <i class="fa fa-desktop"></i> <a href="..." id="eti">Bootstrap Elements</a> -->
            </li>
        </ol>
        
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Venta
                </h1>

                <form>
                    <h5>Filtrar por:
                        <a href = "<?=URL?>Venta/index?estado=Cancelada" class="btn btn-danger">Canceladas</a>
                        <a href = "<?=URL?>Venta/index?estado=Activa" class="btn btn-success">Activas</a>
                        <a href = "<?=URL?>Venta/index?estado=Finalizado" class="btn btn-primary">Finalizadas</a>
                        <div class="btn-group">
                        <button type="button" class="btn btn-default">Generar PDF</button>
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#" >Ventas activas</a></li>
                                <li><a href="#" >Ventas finalizadas</a></li>
                                <li><a href="#" >Ventas canceladas</a></li>
                                <li><a href="#" id="btnGenerarPDF">Todas las ventas</a></li>                            </ul>
                        </div>
                        <br><br>
                    </form>

                    <table class="table table-striped table-bordered" id="dataTable">
                        <thead>
                            <!--Fila-->
                            <tr>
                                <!--Columna-->
                                <th>N° Documento</th>
                                <th>Cliente</th>
                                <th>Membresía</th>
                                <th>Cantidad</th>
                                <th>Horario Mañana</th>
                                <th>Horario Tarde</th>
                                <th>Días que aplica</th>
                                <th>Valor</th>
                                <th>Año de vencimiento</th>
                                <th>Fecha de vencimiento</th>
                                <th>Total pagado</th>
                                <th>Estado</th>
                                <th>Opción</th>
                            </tr>
                        </thead>

                        <tbody>
                            <!--Listar la varible-->
                            <?php foreach($registros as $key => $value): ?>
                                <tr>
                                    <td><?= $value->documento ?></td>
                                    <td><?= $value->primerNombre." ".$value->segundoNombre." ".$value->primerApellido." ".$value->segundoApellido?></td>
                                    <td><?= $value->nombreTipoMembresia." ".$value->nombreMembresia ?></td>
                                    <td><?= $value->cantidad?></td>
                                    <td><?= $value->rangoInicioM." am ".$value->rangoFinM ?></td>
                                    <td><?= $value->rangoInicioT." pm ".$value->rangoFinT ?></td>
                                    <td><?= $value->dia ?></td>
                                    <td><?= $value->valor?></td>
                                    <td><?= $value->year?></td>
                                    <td><?= $value->fechaFin?></td>
                                    <td><?= $value->total?></td>
                                    <td><?= $value->estadoVenta?></td>
                                    <td>
                                        <?php if($value->estadoVenta == "Activa"): ?>                                        
                                            <button type="button" class="btn btn-default" onclick="SegundaContrasenna(<?=$value->idcomprobanteServicio?>)">Anular venta</button>
                                        <?php else: ?>
                                            <button disabled class="btn btn-default">Anular venta</button>
                                        <?php endif ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-sm">
            
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Confirmación de contraseña</h4>
          </div>

          <div class="modal-body">
              <div class="form-group">
                 <div class="well">
                    <input type="hidden" id="txtIdComp">
                    <label>contraseña</label>
                    <input type="password" id="txtContra" class="form-control">
                </div>
            </div>
        </div>

        <div class="modal-footer">
          <button class="btn btn-success" id="btnAceptaAnul">Aceptar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
  </div>

</div>
</div>


<script>
  function SegundaContrasenna(IdComprobante){
    $(".dtr-bs-modal").modal("hide");
    $("#txtIdComp").val(IdComprobante);
    $("#txtContra").val("");
    $("#myModal").modal("show");
}

$("#btnAceptaAnul").click(function(){
  var estado = "Cancelada";
  var id = $("#txtIdComp").val();
  var contra = $("#txtContra").val();
  var ContraSesion = '<?=$_SESSION['password']?>';
  if(contra == ContraSesion){
    $.ajax({
        url: '<?=URL?>Venta/estado/'+estado+'/'+id,
        type: 'GET',
        dataType: 'JSON'
    }).done(function(data){
        $("#myModal").modal("hide");
        if(data.success){
            swal({
                position: 'top-end',
                type: 'success',
                title: '!Éxito!',
                text: 'La venta se anuló correctamente', 
                showConfirmButton: false,
                timer: 3100
            }).then(function(){
                location.reload();
            });
        }else{
            swal({
                position: 'top-end',
                type: 'error',
                title: '!Error!',
                text: 'No se pudo anular la venta', 
                showConfirmButton: false,
                timer: 3100
            });
        }
    });
}else{
    swal({
        position: 'top-end',
        type: 'error',
        title: '!Error!',
        text: 'La contraseña es incorrecta', 
        showConfirmButton: false,
        timer: 3100
    });
}
});

$("#btnGenerarPDF").click(function(){
    window.open('<?=URL?>Venta/ejemploPDF','_blank');      
});
</script>