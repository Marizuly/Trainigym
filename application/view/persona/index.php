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
                    Usuarios
                </h1>

                <form>
                    <h5>Filtrar por:
                        <!-- <a href = "<?=URL?>Persona/index">Todos</a> -->
                        <a href = "<?=URL?>Persona/index?tipo=3" class="btn btn-success">Cliente</a>
                        <a href = "<?=URL?>Persona/index?tipo=2" class="btn btn-success">Instructor</a>
                        <a href = "<?=URL?>Persona/index?tipo=1" class="btn btn-success">Administrador</a>
                        <!-- <button class="btn btn-default" id="btnGenerarPDF">Generar PDF</button> -->
                       
                        <div class="btn-group">
                        <button type="button" class="btn btn-default">Generar PDF</button>
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#" name="pdf" data-valor="3">Clientes</a></li>
                                <li><a href="#" name="pdf" data-valor="2" >Instructores</a></li>
                                <li><a href="#" name="pdf" data-valor="0" id="">Todos</a></li>
                            </ul>
                        </div>
                    </form>
                    <br><br>
                    
                    <div class="table-responsive">  
                        <table class="table table-striped table-bordered" id="dataTable">
                            <thead>
                                <!--Fila-->
                                <tr>
                                    <!--Columna-->     
                                    <th>Tipo de Documento</th>
                                    <th>Documento</th>
                                    <th>Primer Nombre</th>
                                    <th>Segundo Nombre</th>
                                    <th>Primer Apellido</th>
                                    <th>Segundo Apellido</th>
                                    <th>Fecha de Nacimiento</th>
                                    <th>Genero</th>
                                    <th>Telefono</th>
                                    <th>Celular</th>
                                    <th>Eps</th>
                                    <th>Estado civil</th>
                                    <th>Correo</th>
                                    <th>Dirección</th>
                                    <th>Perfil</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                <!--Listar la varible-->
                                <?php foreach($registros as $key => $value): ?>
                                    <tr >
                                        <td><?= $value->nombre?></td>
                                        <td><?= $value->documento?></td>
                                        <td><?= $value->primerNombre?></td>
                                        <td><?= $value->segundoNombre?></td>
                                        <td><?= $value->primerApellido?></td>
                                        <td><?= $value->segundoApellido?></td>
                                        <td><?= $value->fechaNacimiento?></td>
                                        <td><?= $value->nombreGenero?></td>
                                        <td><?= $value->telefono?></td>
                                        <td><?= $value->celular?></td>
                                        <td><?= $value->nombreEps?></td>
                                        <td><?= $value->estadoCivil?></td>
                                        <td><?= $value->correo?></td>
                                        <td><?= $value->direccion?></td>
                                        <td><?= $value->nombreRol?></td>
                                        <td><?= $value->estadoPersona?></td>
                                        <td>
                                            <a onclick="editar('<?= $value->idusuario ?>')" class=" btn btn-success" >Editar</a>
                                            <?php if($value->estadoPersona == "Activo"): ?>
                                                <!--controlador/metodo/id parametro-->
                                                <a href="<?= URL ?>Persona/estado/Inactivo/<?= $value->idusuario ?>" class=" btn btn-default" >Estado</a>
                                            <?php else: ?>
                                                <a href="<?= URL ?>Persona/estado/Activo/<?= $value->idusuario ?>" class=" btn btn-danger" >Estado</a>
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

    <div id="ModalEditar" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar Persona</h4>
        </div>

        <div class="modal-body">
          <div class="well">
              <form class="form-inline" id="formEditar">
                <input type="hidden" name="id" id="id">
                <div class="row contenedor">
                    <div class="col-md-4">
                        <!--<div class="col-sm-12">-->
                            <div class="form-group">
                                <label for="">Tipo de documento <span class="ast">*</span></label>
                                <select name="tipoDoc" id="tipoDoc" class="form-control select2">
                                    <?php foreach ($respuestaTD as $k) { 
                                        ?>
                                        <option value="<?php echo $k->idtipoDocumento ?>"><?php echo $k->nombre ?></option> 
                                        <?php 
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Documento <span class="ast">*</span></label>
                                <input type="text" maxlength="11" class="form-control num" name='documento' id="documento">
                                <!--organizar-->
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Primer Nombre <span class="ast">*</span></label>
                                <input type="text" name='primerN' id="primerN" class="form-control soloLetra" maxlength="20" onkeypress="return soloLetras(event)">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Segundo Nombre:</label>
                                <input type="text"  name='segundoN' id="segundoN" class="form-control soloLetra" maxlength="20" onkeypress="return soloLetras(event)">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Primer Apellido <span class="ast">*</span></label>
                                <input type="text"  name='primerA' id="primerA" class="form-control soloLetra" maxlength="20" onkeypress="return soloLetras(event)">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Segundo Apellido <span class="ast">*</span></label>
                                <input type="text"  name='segundoA' id="segundoA" class="form-control soloLetra" maxlength="20" onkeypress="return soloLetras(event)">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Fecha de Nacimiento <span class="ast">*</span></label>
                                <input type="date" class="form-control" name='fecha' id="fecha" >
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Genero <span class="ast">*</span></label>
                                <select name="genero" id="genero" class="form-control select2">
                                    <?php foreach ($respuestaGe as $k) { ?>
                                    <option value="<?php echo $k->idgenero ?>"><?php echo $k->nombreGenero ?></option> 
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Telefono <span class="ast">*</span></label>
                                <input type="text" maxlength="7" class="form-control num" name='telefono' id="telefono">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Celular:</label>
                                <input type="text" maxlength="10" class="form-control num" name='celular' id="celular">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Eps <span class="ast">*</span></label>
                                <select name="eps" id="eps" class="form-control select2">
                                    <?php foreach ($respuestaE as $k) { ?>
                                    <option value="<?php echo $k->ideps ?>"><?php echo $k->nombreEps ?></option> 
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Estado civil <span class="ast">*</span></label>
                                <select name="estadoC" id="estadoC" class="form-control select2">
                                    <option value="solter(a)">Solter(a)</option>
                                    <option value="casado(a)">Casad(a)</option>
                                    <option value="union libre">Unión libre</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Correo <span class="ast">*</span></label>
                                <input type="email"  name='correo' id="correo" class="form-control" >
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Direccion </label>
                                <input type="text"  name='direccion' id="direccion" class="form-control" >
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Perfil <span class="ast">*</span></label>
                                <select name="perfil" id="perfil" class="form-control select2">
                                    <?php foreach ($perfil as $k) { ?>
                                    <option value="<?php echo $k->idPerfil ?>"><?php echo $k->nombreRol ?></option> 
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" onclick="modificar()">Guardar</button>
            </div>
        </div>
    </div>
</div>

<script>
//data table
$(document).ready(function(){
    $(".select2").select2({
        placeholder: "Buscar..",
        allowClear: true
    })
    // var buttonCommon = {
    //     exportOptions: {
    //         format: {
    //             body: function ( data, row, column, node ) {
    //                     // Strip $ from salary column to make it numeric
    //                     return column === 5 ?
    //                     data.replace( /[$,]/g, '' ) :
    //                     data;
    //                 }
    //             }
    //         }
    //     };

    //     $('#tblPersona').DataTable({
    //         responsive: {
    //             details: {
    //                 display: $.fn.dataTable.Responsive.display.modal( {
    //                     header: function ( row ) {
    //                         var data = row.data();
    //                         return 'Detalles para '+data[0]+' '+data[1];  
    //                     }
    //                 } ),
    //                 renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
    //                     tableClass: 'table'
    //                 } )
    //             }
    //         },
    //         "language": {
    //             "sProcessing":     "Procesando...",
    //             "sLengthMenu":     "Mostrar _MENU_ Registros",
    //             "sZeroRecords":    "No se encontraron resultados",
    //             "sEmptyTable":     "Ningún dato disponible en esta tabla",
    //             "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    //             "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    //             "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    //             "sInfoPostFix":    "",
    //             "sSearch":         "Buscar:",
    //             "sUrl":            "",
    //             "sInfoThousands":  ",",
    //             "sLoadingRecords": "Cargando...",
    //             "oPaginate": {
    //                 "sFirst":    "Primero",                
    //                 "sLast":     "Último",
    //                 "sNext":     "Siguiente",
    //                 "sPrevious": "Anterior"
    //             },
    //             "oAria": {
    //                 "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
    //                 "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    //             }
    //         },
    //         dom: 'Bfrtip',
    //         buttons: [
    //         $.extend( true, {}, buttonCommon, {
    //             extend: 'copyHtml5'
    //         } ),
    //         $.extend( true, {}, buttonCommon, {
    //             extend: 'excelHtml5'
    //         } ),
    //         $.extend( true, {}, buttonCommon, {
    //             extend: 'pdfHtml5'
    //         } )
    //         ]
    //     });
    });




function editar(id){
    $.ajax({
        url: '<?=URL?>Persona/editar/'+id,
        type: 'GET',
        dataType: 'JSON'
    }).done(function(data){
        $(".dtr-bs-modal").modal("hide");
        $("#id").val(data.idusuario);
        $("#documento").val(data.documento);
        $("#primerN").val(data.primerNombre);
        $("#segundoN").val(data.segundoNombre);
        $("#primerA").val(data.primerApellido);
        $("#segundoA").val(data.segundoApellido);
        $("#fecha").val(data.fechaNacimiento);
        $("#telefono").val(data.telefono);
        $("#celular").val(data.celular);
        $("#correo").val(data.correo);
        $("#direccion").val(data.direccion);
        setTimeout(function(){
            $("#perfil").val(data.idPerfil).trigger("change");
            $("#tipoDoc").val(data.idtipoDocumento).trigger("change");
            $("#eps").val(data.ideps).trigger("change");
            $("#genero").val(data.idgenero).trigger("change");
            $("#estadoC").val(data.estadoCivil).trigger("change");
        },200);
        // $("#perfil option[value="+data.idPerfil+"]").attr("selected",true);
        // $("#tipoDoc option[value="+data.idtipoDocumento+"]").attr("selected",true);
        // $("#eps option[value="+data.ideps+"]").attr("selected",true);
        // $("#genero option[value="+data.idgenero +"]").attr("selected",true);
        // $("#estadoC option[value="+data.estadoCivil +"]").attr("selected",true);
        $("#ModalEditar").modal("show");
    });
}

function modificar(){
    var tipo = $('#tipoDoc').val();
    var documento = $('#documento').val();
    var primerN =$('#primerN').val();
    var primerA =$('#primerA').val();
    var segundoA =$('#segundoA').val();
    var fecha =$('#fecha').val();
    var telefono =$('#telefono').val();
    var eps =$('#eps').val();
    var correo =$('#correo').val();
    var perfil =$('#perfil').val();
    var genero =$('#genero').val();
    var estadoC =$('#estadoC').val();

    // debugger
    if (tipo === '' || tipo == null || documento == '' || primerN == '' || primerA == '' || segundoA == '' || 
        fecha == '' || genero ==='' || genero == null || telefono == '' || eps === '' || eps === null || correo == ''
         || perfil=== '' || perfil=== null || estadoC == '' || estadoC == null) {
        swal({
            title: '¡Error!',
            text: 'Los campos marcados con * son obligatorios',
            type: 'error',
            confirmButtonColor: '#d33'
        });
    return false;   
}
    $.ajax({
        url: '<?=URL?>Persona/modificar',
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

$("#btnGenerarPDF").click(function(){
    window.open('<?=URL?>Persona/ejemploPDF','_blank');      
    // window.open('<?=URL?>Persona/PDFusuarios','_blank');      
});

$("a[name=pdf]").click(function(){
    var valor = $(this).data("valor");
    window.open('<?=URL?>Persona/ejemploPDF/'+valor,'_blank');          
});

</script>