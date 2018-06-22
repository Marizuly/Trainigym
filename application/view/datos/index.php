<div id="page-wrapper">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="hover">
               
            </li>
            <li class="active">
                
            </li>
        </ol>

  <div class="row">
            <div class="col-lg-20">
                <h1 class="page-header">
           Datos 
        </h1000>
    </div>
</div>

<div class="well">
    <form class="form-inline" method='post' action='<?= URL; ?> datos/modificar'>
        <div class="row contenedor">
        <input type="hidden" name="id" value="<?= $respuesta->idinstrcutor ?>">


<div class="col-md-3">
         <div class="form-group">
                            <label for="">Tipo de documento</label>
                            <select name="tipoDoc" id="tipoDoc" class="form-control select2" disabled>
                                <?php foreach ($respuestaTD as $k) { 
                                    ?>
                                    <option value="<?php echo $k->idtipoDocumento ?>"><?php echo $k->nombre ?></option> 
                                    <?php 
                                } 
                                ?>
                            </select>
                        </div>
                        </div>
        

             <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Documento </label>
                            <input type="text" class="form-control" name='documento' value="<?= $respuesta->documento ?>" readonly>
                        </div>
                    </div>

            <div class="col-sm-3">
                <div class="form-group"> 
                    <label for="">Primer Nombre </label>
                    <input type="text" class="form-control" name='primerN' value="<?= $respuesta->primerNombre ?>" readonly>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label for="">Segundo Nombre </label>
                    <input type="text" class="form-control" name='segundoN' value="<?= $respuesta->segundoNombre ?>" readonly>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label for="">Primer Apellido </label>
                    <input type="text" class="form-control" name='primerA' value="<?= $respuesta->primerApellido ?>" readonly>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label for="">Segundo Apellido </label>
                    <input type="text" class="form-control" name='segundoA' value="<?= $respuesta->segundoApellido ?>" readonly>
                </div>
            </div>

            <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Fecha de Nacimiento </label>
                            <input type="date" class="form-control" name='fecha' value="<?= $respuesta->fechaNacimiento ?>" readonly>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="">Género </label>
                            <select name="genero" id="genero" class="form-control select2" disabled>
                                <?php foreach ($respuestaGe as $k) { ?>
                                <option value="<?php echo $k->idgenero ?>"><?php echo $k->nombreGenero ?></option> 
                                <?php } ?>
                            </select>
                        </div>
                    </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label for="">Dirección </label>
                    <input type="text" class="form-control" name='direccion' value="<?= $respuesta->direccion ?>" readonly>
                </div>
                </div>

                <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Correo </label>
                            <input type="text" class="form-control" name='correo' value="<?= $respuesta->correo ?>" readonly>
                        </div>
                    </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label for="">Teléfono </label>
                    <input type="text" class="form-control" name='telefono' value="<?= $respuesta->telefono ?>" readonly>
                </div>
            </div>

            <div class="col-sm-3">
                        <div class="form-group">
                            <label for="">Celular </label>
                            <input type="text" class="form-control" name='celular' value="<?= $respuesta->celular ?>" readonly>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="">Eps </label>
                            <select name="eps" id="eps" class="form-control select2"  disabled>
                                <?php foreach ($respuestaE as $k) { ?>
                                <option value="<?php echo $k->ideps ?>"><?php echo $k->nombreEps ?></option> 
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                     <div class="col-sm-3">
                        <div class="form-group">
                            <label for="">Estado Civil </label>
                            <select name="estadoC" id="estadoC" class="form-control select2"  disabled>
                                <option value="soltero">Soltero</option>
                                <option value="casado">Casado</option>
                                <option value="union libre">Unión libre</option>
                            </select>
                        </div>
                    </div>
        </div>
    </form>
</div>
<div class="modal-footer">
      <button type="button" class="btn btn-success" onclick="editar()">Modificar</button>
    </div>
</div>
</div>

<!-- Editar Instructor -->
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
            <div class="row contenedor">
                        <input type="hidden" name="id" id="id">

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Primer Nombre <span class="ast">*</span></label>
                            <input type="text" name='primerN' id="primerN" class="form-control soloLetra"  maxlength="15" onkeypress="return soloLetras(event)">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Segundo Nombre </label>
                            <input type="text" class="form-control" name='segundoN' id="segundoN" >
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Primer Apellido <span class="ast">*</span></label>
                            <input type="text" class="form-control" name='primerA' id="primerA" class="form-control soloLetra" maxlength="15" onkeypress="return soloLetras(event)">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Segundo Apellido <span class="ast">*</span></label>
                            <input type="text" class="form-control" name='segundoA' id="segundoA" class="form-control soloLetra" maxlength="15" onkeypress="return soloLetras(event)">
                        </div>
                    </div>


                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Teléfono <span class="ast">*</span></label>
                            <input type="text"  maxlength="7" class="form-control num" name='telefono' id="telefono">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Celular </label>
                            <input type="text"  maxlength="10" class="form-control num" name='celular' id="celular">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Eps <span class="ast">*</span></label>
                            <select name="eps" id="modaleps" class="form-control select2M">
                            <option value=""></option>
                                <?php foreach ($respuestaE as $k) { ?>
                                <option value="<?php echo $k->ideps ?>"><?php echo $k->nombreEps ?></option> 
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Estado Civil <span class="ast">*</span></label>
                            <select name="estadoC" id="modalestadoC" class="form-control select2M">
                            <option value=""></option>
                                <option value="soltero">Soltero</option>
                                <option value="casado">Casado</option>
                                <option value="union libre">Unión libre</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Dirección </label>
                            <input type="text" class="form-control" name='direccion' id="direccion">
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

<!-- /#page-wrapper -->
<style type="text/css">
  .ast{
    color: red ;
  }
</style>


<script>
$(document).ready(function(){
    
    $("#eps option[value="+"<?= $respuesta->ideps ?>"+"]").attr("selected",true);
    $("#estadoC option[value='<?= $respuesta->estadoCivil ?>']").attr("selected",true);
    $("#genero option[value='<?= $respuesta->idgenero ?>']").attr("selected",true);

});


  function editar($id){
    $("#ModalEditar").modal("show")
    $.ajax({
      url: '<?=URL?>datos/editar/',
      type: 'GET',
      dataType: 'JSON'
    }).done(function(data)
    {

      $("#id").val(data.idusuario);
      $("#primerN").val(data.primerNombre);
      $("#segundoN").val(data.segundoNombre);
      $("#primerA").val(data.primerApellido);
      $("#segundoA").val(data.segundoApellido);
      $("#direccion").val(data.direccion);
      $("#telefono").val(data.telefono);
      $("#celular"). val(data.celular);
      //$("#modaleps option[value="+data.ideps+"]").attr("selected",true);
    //$("#modalestadoC option[value="+data.estadoCivil +"]").attr("selected",true);
    
    $(".select2M").select2({
        allowClear: true,
        placeholder: "Seleccione..."
    });

    $(".dtr-bs-modal").modal("hide");
      $("#ModalEditar").modal("show");

      setTimeout(function(){
        $("#modaleps").val(data.ideps).trigger("change");
        $("#modalestadoC").val(data.estadoCivil).trigger("change");
      },200);

    });
  }

  function modificar(){
    var primerN = $('#primerN').val();
    var primerA = $('#primerA').val();
    var segundoA = $('#segundoA').val();
    var telefono = $('#telefono').val();
    var eps = $('#modaleps').val();
    var estadoC = $('#modalestadoC').val();

    if(primerN ==="" || primerA ==="" || segundoA ==="" || telefono ==="" || eps ==="" || estadoC ==="" ){
        swal({
                title: '!Error!',
                text: 'Los campos  marcados con asterisco * son obligatorios',
                type: 'error',
                ConfirmButtonColor: '#d33'
            });
        return false;
    } else if (primerN.toLowerCase() == 'null')  {
        swal({
            title: '¡Error!',
            text: 'Cáracter no válido',
            type: 'error',
            confirmButtonColor: '#d33'
        });
        return false;
    } else if (primerA.toLowerCase() == 'null')  {
        swal({
            title: '¡Error!',
            text: 'Cáracter no válido',
            type: 'error',
            confirmButtonColor: '#d33'
        });
        return false;
    } else if (segundoA.toLowerCase() == 'null')  {
        swal({
            title: '¡Error!',
            text: 'Cáracter no válido',
            type: 'error',
            confirmButtonColor: '#d33'
        });
        return false;
        
    }else{
    $.ajax({
      url: '<?=URL?>datos/modificar',
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
                text: 'Se Modificó correctamente',
                showConfirmButton: false,
                timer: 5000
            })
          setTimeout(function(){
                   location.reload();            
          
        },2100);
      }else{
        alert("No se pudo modificar");
      }
    }).fail(function(){
      alert("Error");
    });
  }
}
</script>