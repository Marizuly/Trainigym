<div id="page-wrapper">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="hover">
                <!-- <i class="fa fa-dashboard"></i> <a href="..." id="eti">Dashboard</a> -->
            </li>
            <li class="active">
                <!-- <i class="fa fa-desktop"></i> <a href="..." id="eti">Bootstrap Elements</a> -->
            </li>
        </ol>

        <!-- Page Heading -->
        <div class="row ">
            <div class="col-lg-12">
                <h1 class="page-header">
                 Usuarios <i class="fa fa-users"></i> </h1>
             </div>
         </div>

         <form class="form-inline" method='post' action='<?= URL; ?> Persona/registrar' onsubmit="return validar()">
            <div class="well">
                <div class="row contenedor">

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="" >Tipo documento <span class="ast">*</span></label>
                            <select name="tipoDoc" id="tipoDoc" class="select2" >
                                <option value=""></option>
                                <?php foreach ($TipoD as $k) { ?>
                                <option value="<?php echo $k->idtipoDocumento ?>"><?php echo $k->nombre ?></option> 
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="">N° documento <span class="ast">*</span></label>
                            <input type="text" maxlength="11" class="form-control num" name='documento'id="documento">
                        </div>
                    </div>
                    
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="">Primer Nombre <span class="ast">*</span></label>
                            <input type="text"  name='primerN' id="primerN" class="form-control soloLetra" maxlength="20" onkeypress="return soloLetras(event)">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="">Segundo Nombre </label>
                            <input type="text"  name='segundoN' id="segundoN" class="form-control soloLetra" maxlength="20" onkeypress="return soloLetras(event)">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="">Primer Apellido <span class="ast">*</span></label>
                            <input type="text"  name='primerA' id="primerA" class="form-control soloLetra" maxlength="20" onkeypress="return soloLetras(event)">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="">Segundo Apellido <span class="ast">*</span></label>
                            <input type="text"  name='segundoA' id="segundoA"class="form-control soloLetra" maxlength="20" onkeypress="return soloLetras(event)">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="">Fecha de Nacimiento <span class="ast">*</span></label>
                            <input type="date" class="form-control" name='fecha' id="fecha">
                        </div>
                    </div>
                    
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="" >Género <span class="ast">*</span></label>
                            <select name="genero" id="genero" class="form-control select2">
                                <option value=""></option>
                                <?php foreach ($registro as $k) { ?>
                                <option value="<?php echo $k->idgenero ?>"><?php echo $k->nombreGenero ?></option> 
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="">Teléfono <span class="ast">*</span></label>
                            <input type="text" maxlength="7" class="form-control num" name='telefono' id="telefono">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="">Celular </label>
                            <input type="text" maxlength="10" class="form-control num" name='celular' id="celular" >
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="" >Eps <span class="ast">*</span></label>
                            <select name="eps" id="eps" class="select2">
                                <option value=""></option>
                                <?php foreach($registroE as $key){?>
                                <option value="<?php echo $key->ideps ?>"><?php echo $key->nombreEps ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="" >Estado Civil <span class="ast">*</span></label>
                            <select name="estadoC" id="estadoC" class="select2">
                                <option value=""></option>
                                <option value="solter(a)">Solter(a)</option>
                                <option value="casad(a)">Casad(a)</option>
                                <option value="union libre">Unión libre</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="">Correo <span class="ast">*</span></label>
                            <input type="email" class="form-control" name='correo' id="correo" required >
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="">Dirección  </label>
                            <input type="text" class="form-control" name='direccion'id="direccion">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="" >Perfil <span class="ast">*</span></label>
                            <select name="perfil" id="perfil" class="select2">
                                <?php foreach($perfil as $key){?>
                                <option value="<?php echo $key->idPerfil ?>"><?php echo $key->nombreRol ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-sm-3" >
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" id="per">GUARDAR</button>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="gender" id="gender">

            
            <div id="ocultar">
                <h3><i class= "fa fa-plus-circle" style="color: #22C118"></i>  Información del Acudiente</h3>
                <hr>
                <div class="well">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="">Primer Nombre <span class="ast">*</span></label>
                                <input type="text"  name='primerNA' id="primerNA" class="form-control soloLetra" maxlength="20" onkeypress="return soloLetras(event)">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="">Segundo Nombre </label>
                                <input type="text"  name='segundoNA' id="segundoNA" class="form-control soloLetra" maxlength="20" onkeypress="return soloLetras(event)">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="">Primer Apellido <span class="ast">*</span></label>
                                <input type="text"  name='primerAA' id="primerAA" class="form-control soloLetra" maxlength="20" onkeypress="return soloLetras(event)">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="">Segundo Apellido <span class="ast">*</span></label>
                                <input type="text"  name='segundoAA' id="segundoAA" class="form-control soloLetra" maxlength="20" onkeypress="return soloLetras(event)">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="">Telefono <span class="ast">*</span></label>
                                <input type="text" maxlength="7" class="form-control num" name='telefonoA' id="telefonoA">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="">Dirección </label>
                                <input type="text"  name='direccionA' id="direccionA" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>


        <!-- /.container-fluid -->
    </div>
</div>

<script>
    $(document).ready(function(){
        $(".select2").select2({
            placeholder: "Buscar..",
            allowClear: true
        });
        $("#ocultar").hide();
        $("#fecha").change(function(){
            let f = $("#fecha").val()
            if (calcularEdad(f) <= 14){
                swal({
                    title: '¡Error!',
                    text: 'No puede ingresar',
                    type: 'error',
                    confirmButtonColor: '#d33'
                }).then(function(){
                    $("#fecha").val("");
                });
            }else if(calcularEdad(f) < 18){
                $("#ocultar").show();
                $("#gender").val("menor");
            }else{
                $("#ocultar").hide();
                $("#gender").val("mayor");
            }
        });
    });

    function calcularEdad(fecha){
        var birthday = new Date(fecha);
        var today = new Date();
        var years = today.getFullYear() - birthday.getFullYear();

        // Restablecer cumpleaños para el año actual.
        birthday.setFullYear(today.getFullYear());

        // Si el cumpleaños del usuario aún no ha ocurrido este año, reste 1

        if (today < birthday)
        {
            years--;
        }
        return years;
    }

    function validar() {
    //PERSONA
    var tipo = $('#tipoDoc').val().trim();
    var documento =$('#documento').val().trim();
    var primerN =$('#primerN').val();
    var primerA =$('#primerA').val();
    var segundoA =$('#segundoA').val();
    var fecha =$('#fecha').val();
    var telefono =$('#telefono').val();
    var eps =$('#eps').val();
    var correo =$('#correo').val();
    var perfil =$('#perfil').val();
    var genero =$('#genero').val();
    
    if (tipo === '' || documento == '' || primerN == '' || primerA == '' || segundoA == '' || 
        fecha == '' || genero ===''  || telefono == '' || eps === '' || perfil=== '') {
        swal({
            title: '¡Error!',
            text: 'Los campos marcados con * son obligatorios',
            type: 'error',
            confirmButtonColor: '#d33'
        });
    return false;   
}

         //ACUDIENTE
         if($("#gender").val()=="menor"){
            var primerNA =$('#primerNA').val();
            var primerAA =$('#primerAA').val();
            var segundoAA =$('#segundoAA').val();
            var telefonoA =$('#telefonoA').val();

            if (primerNA === '' || primerAA == '' || segundoAA == '' || telefonoA == '') {
                swal({
                    title: '¡Error!',
                    text: 'Los campos de acudiente marcados con * son obligatorios',
                    type: 'error',
                    confirmButtonColor: '#d33'
                });
                return false;   
            }
        }

    // if (primerN.toLowerCase() == 'null'){
    //     swal({
    //         title: '¡Error!',
    //         text: 'Carácter no valido',
    //         type: 'error',
    //         confirmButtonColor: '#d33'
    //     });
    //     return false;
    // }

    // if (primerA.toLowerCase() == 'null'){
    //     swal({
    //         title: '¡Error!',
    //         text: 'Carácter no valido',
    //         type: 'error',
    //         confirmButtonColor: '#d33'
    //     });
    //     return false;
    // }

    // if (segundoA.toLowerCase() == 'null'){
    //     swal({
    //         title: '¡Error!',
    //         text: 'Carácter no valido',
    //         type: 'error',
    //         confirmButtonColor: '#d33'
    //     });
    //     return false;
    // }

    // if ( fecha.toLowerCase() == 'null'){
    //     swal({
    //         title: '¡Error!',
    //         text: 'Carácter no valido',
    //         type: 'error',
    //         confirmButtonColor: '#d33'
    //     });
    //     return false;
    // }

    // if ( celular.toLowerCase() == 'null'){
    //     swal({
    //         title: '¡Error!',
    //         text: 'Carácter no valido',
    //         type: 'error',
    //         confirmButtonColor: '#d33'
    //     });
    //     return false;
    // }

    // if ( correo.toLowerCase() == 'null'){
    //     swal({
    //         title: '¡Error!',
    //         text: 'Carácter no valido',
    //         type: 'error',
    //         confirmButtonColor: '#d33'
    //     });
    //     return false;
    // }
}
</script>