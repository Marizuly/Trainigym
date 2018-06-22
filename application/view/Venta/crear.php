<div id="page-wrapper">
    <div class="container-fluid">

        <ol class="breadcrumb">
            <li class="hover">
                <i class="fa fa-question-circle" style="font-size:20px;"></i> <a href="<?= URL ?>Ayudas/index" id="eti">Ayudas</a>
            </li>
            <li class="active">
                <i class="fa fa-sitemap" style="font-size:20px;"></i> <a href="<?= URL ?>Ayudas/mapa" id="eti">Mapa de navegación</a>
            </li>
        </ol>


        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Venta<i class="fa fa-cart-arrow-down"></i>
                </h1>
            </div>
        </div>

        <div class="well">
            <form class="form-inline" method='post' action='<?= URL; ?> Venta/registrar' onsubmit="return validar()">
                <div class="row contenedor">
                    <input type="hidden" name="IdHorario" id="IdHorario" />
                    <input type="hidden" name="date" id="date" value=""/>
                    <input type="hidden" id="duracion" name='duracion'>
                    <input type="hidden" id="beneM" name="beneM" >

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="">N° documento <span class="ast">*</span></label>
                            <select id="documento" onchange="consultarPersona()" name="documento" class="form-control select2">
                                <option value="" selected hidden>Buscar</option>
                                <?php foreach ($per as $k) { ?>
                                <option value="<?php echo $k->idusuario ?>"><?php echo $k->documento ?></option> 
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="" data-toggle="tooltip" title="Mateo te odio">Cliente: </label>
                            <input type="text" id="nombreUsuario" class="form-control" name="nombreUsuario" readonly>
                        </div>
                    </div>                       
                    
                    <div id="beneficiario">
                        <div class="col-sm-6" >
                            <div class="form-group" >
                                <label for="" style="display: block;">N° documento beneficiario <span class="ast">*</span></label>
                                <select id="documento1" onchange="consultarBeneficiario()" name="documento1" class="form-control select2">
                                    <option value="" selected hidden>Buscar</option>
                                    <?php foreach ($per as $k) { ?>
                                    <option value="<?php echo $k->idusuario ?>"><?php echo $k->documento ?></option> 
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="" style="display: block;">Beneficiario: </label>
                                <input type="text" id="nombreBeneficiario" class="form-control" name="nombreBeneficiario" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="">Membresía <span class="ast">*</span></label>
                            <select id="membresia" name="membresia"  class="form-control select2" onchange="cargarlosotros()">
                                <option value="" selected hidden >Seleccione una membresía</option>
                                <?php foreach ($membresia as $k) { ?>
                                <option value="<?php echo $k->idMembresia ?>"><?php echo $k->nombreTipoMembresia." ".$k->nombreMembresia?></option> 
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="">Cantidad de tiquetes: </label>
                            <input type="text" id="cantidad" class="form-control" name='cantidad' readonly>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="">Horario Mañana: </label>
                            <input type="text" id="horario" class="form-control" name='horario' readonly>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="">Horario Tarde:</label>
                            <input type="text" id="horarioTarde" class="form-control" name='horarioTarde' readonly>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="">Días que aplica: </label>
                            <input type="text" id="dias" class="form-control" name='dias' readonly>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="">Valor membresía: </label>
                            <input type="text" class="form-control" id="valor" name='valor'readonly>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="">Fecha de Terminación: </label>
                            <input type="text" class="form-control" name='fechaFin' readonly id="fechaFin">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="">Total a pagar:</label>
                            <input type="text" maxlength="6" class="form-control num" name='total' value="" id="total" readonly>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" id="per">GUARDAR</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->


<script>
    $(document).ready(function(){
        $("#beneficiario").hide();

        var f = new Date();
        var dia = (f.getDate().toString().length == 1) ? "0"+f.getDate() : f.getDate();
        var mes = ((f.getMonth() +1).toString().length == 1) ? "0"+(f.getMonth() +1) : (f.getMonth() +1);
        var fecha = f.getFullYear() + "/" + mes + "/"+ dia ;

        $('#date').val(fecha);
        $(".select2").select2({
            placeholder: "Buscar..",
            allowClear: true
        });
        
    });

    function cargarlosotros(){
        var idMem = $("#membresia").val();
        if(idMem==""){
            $("#IdHorario").val("");
            $("#horario").val("");
            $("#horarioTarde").val("");
            $("#dias").val("");
            $("#valor").val("");
            $("#anoVencimiento").val("");
            $("#cantidad").val("");
            $("#total").val("");
            $("#fechaFin").val("");  
            setTimeout(function() {
                $("#documento1").val("").trigger("change");
            }, 100);
            $("#nombreBeneficiario").val("");
        }else{
            $.ajax({
                url: '<?=URL?>Venta/consultarDatosMembresia/'+idMem,
                type: 'GET',
                dataType: 'JSON'
            }).done(function(data){
                $("#IdHorario").val(data.idplanesHorario);
                $("#horario").val(data.rangoInicioM+" a "+data.rangoFinM+" AM ");
                $("#horarioTarde").val(data.rangoInicioT+" a "+data.rangoFinT+" PM ");
                $("#dias").val(data.dia);
                $("#valor").val(data.valor);
                $("#anoVencimiento").val(data.year);
                $("#cantidad").val(data.cantidad);
                $("#total").val(data.valor);  
                $("#duracion").val(data.duracion);
                $("#beneM").val(data.beneficiarioM);

                if(data.beneficiarioM == 1){
                    $("#beneficiario").show();
                }else{
                    $("#beneficiario").hide();

                }                
                setTimeout(function() {
                    $("#documento1").val("").trigger("change");
                }, 100);
                
                $("#nombreBeneficiario").val("");
                var fecha = new Date();
                var duracion = $("#duracion").val();
                var addTime = duracion  * 86400; //Tiempo en segundos
                fecha.setSeconds(addTime); //Añado el tiempo
                var dia = fecha.getDate();
                dia = (dia.toString().length == 1) ? "0"+dia : dia;
                var mes = fecha.getMonth() + 1;
                mes = (mes.toString().length == 1) ? "0"+mes : mes;
                var anio = fecha.getFullYear();
                var fechaFin = anio + "/" +mes+ "/" +dia;
                $("#fechaFin").val(fechaFin);   
                
            }).fail(function(){
                alert("Error!");
            });
        }
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

    function consultarBeneficiario(){
        var idPersona1 = $("#documento").val();
        var idPersona = $("#documento1").val();
        if(idPersona == ""){
            $("#nombreBeneficiario").val("");
        }else{
            $.ajax({
                url: '<?=URL?>Venta/consultarDatosPersona/'+idPersona,
                type: 'GET',
                dataType: 'JSON'
            }).done(function(data){
                console.log(data);
                $("#nombreBeneficiario").val(data.primerNombre+" "+data.segundoNombre+" "+data.primerApellido+" "+data.segundoApellido);
            }).fail(function(){
                alert("Error!");
            });
        }
    }


    function validar(){
        var membresia = $('#membresia').val().trim();
        var total = $('#total').val().trim();
        var beneficiario = $("#documento1").val();
        var cliente = $("#documento").val();

        if(documento ==="" || membresia ==="" || total ===""){
            swal({
                title: '¡Error!',
                text: 'Los campos marcados con * son obligatorios',
                type: 'error',
                confirmButtonColor: '#d33'
            });

            return false;
        }
        
        if(beneficiario == cliente){
            swal({
                title: '¡Error!',
                text: 'El número de documento del beneficiario no puede igual al del cliente',
                type: 'error',
                confirmButtonColor: '#d33'
            });
            return false;  
        }

        if($("#beneM").val() == 1){
            if(beneficiario =="" || cliente==""){
                swal({
                    title: '¡Error!',
                    text: 'Debe de ingresar el documento del beneficiario',
                    type: 'error',
                    confirmButtonColor: '#d33'
                });
                return false;  
            }
        }
    }
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();   
  });



</script>