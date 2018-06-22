<div id="page-wrapper">
    <div class="container-fluid">

        <ol class="breadcrumb">
            <li class="hover">
                
            </li>
            <li class="active">
                
            </li>
        </ol>

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Clase
                </h1>
            </div>
        </div>

        <div class="well">
            <form class="form-inline" method='post' action='<?= URL; ?>Clase/registrar' onsubmit="return validar()">
                <div class="row">

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Nombre <span class="ast">*</span></label>
                            <input type="text" class="form-control" maxLength="45" name='nombreClase' id='nombreClase'>
                        </div>
                    </div>



                    <div class="form-row">
                        <div class="col-sm-12">
                            <label for="">Descripción :</label>
                            <textarea style="width:100% !important;" rows="5" class="form-control" name='descripcion' id='descripcion'></textarea>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-success" id="per">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<!-- No se permite el campo nombre vacío -->
<script>
    function validar() {
        var letras = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{3,45}$/i;
        var nombre = $('#nombreClase').val().trim();
        $('#nombre').val(nombre);

        if (nombre === '') {
            swal({
                title: '¡Error!',
                text: 'No se permite el campo nombre* vacìo',
                type: 'error',
                confirmButtonColor: '#d33'
            });
            return false;

        } else if (nombre.length < 3) {
            swal({
                title: '¡Error!',
                text: 'El nùmero de caracteres mìnimos deben de ser 3',
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
</script>