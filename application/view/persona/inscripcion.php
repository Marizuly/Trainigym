<div id="page-wrapper">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="hover">
                <i class="fa fa-dashboard"></i> <a href="..." id="eti">Ayuda</a>
            </li>
            <li class="active">
                <i class="fa fa-desktop"></i> <a href="..." id="eti">Bootstrap Elements</a>
            </li>
        </ol>

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Registros Pendientes
                </h1>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="tblPersona">
                        <thead>
                            <!--Fila-->
                            <tr>
                                <!--Columna-->
                                <th>Documento </th>
                                <th>Persona </th>
                                <th>Fecha registro</th>
                                <th>Estado registro</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            <!--Listar la varible-->
                            <?php foreach($registros as $key => $value): ?>
                            <tr>
                            <td>
                                    <?= $value->documento?>
                                </td>
                                <td>
                                    <?= $value->persona?>
                                </td>
                                <td>
                                    <?= $value->fechaRegistro?>
                                </td>
                                <td>
                                    <?= $value->estadoRegistro?>
                                </td>
                                <td>
                                     <a href="" class=" btn btn-success">Asignar venta</a>
                                    
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

    <style type="text/css">
        .form-control {
            width: 80% !important;
        }
    </style>

    <script>
        //data table
        $(document).ready(function() {

            var buttonCommon = {
                exportOptions: {
                    format: {
                        body: function(data, row, column, node) {
                            // Strip $ from salary column to make it numeric
                            return column === 5 ?
                                data.replace(/[$,]/g, '') :
                                data;
                        }
                    }
                }
            };

            $('#tblPersona').DataTable({
                responsive: {
                    details: {
                        display: $.fn.dataTable.Responsive.display.modal({
                            header: function(row) {
                                var data = row.data();
                                return 'Detalles para ' + data[0] + ' ' + data[1];
                            }
                        }),
                        renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                            tableClass: 'table'
                        })
                    }
                },
                "language": {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ Registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                },
                dom: 'Bfrtip',
                buttons: [
                    $.extend(true, {}, buttonCommon, {
                        extend: 'copyHtml5'
                    }),
                    $.extend(true, {}, buttonCommon, {
                        extend: 'excelHtml5'
                    }),
                    $.extend(true, {}, buttonCommon, {
                        extend: 'pdfHtml5'
                    })
                ]
            });
        });

        function editar(id) {
            $.ajax({
                url: '<?=URL?>Persona/editar/' + id,
                type: 'GET',
                dataType: 'JSON'
            }).done(function(data) {
                $(".dtr-bs-modal").modal("hide");
                $("#id").val(data.idusuario);
                $("#documento").val(data.documento);
                $("#primerN").val(data.primerNombre);
                $("#segundoN").val(data.segundoNombre);
                $("#primerA").val(data.primerApellido);
                $("#segundoA").val(data.segundoApellido);
                $("#fecha").val(data.fechaNacimiento);
                $("#telefono").val(data.telefono);
                $("#celular").val(data.celular);
                $("#correo").val(data.correo);
                $("#direccion").val(data.direccion);
                $("#perfil option[value=" + data.idPerfil + "]").attr("selected", true);
                $("#tipoDoc option[value=" + data.idtipoDocumento + "]").attr("selected", true);
                $("#eps option[value=" + data.ideps + "]").attr("selected", true);
                $("#genero option[value=" + data.idgenero + "]").attr("selected", true);
                $("#estadoC option[value=" + data.estadoCivil + "]").attr("selected", true);
                $("#ModalEditar").modal("show");
            });
        }

        function modificar() {
            $.ajax({
                url: '<?=URL?>Persona/modificar',
                data: $("#formEditar").serialize(),
                type: 'POST',
                dataType: 'JSON'
            }).done(function(data) {
                if (data.success) {
                    $("#ModalEditar").modal("hide");
                    setTimeout(function() {
                        alert("se modificó exitosamente");
                        location.reload();
                    }, 200);
                } else {
                    alert("No se pudo modificar");
                }
            }).fail(function() {
                alert("Error");
            });
        }
    </script>