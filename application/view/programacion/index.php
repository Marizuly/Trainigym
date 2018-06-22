<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div id="calendar" class="col-centered">
				</div>
			</div>

		</div>
	</div>
	<!-- /.container-fluid -->
<!-- </div> -->
<!-- /#page-wrapper -->

<!-- Modal agregar evento -->
<?php if(isset($_SESSION["admin"])|| isset($_SESSION["instructor"])) {?>
<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form class="form-horizontal" method="POST" action="<?= URL ?>programacion/registrar" onsubmit="return validarprogramacion()">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Agregar programación</h4>
				</div>

				<div class="modal-body">
					<div class="form-group">
						<label for="title" class="col-md-4 control-label">Clase &nbsp;<span class="ast">*</span></label>
						<div class="col-md-8">
							<select name="clase" id="clase" class="form-control">
								<option value="">Seleccione...</option>
								<?php
								foreach($registro as $key){
									echo "<option value='".$key->idClase."'>".$key->nombreClase."</option>";
								}
								?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="title" class="col-sm-4 control-label">Instructor &nbsp;<span class="ast">*</span></label>
						<div class="col-sm-8">
							<select name="instructor" id="instructor" class="form-control">
								<option value="">Seleccione...</option>                    
								<?php 
								foreach($reg as $key){
									echo"<option value='".$key->idusuario."'>".$key->primerNombre." ".$key->segundoNombre." ".$key->primerApellido." ".$key->segundoApellido."</option>";
								}
								?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="color" class="col-sm-4 control-label">Color &nbsp;<span class="ast">*</span></label>
						<div class="col-sm-8">
							<select name="color" class="form-control" id="color">
								<option value="">Seleccione...</option>
								<option style="color:#0071c5;" value="#0071c5">&#9724; Azul</option>
								<option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
								<option style="color:#008000;" value="#008000">&#9724; Green</option>
								<option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
								<option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
								<option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
								<option style="color:#000;" value="#000">&#9724; Black</option>

							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="horaInicio" class="col-sm-4 control-label">Hora inicial &nbsp;<span class="ast">*</span></label>
						<div class="col-sm-8">
							<input type="time" name="horaInicio" class="form-control" id="horaInicio">
						</div>
					</div>

					<div class="form-group">
						<label for="horaFinal" class="col-sm-4 control-label">Hora final &nbsp;<span class="ast">*</span></label>
						<div class="col-sm-8">
							<input type="time" name="horaFinal" class="form-control" id="horaFinal" >
						</div>
					</div>

					<div class="form-group">
						<label for="fecha" class="col-sm-4 control-label">Fecha</label>
						<div class="col-sm-8">
							<input type="date" name="fecha" class="form-control" id="fecha" readonly >
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>
							<?php } ?>

<!-- Modal editar evento -->
<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form class="form-horizontal" method="POST" onsubmit="return validareditprogramcion()">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Editar programaciòn</h4>
				</div>

				<div class="modal-body">
					<div id="divCampos">
						<input type="hidden" name="idProgramacion" id="idProgramacion">
						<div class="form-group">
							<label for="claseEdit" class="col-md-4 control-label">Clase &nbsp;<span class="ast">*</span></label>
							<div class="col-md-8">
								<select name="claseEdit" id="claseEdit" class="form-control select2">
									<option value="">Seleccione...</option>
									<?php
									foreach($registro as $key){
										echo "<option value='".$key->idClase."'>".$key->nombreClase."</option>";
									}
									?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="title" class="col-sm-4 control-label">Instructor &nbsp;<span class="ast">*</span></label>
							<div class="col-sm-8">
								<select name="instructorEdit" id="instructorEdit" class="form-control select2">
									<option value="">Seleccione...</option>                    
									<?php 
									foreach($reg as $key){
										echo"<option value='".$key->idusuario."'>".$key->primerNombre." ".$key->segundoNombre." ".$key->primerApellido." ".$key->segundoApellido."</option>";
									}
									?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="color" class="col-sm-4 control-label">Color &nbsp;<span class="ast">*</span></label>
							<div class="col-sm-8">
								<select name="colorEdit" class="form-control" id="colorEdit">
									<option value="">Seleccione...</option>
									<option style="color:#0071c5;" value="#0071c5">&#9724; Azul</option>
									<option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
									<option style="color:#008000;" value="#008000">&#9724; Green</option>
									<option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
									<option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
									<option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
									<option style="color:#000;" value="#000">&#9724; Black</option>

								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="horaInicioEdit" class="col-sm-4 control-label">Hora inicial &nbsp;<span class="ast">*</span></label>
							<div class="col-sm-8">
								<input type="time" name="horaInicioEdit" class="form-control" id="horaInicioEdit">
							</div>
						</div>

						<div class="form-group">
							<label for="horaFinalEdit" class="col-sm-4 control-label">Hora final &nbsp;<span class="ast">*</span></label>
							<div class="col-sm-8">
								<input type="time" name="horaFinalEdit" class="form-control" id="horaFinalEdit" >
							</div>
						</div>

						<div class="form-group">
							<label for="fechaEdit" class="col-sm-4 control-label">Fecha</label>
							<div class="col-sm-8">
								<input type="date" name="fechaEdit" class="form-control" id="fechaEdit" readonly >
							</div>
						</div>
					</div>

					<div id="divInfo">
						<h4><strong>Clase:&nbsp;</strong><span id="spanClase"></span></h4>
						<h4><strong>Instructor:&nbsp;</strong><span id="spanInstructor"></span></h4>
						<h4><strong>Hora de Inicio:&nbsp;</strong><span id="spanHoraIni"></span></h4>
						<h4><strong>Hora Final:&nbsp;</strong><span id="spanHoraFin"></span></h4>
					</div>
				</div>

				<div class="modal-footer">
								<button type="button" <?php if(isset($_SESSION["admin"])|| isset($_SESSION["instructor"])){ ?>class="btn btn-default" <?php } elseif(isset($_SESSION["cliente"])){ ?> class="btn btn-success" <?php } ?>  data-dismiss="modal">Cerrar</button>
					<?php if(isset($_SESSION["admin"])|| isset($_SESSION["instructor"])) {?>
					<button style="float: left" id="btnEditarProg" type="button" class="btn btn-success" >Editar</button>
					<button type="submit" class="btn btn-danger" id="btnEliminarProg" formaction="<?=URL?>programacion/eliminar">Eliminar</button>
					<button type="submit" class="btn btn-success" id="btnGuardarProg" formaction="<?=URL?>programacion/modificar">Guardar</button>
					<?php } ?>
				</div>
			</form>
		</div>
	</div>
</div>

<style type="text/css">
	.ast{
		color: red ;
	}
</style>


<script>


  function validarprogramacion(){
  	
	var horaF = $("#horaFinal").val();
	var horaI = $("#horaInicio").val();
    var clase = $("#clase").val();
    var instructor = $("#instructor").val();
    var fecha = $("#fecha").val();
    var color = $("#color").val();

	if (clase=="" || instructor==""|| color=="" || horaI== ""||horaF=="") {
		swal({
            title: '¡Error!',
            text: 'Los campos marcados con * son obligatorios',
            type: 'error',
            confirmButtonColor: '#d33'
        });
        return false; 
    }

    var fechaOriginal = new Date();
    var horaOriginal = fechaOriginal.getHours();
    if (horaOriginal < 10) {
    	horaOriginal = "0"+horaOriginal;
    }
    var minutoOriginal = fechaOriginal.getMinutes();
    if (minutoOriginal < 10) {
    	minutoOriginal = "0"+minutoOriginal;
    }
    horaA = horaOriginal+":"+minutoOriginal;
    diaO = fechaOriginal.getDate();
    if (diaO < 10) {
    	diaO = "0"+diaO;
    }
    añoO = fechaOriginal.getFullYear();
    mesO = fechaOriginal.getMonth();
    mesO += 1;
    if (mesO < 10) {
    	mesO = "0"+mesO; 
    }
    fechaO = añoO+"-"+mesO+"-"+diaO;
    if(horaI <= horaA){
    	if (fechaO == fecha) {
    		swal({
            title: '¡Error!',
            text: 'La hora inicial no puede ser inferior a la hora actual',
            type: 'error',
            confirmButtonColor: '#d33'
        });
        return false;
    	}	
    }
    if (horaI >= horaF){
    	swal({
            title: '¡Error!',
            text: 'La hora inicial no puede ser superior o igual a la hora final',
            type: 'error',
            confirmButtonColor: '#d33'
        });
        return false;
    }
  	return true;
  }

  function validareditprogramcion(){
  	
	
	var horaF = $("#horaFinalEdit").val();
	var horaI = $("#horaInicioEdit").val();
    var clase = $("#claseEdit").val();
    var instructor = $("#instructorEdit").val();
    var fecha = $("#fecha").val();
    var color = $("#colorEdit").val();

	if (clase=="" || instructor==""|| color=="" || horaI== ""||horaF=="") {
		swal({
            title: '¡Error!',
            text: 'Los campos marcados con * son obligatorios',
            type: 'error',
            confirmButtonColor: '#d33'
        });
        return false;
        
    }
  	return true;
  }
	

    $(document).ready(function(){
        $("#clase").val("");
        $("#instructor").val("");
        $("#fecha").val("");
        $("#color").val("");
        $("#calendar").fullCalendar({
            lang: "es",
            header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
            buttonText:{
                today:    'Hoy',
                month:    'Mes',
                week:     'Semana',
                day:      'Día'
            },
            dayClick: function(start) {
            	//Validación que fecha no sea inferior a la actual
            
            	<?php
            		$FechaActual = date('Y-m-d'); ?>
            		SystemHoy = <?php echo $FechaActual;
            	 ?>
            	
            	// FechaUsuario = date.format('YYYY-MM-DD');           	
            	$FechaActual =  $('#fecha').val(moment(start).format('YYYY-MM-DD'));


            	var hoy = new Date();
				var fechaFormulario = new Date($FechaActual.val());
				// Comparamos solo las fechas => no las horas!!
				hoy.setHours(0,0,0,0);  // Lo iniciamos a 00:00 horas
				fechaFormulario.setHours(0,0,0,0);
				fechaFormulario.setDate(fechaFormulario.getDate() + 1);
				if (hoy <= fechaFormulario) {
					console.log($("#clase").val())
					$("#clase").val("");
					$("#instructor").val("");
					$("#fecha").val("");
					$("#color").val("");
				  	$('#fecha').val(moment(start).format('YYYY-MM-DD'));
                	$('#ModalAdd').modal('show');
				}
					
				
				else {
				  swal({
					
			                position: 'top-end',
			                type: 'error',
			                title: '¡Error!',
							<?php if(isset($_SESSION["admin"])|| isset($_SESSION["instructor"])) {?>
			                text: 'La fecha no puede ser inferior a la fecha actual',
							<?php } elseif (isset($_SESSION["cliente"])) {?>
							text: 'No se encuentran eventos registrados en este día',
				  			<?php }?>
							
			                showConfirmButton: false,
			                timer: 2000
							
					    });
						
					
				}  	
            },
            events: [
			<?php foreach($registros as $event): 
                $start = $event->fecha."T".$event->horaInicio;
                $end = $event->fecha."T".$event->horaFin;
			?>
				{
					id: '<?php echo $event->idProgramacion; ?>',
					idClase: '<?php echo $event->idClase; ?>',
					fecha: '<?php echo $event->fecha; ?>',
					horaInicio: '<?php echo $event->horaInicio; ?>',
					horaFin: '<?php echo $event->horaFin; ?>',
					title: '<?php echo $event->nombreClase; ?>',
					start: '<?php echo $start; ?>',
					end: '<?php echo $end; ?>',
					color: '<?php echo $event->color; ?>',
					instructor: '<?php echo $event->idusuario; ?>',
					instructorStr: '<?php echo $event->primerNombre." ".$event->segundoNombre." ".$event->primerApellido." ".$event->segundoApellido; ?>',
				},
			<?php endforeach; ?>
            ],
            eventClick: function(event){
				console.log(event.id);
                $("#idProgramacion").val(event.id);
                $("#claseEdit").val(event.idClase);
                $("#instructorEdit").val(event.instructor);
                $("#horaInicioEdit").val(event.horaInicio);
                $("#horaFinalEdit").val(event.horaFin);
                $("#fechaEdit").val(event.fecha);
                $("#colorEdit").val(event.color);
                //Consultar 
                $("#spanClase").text(event.title);
                $("#spanInstructor").text(event.instructorStr);
                $("#spanHoraIni").text(event.horaInicio);
                $("#spanHoraFin").text(event.horaFin);
                // $("#spanFecha").text(event.fecha);
                $("#divCampos").hide();
                $("#divInfo").show();
                $("#btnGuardarProg").hide();
				$("#btnEliminarProg").show();
                $("#btnEditarProg").text("Editar");
                $("#btnEditarProg").removeClass("btn-warning").addClass("btn-success");
                $("#ModalEdit").modal("show");
            }
        });
    });

    $("#btnEditarProg").click(function(){
        if($("#btnEditarProg").text() == "Editar"){
            $("#divCampos").show();
            $("#divInfo").hide();
            $("#btnEliminarProg").hide();
            $("#btnGuardarProg").show();
            $("#btnEditarProg").removeClass("btn-success").addClass("btn-warning"); 
            $("#btnEditarProg").text("Cancelar");
        }else{
            $("#divCampos").hide();
            $("#divInfo").show();
            $("#btnGuardarProg").hide();
            $("#btnEliminarProg").show();
            $("#btnEditarProg").removeClass("btn-warning").addClass("btn-success"); 
            $("#btnEditarProg").text("Editar");
        }
    });

  
</script>
