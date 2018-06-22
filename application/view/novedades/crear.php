<div id="page-wrapper">
   <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
                <!--<h1 class="page-header">
                    <center> Energym Xtreme</center>
                </h1>-->
                <ol class="breadcrumb">
                    <li class="hover">
                        <i class="fa fa-dashboard"></i> <a href="..." id="eti">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-desktop"></i> <a href="..." id="eti">Bootstrap Elements</a>
                    </li>
                </ol>
            </div>
        </div>

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Novedades
                </h1>
            </div>
        </div>

                        
        <div class="well">
            <form class="form-inline"  method='post' action='<?= URL; ?> novedades/registrar' onsubmit="return validar()">
                        <div class="row">
                        <div class="col-sm-3">
                        <div class="form-group">
                               
                            <label for="">N° documento <span class="ast">*</span></label>
                            <select id="documento" onchange="consultarPersona()" name="documento" class="form-control select2">
                                <option value="" selected hidden>Buscar</option>
                                <?php foreach ($datos as $k) { ?>
                                <option value="<?php echo $k->idusuario ?>"><?php echo $k->documento?></option> 
                                <?php } ?>
                            </select> 
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group"> 
                            <label for="" data-toggle="tooltip" title="nom">Cliente </label>
                            <input type="text" id="nombreUsuario" class="form-control" name="nombreUsuario" readonly>
                        </div>
                    </div>         
    

                        <div class="col-sm-3">
                        <div class="form-group">
                            <label for="" style="display: block;">Tipo de Novedad <span class="ast">*</span></label>
                            <select name="tipoN" id="tipoN" class="form-control select2">
                                <?php foreach($tipoN as $key){?>
                                <option value="" selected hidden>Buscar</option>
                                <option value="<?php echo $key->idtipoNovedades ?>"><?php echo $key->nombreNovedad ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                <div class="col-sm-3">
                <div class="form-group">
                    <label for="">Fecha novedad:</label>
                    <input type="text" class="form-control" name='fechaNovedad' id='fechaNovedad' readonly>
                </div>
            </div>

            </div>
                <div class="form-row">
                    <div class="col-12">
                    <label for="">Descripción:</label>
                    <textarea style="width:100% !important;" class="form-control" rows="5" name="descripcion" id="comment"></textarea>
                </div>   
                </div>
                <br>
                <button type="submit" class="btn btn-success">GUARDAR</button>
            </form>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<style type="text/css">
    .ast{
        color: red;
    }
</style>

<script>
    $(document).ready(function(){
        //para mostrar la fecha actual
        var f = new Date();
        var dia = (f.getDate().toString().length == 1) ? "0"+f.getDate() : f.getDate();
        var mes = ((f.getMonth() +1).toString().length == 1) ? "0"+(f.getMonth() +1) : (f.getMonth() +1);
        var fecha = f.getFullYear() + "/" + mes + "/"+ dia ;

        //aca se le asigna a el campo la fecha actual 
        $('#fechaNovedad').val(fecha);
        //para poner el select2
        $(".select2").select2({
            placeholder: "Buscar..",
            allowClear: true
        });
        
    });

//la funcion para mostrar la persona con el numero de documento
    function consultarPersona(){
        var idPersona = $("#documento").val();
        if(idPersona == ""){
            $("#nombreUsuario").val("");
        }else{
            $.ajax({
                //controlador/nombre de la funciona/ y parametro que envia 
                url: '<?=URL?>Novedades/consultarDatosPersona/'+idPersona,
                type: 'GET',
                dataType: 'JSON'
            }).done(function(data){
                console.log(data);
                //para poner el el campo el nombre
                $("#nombreUsuario").val(data.primerNombre+" "+data.segundoNombre+" "+data.primerApellido+" "+data.segundoApellido);
            }).fail(function(){
                alert("Error!");
            });
        }
    }

    function validar(){
        var documento = $('#documento').val();
        var tipoN = $('#tipoN').val();

        if (documento == "" || documento == null || tipoN == "" || tipoN == null) {
            swal({
                title: '¡Error!',
                text: 'Los campos con asterisco * son obligatorios',
                type: 'error',
                confirmButtonColor: '#d33',
            });    
               return false;
        }
    }



</script>
        
        
