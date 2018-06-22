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
                    Membresia
                </h1>
                <div class="table-responsive">  
                    <table class="table table-striped" id="dataTable">
                        <thead>
                            <!--Fila-->
                            <tr>
                                <!--Columna-->
                                <th>Nombre</th>
                                <th>Tipo de Membresía</th>
                                <th>Cantidad</th>
                                <th>Horario Inicio Mañana</th>
                                <th>Horario Fin Mañana</th>
                                <th>Horario Inicio Tarde</th>
                                <th>Horario Fin Tarde</th>
                                <th>Día</th>
                                <th>Valor</th>
                                <th>Año vencimiento</th>
                                <th>Estado</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            <!--Listar la varible-->
                            <?php foreach($registros as $key => $value): ?>
                                <tr>
                                    <td><?= $value->nombreMembresia?></td>
                                    <td><?= $value->nombreTipoMembresia?></td>
                                    <td><?= $value->cantidad?></td>
                                    <td><?= $value->rangoInicioM?></td>
                                    <td><?= $value->rangoFinM?></td>
                                    <td><?= $value->rangoInicioT?></td>
                                    <td><?= $value->rangoFinT?></td>
                                    <td><?= $value->dia?></td>
                                    <td><?= $value->valor?></td>
                                    <td><?= $value->year?></td>
                                    <td><?= $value->estadoMembresia?></td>
                                    <td>
                                        <a onclick="editar(<?= $value->idMembresia ?>)" class=" btn btn-success">Editar</a>
                                        <?php if($value->estadoMembresia == "Activo"): ?>
                                            <!--controlador/metodo/id parametro-->
                                            <a href="<?= URL ?>Membresia/estado/Inactivo/<?= $value->idMembresia ?>" class=" btn btn-default">Estado</a>
                                        <?php else: ?>
                                            <a href="<?= URL ?>Membresia/estado/Activo/<?= $value->idMembresia ?>" class=" btn btn-danger">Estado</a>
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

<div id="ModalEditarMembresia" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg"  style="width:60%">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar Membresía</h4>
    </div>

    <div class="modal-body">
        <div class="well">
            <form class="form-inline" id="formularioEditarMembresia">
                <input type="hidden" name="id" id="id">
                <!-- <input type="hidden" name="idTarifa" id="idTarifa"> -->
                <div class="row contenedor">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Nombre <span class="ast">*</span></label>
                            <input type="text" class="form-control"  name='nombre' id='nombre'>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Tipo de Membresía <span class="ast">*</span></label>
                            <select name="tipoM"  id="tipoM" class="form-control select2">
                                <option value=""selected hidden></option>
                                <?php foreach ($tipoM as $k) { ?>
                                <option value="<?php echo $k->idtipoMembresia ?>"><?php echo $k->nombreTipoMembresia ?></option> 
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Cantidad en tiquetes</label>
                            <input type="text" maxlength="4" class="form-control num" name='cantidad' id='cantidad'>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Hora de inicio Mañana </label>
                            <input type="time" class="form-control" name='iam' id='iam'>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Hora de Fin Mañana </label>
                            <input type="time" class="form-control" name='fam' id='fam'>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Hora de inicio Tarde </label>
                            <input type="time" class="form-control" name='ipm' id='ipm'>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Hora de Fin Tarde </label>
                            <input type="time" class="form-control" name='fpm' id='fpm'>
                        </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="">Día <span class="ast">*</span></label>
                        <select class="select2" name="states[]" id="dia" multiple="multiple">
                            <option value="Ninguno">Ninguno</option>
                            <option value="Lunes">Lunes</option>
                            <option value="Martes">Martes</option>
                            <option value="Miercoles">Miercoles</option>
                            <option value="Jueves">Jueves</option>
                            <option value="Viernes">Viernes</option>
                            <option value="Sabado">Sabado</option>
                            <option value="Domingo">Domingo</option>
                        </select>
                    </div>
                </div>

                
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Valor <span class="ast">*</span></label>
                        <select name="tar" id="tar" class="form-control select2">
                            <option value="" selected hidden></option>
                            <?php foreach($tar as $key){?>
                            <option value="<?php echo $key->idtarifas ?>"><?php echo $key->valor ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group btnDiv">
                        <input type="checkbox" name="beneficiarioM" id="bene" /> Aplica Beneficiario
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
</div>
</div>
</div>

<script>
    $(document).ready(function(){
        $(".select2").select2({
            placeholder: "Seleccione una opción"
        // allowClear: true
    });
    })

    function editar(id){
        $.ajax({
            url: '<?=URL?>Membresia/editar/'+id,
            type: 'GET',
            dataType: 'JSON'
        }).done(function(data){
            // debugger;   
            $(".dtr-bs-modal").modal("hide");
            $("#id").val(data.idMembresia);
            $("#idTarifa").val(data.idtarifas);
            $("#nombre").val(data.nombreMembresia);
            $("#cantidad").val(data.cantidad);
            $("#iam").val(data.rangoInicioM);
            $("#fam").val(data.rangoFinM);
            $("#ipm").val(data.rangoInicioT);
            $("#beneficiario").val(data.beneficiarioM);
            if(data.beneficiarioM == 1){
                $("#bene").prop("checked", true);
            }else{
                $("#bene").prop("checked", false);
            }
            //si es vacio que tome el valor, pero si no coge el valor que trae y lo parte donde tenga coma-espacio
            var states = (data.dia == "") ? "" : data.dia.split(', ');
            if(states != ""){
                //para cargar el select2
                setTimeout(function(){
                    $("#dia").val(states).trigger("change");
                },200);
            }
            
            //Asi para cargar un select normal 
            //$("#dia option[value="+states+"]").attr("selected",true);
            // $("#tar option[value="+data.idtarifas+"]").attr("selected",true);
            // $("#tipoM option[value="+data.idtipoMembresia+"]").attr("selected",true);

            //Asi cargarmos un select2
            setTimeout(function(){
                $("#tar").val(data.idtarifas).trigger("change");
                $("#tipoM").val(data.idtipoMembresia).trigger("change");
            })
            $("#fpm").val(data.rangoFinT);
            $("#ModalEditarMembresia").modal("show");
        })
    }

    function modificar(){
        var nombre = $("#nombre").val();
        var tipoM = $("#tipoM").val();
        var valor = $("#tar").val();
    //HORARIO
    var iam=$('#iam').val();
    var fam=$('#fam').val();
    var ipm=$('#ipm').val();
    var fpm=$('#fpm').val();
    var dias = $("#dia").val();

    if(nombre === "" || tipoM === "" || valor === ""){
        swal({
            title: '¡Error!',
            text: 'Los campos marcados con * son obligatorios',
            type: 'error',
            confirmButtonColor: '#d33'
        });
        return false;
    }

    if (nombre.toLowerCase() == 'null') {
        swal({
            title: '¡Error!',
            text: 'Cáracter no válido en el campo nombre',
            type: 'error',
            confirmButtonColor: '#d33'
        });
        return false;
    }
    
    if(iam == '' || fam == '' || ipm == '' || fpm == ''){
        swal({
            text: 'Debe de ingresar todos los campos de horario',
            type: 'error',
            confirmButtonColor: '#d33'
        });
        return false;
    }

    if(iam > '11:59'){
        swal({
            text: 'La hora de inicio mañana debe de ser AM',
            type: 'error',
            confirmButtonColor: '#d33'
        });
        return false;
    }

            // if(fam > '11:59'){
            //     swal({
            //         text: 'La hora de fin mañana debe de ser AM',
            //         type: 'error',
            //         confirmButtonColor: '#d33'
            //     });
            //     return false;
            // }

            if(iam == '00:00' || fam == '00:00'){
                swal({
                    text: 'la hora de la mañana va hasta las 11:59',
                    type: 'error',
                    confirmButtonColor: '#d33'
                });
                return false;

            }else if(iam >= fam){
               swal({
                text: 'La hora de inicio mañana debe de ser menor a la La hora de fin mañana ',
                type: 'error',
                confirmButtonColor: '#d33'
            });
               return false;
           }

           if(ipm < '12:00'){
            swal({
                text: 'La hora de inicio tarde debe de ser PM',
                type: 'error',
                confirmButtonColor: '#d33'
            });
            return false;
        }

        if(fpm < '12:00'){
            swal({
                text: 'La hora de fin tarde debe de ser PM',
                type: 'error',
                confirmButtonColor: '#d33'
            });
            return false;
        }

        if(ipm >= fpm){
           swal({
            text: 'La hora de inicio tarde debe de ser menor a la La hora de fin tarde ',
            type: 'error',
            confirmButtonColor: '#d33'
        });
           return false;
       }

       if(dias != null){
        if(dias.length > 1){
            if($.inArray("Ninguno",dias) >= 0){
                swal({
                text: 'Si elige la opción "Ninguno", no puede elegir días',
                    type: 'error',
                    confirmButtonColor: '#d33'
                });
                return false;
            }
        }
    }else{
        swal({
            text: 'Debe seleccionar una opción en el campo día',
            type: 'error',
            confirmButtonColor: '#d33'
        });
        return false;
    }

    $.ajax({
        url: '<?=URL?>Membresia/modificar',
        data: $("#formularioEditarMembresia").serialize(),
        type: 'POST',
        dataType: 'JSON'
    }).done(function(data){
        if(data.success){
            $("#ModalEditarMembresia").modal("hide");
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
            setTimeout(function(){
                location.reload();
            },2100);
        }
    }).fail(function(){
        swal({
            position: 'top-end',
            type: 'error',
            title: '!Error!',
            text: 'Algo salío mal',
            showConfirmButton: false,
            timer: 2000
        });
        setTimeout(function(){
            location.reload();
        },2100);
    });
}
// }
</script>




