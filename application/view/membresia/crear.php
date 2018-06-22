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
                    Membresía
                </h1>
            </div>
        </div>

        <div class="well" >
            <form class="form-inline" method='post' name="membresia" onsubmit="return validar()" action='<?= URL; ?> Membresia/registrar'>
                <div class="row contenedor">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="">Nombre <span class="ast">*</span> </label>
                            <input type="text" maxlength="45" class="form-control" name='nombre' id="nombre">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label  >Tipo de membresía <span class="ast">*</span></label>
                            <select name="tipoM" id="tipoM" class="form-control select2"> 
                                <option value="" selected hidden >Seleccione valor</option>
                                <option value=""></option>
                                <?php foreach($tipoM as $key){?>
                                <option value="<?php echo $key->idtipoMembresia ?>"><?php echo $key->nombreTipoMembresia ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="">Cantidad en tiquetes </label>
                            <input type="text" maxlength="4" class="form-control num"  name='cantidad' id="cantidad">                        
                        </div>
                    </div>
                    
                    <div class="col-sm-3">
                        <div class="form-group btnDiv">
                            <label for=""></label>
                            <input type="checkbox" name="gender" value="female" id="btnDiv" /> Aplica Horario
                        </div>
                    </div>

                    <div id="elemplo">
                        <div class="col-sm-3" >
                            <div class="form-group" >
                                <label for="">Hora de Inicio Mañana</label>
                                <input type="time" name='iam' id="iam" class="form-control" >
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="">Hora de Fin Mañana </label>
                                <input type="time" class="form-control" name='fam' id="fam">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="">Hora de Inicio Tarde </label>
                                <input type="time" class="form-control" name='ipm' id="ipm">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="">Hora de Fin Tarde </label>
                                <input type="time" class="form-control" name='fpm' id="fpm" >
                            </div>
                        </div>

                        <div class="col-sm-3">
                          <div class="form-group">
                            <label for="">Día </label>
                            <select class="select2" id="dia" name="states[]" multiple="multiple">
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
                </div>
                
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="">Valor <span class="ast">*</span></label>
                        <select name="tar" id="tar" class="form-control select2">
                            <option value="" selected hidden >Seleccione valor</option>
                            <?php foreach($tar as $key){?>
                            <option value="<?php echo $key->idtarifas ?>"><?php echo $key->valor ?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                
                <div class="col-sm-3">
                    <div class="form-group btnDiv">
                        <input type="checkbox" name="beneficiarioM" id="beneficiario" /> Aplica Beneficiario
                    </div>
                </div>
                
                <div class="col-sm-3" >
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" id="per" >GUARDAR</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<script>
//select2 multiple
$(document).ready(function() {
    $(".select2").select2({
        placeholder: "Buscar..",
    })
    $("#elemplo").hide();
});

$("#btnDiv").change(function(){
    if($("#btnDiv").prop("checked")){
        $("#elemplo").show();
    }else{
        $("#elemplo").hide();
    }
});

$("#cantidad").attr("readonly",true); // deshabilitar

    $("#tipoM").change(function () {
        
    if($("#tipoM").val() == "2"){
        $("#cantidad").attr("readonly",false); // deshabilitar
    }else{
        $("#cantidad").attr("readonly",true); // deshabilitar
        $("#cantidad").val("")
    }
    });

function validar(){
    var nombre = $("#nombre").val();
    var tipoM = $("#tipoM").val();
    var valor = $("#tar").val();

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

    if($("#btnDiv").prop("checked")){
     var iam=$('#iam').val();
     var fam=$('#fam').val();
     var ipm=$('#ipm').val();
     var fpm=$('#fpm').val();
     var dias = $("#dia").val();
     
            // debugger;
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

            if(fam > '11:59'){
                swal({
                    text: 'La hora de fin mañana debe de ser AM',
                    type: 'error',
                    confirmButtonColor: '#d33'
                });
                return false;
            }

            if(iam == '00:00' || fam == '00:00'){
                swal({
                    text: 'la hora de la mañana va hasta las 11:59',
                    type: 'error',
                    confirmButtonColor: '#d33'
                });
                return false;

            }else if(iam >= fam){
             swal({
                text: 'La hora de fin mañana no debe ser igual a la hora de inicio mañana ',
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
}
}
</script>

