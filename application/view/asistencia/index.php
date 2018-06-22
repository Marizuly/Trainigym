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
                    Asistencia
                </h1>
                <?php if(isset($_SESSION["admin"])) {  ?>
                <a href="<?= URL ?>asistencia/crear" class="btn btn-success"><i class= "fa fa-plus"></i> Agregar</a>
                <?php } ?>
                <br><br>

                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable">
                        <thead>
                            <!--Fila-->
                            <tr>
                                <!--Columna-->
                                <th>Nombres</th>
                                <th>fechaFin</th>
                                <th>Entrada</th>
                            </tr>
                        </thead>

                        <tbody>
                            <!--Listar la varible-->
                            <?php foreach($asis as  $value): ?>
                            <tr>
                                <td>
                                    <?= $value->Nombres?>
                                </td>
                                <td>
                                    <?= $value->fechaFin?>
                                </td>
                                <td>
                                    <?= $value->entrada?>
                                </td>
                                <?php if(isset($_SESSION["admin"])) {  ?>
                                <td>
                                    <a class="btn btn-success">Eliminar</a>
                                </td>
<?php } ?>
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

<!-- Modal -->


<script>
    function modificar() {
        $.ajax({
            url: '<?=URL?>Clase/modificar',
            data: $("#formEditar").serialize(),
            type: 'POST',
            dataType: 'JSON'
        }).done(function(data) {

            if (data.success) {
                $("#ModalEditar").modal("hide");

                swal({
                    position: 'top-end',
                    type: 'success',
                    title: '!Éxito!',
                    text: 'Se modifico correctamente',
                    showConfirmButton: false,
                    timer: 4000
                })
                setTimeout(function() {
                    location.reload();

                }, 300);
            } else {
                alert("No se pudo modificar");
            }
        }).fail(function() {
            alert("Error");
        });

    }
</script>