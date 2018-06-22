
function validar() {
    var letras = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{3,45}$/i;
    var nombre = $('#nombre').val().trim();
    $('#nombre').val(nombre);

    if (nombre === '') {
        swal({
            title: '¡Error!',
            text: 'No se permite campo Vacío',
            type: 'error',
            confirmButtonColor: '#d33'
        });
        return false;

    } else if (nombre.length < 3) {
        swal({
            title: '¡Error!',
            text: 'El numero de caracteres minimos deben de ser 3',
            type: 'error',
            confirmButtonColor: '#d33'
        });
        return false;
        
    } else if (!letras.test(nombre)) {
        swal({
            title: '¡Error!',
            text: 'Solo se permiten letras',
            type: 'error',
            confirmButtonColor: '#d33'
        });
        return false;

    } else if (nombre.toLowerCase() == 'null') {
        swal({
            title: '¡Error!',
            text: 'Cáracter no válido',
            type: 'error',
            confirmButtonColor: '#d33'
        });
        return false;
    }
    return true;
}

function validarNumeros() {
    var valor = $('#valor').val().trim();
    var ano = $('#ano').val().trim();

    if (valor === '' || ano === '') {
        swal({
            title: '¡Error!',
            text: 'No se permiten campos Vacíos',
            type: 'error',
            confirmButtonColor: '#d33'
        });
        return false;
    }
}

/*VALIDA QUE SOLO SEAN NUMEROS Y POSITIVOS*/
$(document).ready(function(){
	$('.num').on('input', function () { 
		this.value = this.value.replace(/[^0-9]/g,'');
	});
});

//FUNCION QUE SOLO ACEPTE LETRAS
function soloLetras(e){
	key = e.keyCode || e.which;
	tecla = String.fromCharCode(key).toLowerCase();
	letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
	especiales = "8-37-39-46";

	tecla_especial = false
	for(var i in especiales){
		if(key == especiales[i]){
			tecla_especial = true;
			break;
		}
	}

	if(letras.indexOf(tecla)==-1 && !tecla_especial){
		return false;
	}
}
