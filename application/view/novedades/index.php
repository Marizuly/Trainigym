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
            <h1 class="page-header">Novedades</h1>
            <!--aca listamos-->
            <table class="table">
                <thead>
                    <!--fila-->
                    <tr>
                        <!--columna-->
                        <th>Comprobante</th>
                        <th>Persona</th>
                        <th>Descripción</th>
                        <th>Tipo novedad</th>
                        <th>Fecha novedad</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($registros as $key => $value): ?>
                        <tr>
                            <td><?= $value->idcomprobante ?></td>
                            <td><?= $value->primerNombre." ".$value->segundoNombre." ".$value->primerApellido." ".$value->segundoApellido?></td>
                            <td><?= $value->descripcion ?></td>
                            <td><?= $value->nombreNovedad ?></td>
                            <td><?= $value->fechaNovedad ?></td>
                            
                            <td>
                                <a onclick="Eliminar(<?= $value->idcomprobante ?>)" class=" btn btn-success">Eliminar</a>         
                            </td>

                                
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
  </div>
</div>

 
    <!-- div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar Novedades</h4>
        </div>
  
                        
        <div class="modal-body">
        <div class="well">
        <form class="form-inline" id="formularioEditarNovedades">
                <input type="hidden" name="id" id="id">
            
                <div class="row">

                        <div class="col-sm-4">
                        <div class="form-group">
                        <label for="">N° documento <span class="ast">*</span></label>
                            <select id="documento" onchange="consultarPersona()" name="documento" class="form-control select2">
                                <option value="" selected hidden>Buscar</option>
                                <?php foreach ($per as $k) { ?>
                                <option value="<?php echo $k->idusuario ?>"><?php echo $k->documento ?></option> 
                                <?php } ?>
                            </select> 
                        <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Nombres * </label>
                            <select name="compr"  class="select2">}
                                <?php foreach($datos as $key){?>
                                <option value="<?php echo $key->idUsuario?>"><?php echo   $key->nombreUsuario ?></option>
                                <?php } ?> 
                            </select>
                         </div>
                        </div>
        

                        <div class="col-sm-4">
                        <div class="form-group">
                            <label for="" style="display: block;">Tipo de Novedad:</label>
                            <select name="tipoN" id="tipoN" class="form-control">
                                <?php foreach($tipoN as $key){?>
                                <option value="<?php echo $key->idtipoNovedades ?>"><?php echo $key->nombreNovedad ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                
                <div class="col-sm-4">
                <div class="form-group">
                    <label for="">Fecha novedad:</label>
                    <input type="date" class="form-control" name='fechaNovedad' id="FN">
                </div>
                </div>
                    <div class="form-row">
                        <div class="col-12">
                            <label for="">Descripción:</label>
                            <textarea style="width:100%;" class="form-control" rows="5" id="comment"></textarea>
                        </div>   
                    </div>
                </div>
        </form>
    </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-success" onclick="modificar()">Guardar</button>
    </div>
    </div> -->
              

<script>
    function Eliminar(id){
    $.ajax({
        url: '<?=URL?>novedades/eliminar',
        type: 'POST',
        dataType: 'JSON',
        data :{
            "id":id
        }
    }).done(function(data){

        if (data.status==true) {
            swal({
                position: 'top-end',
                type: 'success',
                title: 'Error!',
                text: 'No elimino',
                showConfirmButton: false,
                timer: 5000
            });
                setTimeout(function(){
                location.reload();
            },2100);
        } else {
            swal({
                position: 'top-end',
                type: 'success',
                title: '¡Éxito!',
                text: 'Se elimino correctamente la novedad',
                showConfirmButton: false,
                timer: 5000
            });
                setTimeout(function(){
                location.reload();
            },2100);
        }
    });
}

</script>
<script type="text/javascript">
       $(document).ready(function(){

        var f = new Date();
        var dia = (f.getDate().toString().length == 1) ? "0"+f.getDate() : f.getDate();
        var mes = ((f.getMonth() +1).toString().length == 1) ? "0"+(f.getMonth() +1) : (f.getMonth() +1);
        var fecha = f.getFullYear() + "/" + mes + "/"+ dia ;

        $('#date').val(fecha);
       
    });
// function consultarPersona(){
//         var idPersona = $("#documento").val();
//         if(idPersona == ""){
//             $("#nombreUsuario").val("");
//         }else{
//             $.ajax({
//                 url: '<?=URL?>novedades/consultarDatosPersona/'+idPersona,
//                 type: 'GET',
//                 dataType: 'JSON'
//             }).done(function(data){
//                 console.log(data);
//                 $("#nombreUsuario").val(data.primerNombre+" "+data.segundoNombre+" "+data.primerApellido+" "+data.segundoApellido);
//             }).fail(function(){
//                 alert("Error!");
//             });
//         }
    }


     function consultarPersona(){
        var idPersona = $("#documento").val();
        if(idPersona == ""){
            $("#nombreUsuario").val("");
        }else{
            $.ajax({
                url: '<?=URL?>Venta/consultarDatosPersona/'+idPersona,
                type: 'GET',
                dataType: 'JSON'
            }).done(function(data){
                console.log(data);
                $("#nombreUsuario").val(data.primerNombre+" "+data.segundoNombre+" "+data.primerApellido+" "+data.segundoApellido);
            }).fail(function(){
                alert("Error!");
            });
        }
    }

// function modificar(){
//   var letras = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{3,45}$/i;
//    var nombre =$('#nombre').val().trim();

//     if (nombre === '' ) {
//        swal({
//            title: '¡Lo siento',
//            text: 'No se permite campo Vacío',
//            type: 'error',
//            showConfirmButton: false,
//            timer: 4000
//        });      
   
//    }else if(nombre.toLowerCase() == 'null'){
//        swal({
//            title: 'Lo siento',
//            text: 'Cáracter no válido',
//            type: 'error',
//            showConfirmButton: false,
//            timer: 4000
//        });
//    }
//    else{
//     $.ajax({
//       url: '<?=URL?>novedades/modificar',
//       data: $("#formEditar").serialize(),
//       type: 'POST',
//       dataType: 'JSON'
//     }).done(function(data){
//       if(data.success){
//         $("#ModalEditar").modal("hide");
//           swal({
//                 position: 'top-end',
//                 type: 'success',
//                 title: '!Éxito!',
//                 text: '!Modificación Exitosa!',
//                 showConfirmButton: false,
//                 timer: 4000
//             });
//             setTimeout(function(){
//             location.reload();
//         },2100);
//       }else{
//         swal({
//                 position: 'top-end',
//                 type: 'error',
//                 title: 'Lo siento',
//                 text: 'Ya hay un registro con ese nombre',
//                 showConfirmButton: false,
//                 timer: 4000
//             });
//       }
//     }).fail(function(){
//       swal({
//                 position: 'top-end',
//                 type: 'error',
//                 title: 'Lo siento',
//                 text: 'Algo salío mal.',
//                 showConfirmButton: false,
//                 timer: 4000
//             });
//     });
//   }
//   }
 </script>