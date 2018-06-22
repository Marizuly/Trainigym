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
                    Instructor
                </h1>
                <div class="table-responsive">  
                    <table class="table table-striped table-bordered" id="tblPersona">
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
                                    <td><?= $value->idusuario ?></td>
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
                                        <!-- <a href="<?= URL ?>Persona/editar/<?= $value->idusuario ?>">Editar</a> -->
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
        <h4 class="modal-title">Editar Instructor</h4>
    </div>

    <div class="modal-body">
      <div class="well">
          <form class="form-inline" id="formEditar">
            <input type="hidden" name="id" id="id">
            <div class="row">
                <div class="col-md-4">
                    <!--<div class="col-sm-12">-->
                        <div class="form-group">
                            <label for="">Tipo de documento:</label>
                            <select name="tipoDoc" id="tipoDoc" class="form-control">
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
                            <label for="">Documento :</label>
                            <input type="text" class="form-control" name='documento' id="documento">
                            <!--organizar-->
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Primer Nombre</label>
                            <input type="text" class="form-control" name='primerN' id="primerN">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Segundo Nombre:</label>
                            <input type="text" class="form-control" name='segundoN' id="segundoN">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Primer Apellido:</label>
                            <input type="text" class="form-control" name='primerA' id="primerA">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Segundo Apellido:</label>
                            <input type="text" class="form-control" name='segundoA' id="segundoA">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Fecha de Nacimiento :</label>
                            <input type="date" class="form-control" name='fecha' id="fecha" >
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Genero:</label>
                            <select name="genero" id="genero" class="form-control">
                                <?php foreach ($respuestaGe as $k) { ?>
                                <option value="<?php echo $k->idgenero ?>"><?php echo $k->nombreGenero ?></option> 
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Telefono:</label>
                            <input type="text" class="form-control" name='telefono' id="telefono">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Celular:</label>
                            <input type="text" class="form-control" name='celular' id="celular">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Eps:</label>
                            <select name="eps" id="eps" class="form-control">
                                <?php foreach ($respuestaE as $k) { ?>
                                <option value="<?php echo $k->ideps ?>"><?php echo $k->nombreEps ?></option> 
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Estado civil :</label>
                            <select name="estadoC" id="estadoC" class="form-control">
                                <option value="soltero">Soltero</option>
                                <option value="casado">Casado</option>
                                <option value="union libre">Unión libre</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Correo :</label>
                            <input type="text" class="form-control" name='correo' id="correo">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Direccion :</label>
                            <input type="text" class="form-control" name='direccion' id="direccion">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Perfil*</label>
                            <select name="perfil" id="perfil" class="form-control">
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

    var buttonCommon = {
        exportOptions: {
            format: {
                body: function ( data, row, column, node ) {
                        // Strip $ from salary column to make it numeric
                        return column === 5 ?
                        data.replace( /[$,]/g, '' ) :
                        data;
                    }
                }
            }
        };

        $('#tblPersona').DataTable({
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal( {
                        header: function ( row ) {
                            var data = row.data();
                            return 'Detalles para '+data[0]+' '+data[1];  
                        }
                    } ),
                    renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                        tableClass: 'table'
                    } )
                }
            },
            "language": {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ Registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",                
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            },
            dom: 'Bfrtip',
            buttons: [
            $.extend( true, {}, buttonCommon, {
                extend: 'copyHtml5'
            } ),
            $.extend( true, {}, buttonCommon, {
                extend: 'excelHtml5'
            } ),
            $.extend( true, {}, buttonCommon, {
                extend: 'pdfHtml5'
            } )
            ]
        });
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
        $("#perfil option[value="+data.idPerfil+"]").attr("selected",true);
        $("#tipoDoc option[value="+data.idtipoDocumento+"]").attr("selected",true);
        $("#eps option[value="+data.ideps+"]").attr("selected",true);
        $("#genero option[value="+data.idgenero +"]").attr("selected",true);
        $("#estadoC option[value="+data.estadoCivil +"]").attr("selected",true);
        $("#ModalEditar").modal("show");
    });
}

function modificar(){
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
</script>