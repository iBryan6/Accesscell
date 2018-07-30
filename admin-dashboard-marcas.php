<?php
session_start();
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <title>MARCAS</title>
        <?php include_once('includes/head.php');?>
    </head>

    <body class="hold-transition skin-primary sidebar-mini">
        <div class="wrapper">
            <!-- header -->
            <?php $page='LISTAS'; include 'includes/admin-header.php';?>
                <!-- /.header -->

                <!-- sidebar -->
                <?php include 'includes/admin-sidebar.php';?>
                    <!-- /.sidebar -->

                    <!-- Content Wrapper. Contains page content -->
                    <div class="content-wrapper">
                        <section class="content-header">
                            <div class="row">
                                <div class="col-md-11">
                                    <h1>
                            <?php echo $_SESSION['sucursalname'];?>
                        </h1>
                                </div>
                                <div class="col-md-1"><a class="btn btn-app" id="btnadd" data-toggle="modal" data-target="#modal-agregar"><i class="fa fa-plus"></i>Agregar</a></div>
                            </div>
                        </section>
                        <!-- Main content -->
                        <section class="content">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">LISTA DE MARCAS</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table id="tablemarcas" class="table table-bordered table-striped table-condensed table-hover bootgrid-table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>NOMBRE MARCA</th>
                                                    <th>OPCIONES</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $sql = "SELECT * FROM marca";
                                            $result = mysqli_query($conn,$sql);
                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                    $id = $row['idmarca'];
                                                    echo "<tr id='$id'>";
                                                    echo "<td>".$id."</td>";
                                                    echo "<td data-target='nombre_marca'>".$row['nombre_marca']."</td>";
                                                    echo "<td><a class='btn btn-md bg-red btnborrar' id='$id' title='Eliminar'><i class='fa fa-trash'></i></a>
                                                    <a class='btn btn-md bg-green btneditar' data-role='update' data-id='$id' title='Editar' data-toggle='modal' data-target='#modal-update-$id'><i class='fa fa-edit'></i></a></td>";
                                                    echo "</tr>";
                                                }
                                                } else {
                                                    echo "0 resultados";
                                                }
                                        ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>NOMBRE MARCA</th>
                                                    <th>OPCIONES</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- modal agregar -->
                            <div class="modal fade" id="modal-agregar">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="includes/inserts/addtotable.php?agregarmarca" method="POST">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Agregar Marca</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Marca Nueva</label>
                                                    <input type="text" class="form-control" name="nombremarca" maxlength="45" placeholder="Apple - Sony - Xiaomi" required autofocus>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default pull-left bg-red" data-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-primary bg-green" name="guardar">Guardar</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                            <!-- modal update -->
                            <div class="modal fade" id="modal-update">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="includes/inserts/updatetable.php?editarmarca" method="POST">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">EDITAR MARCA</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <input type="text" name="idinput" id="idinput" style="width: 100%; display: none;">
                                                    <label for="marcainput">Marca:</label>
                                                    <input type="text" class="form-control" name="marcainput" id="marcainput" style="width: 100%" maxlength="45" required autofocus>
                                                    <br>
                                                    <br>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default pull-left bg-red" data-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-primary bg-green" name="actualizar" id="actualizar">Actualizar</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                        </section>

                        <!-- /.content -->
                    </div>
                    <!-- /.content-wrapper -->

                    <!-- footer -->
                    <?php include 'includes/admin-footer.php';?>
                        <!-- /.footer -->
        </div>
        <!-- ./wrapper -->
        <script>
            $(document).ready(function() {
                //Datatables (search,paging,etc)
                $('#tablemarcas').DataTable({
                    dom: 'Bfrtip',
                    language: {
                        "decimal": "",
                        "emptyTable": "No hay información",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": "Mostrar _MENU_ Entradas",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscar:",
                        "zeroRecords": "Sin resultados encontrados",
                        "paginate": {
                            "first": "Primero",
                            "last": "Ultimo",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    },
                    "order": [
                        [1, "asc"]
                    ],
                    buttons: [{
                        extend: 'print',
                        text: '<i class="fas fa-print"></i> Imprimir',
                        title: 'Lista de Marcas',
                        messageTop: 'AccessCell',
                        exportOptions: {
                            columns: ':visible'
                        }
                    }, {
                        extend: 'pdf',
                        text: '<i class="far fa-file-pdf"></i> Descarga PDF',
                        title: 'AccessCell Marcas',
                        exportOptions: {
                            columns: ':visible'
                        }
                    }, {
                        extend: 'excel',
                        text: '<i class="far fa-file-excel"></i> Descarga Excel',
                        title: 'AccessCell Marcas',
                        exportOptions: {
                            columns: ':visible'
                        }
                    }, {
                        extend: 'colvis',
                        text: '<i class="fas fa-columns"></i><b> Columnas Visibles</b>',
                        postfixButtons: [{
                            extend: 'colvisRestore',
                            text: '<b>VER TODO</b>'
                        }]
                    }],
                    columnDefs: [{
                        targets: -1,
                        visible: true
                    }],
                });
                //Btn Borrar

                $(document).on('click', '.btnborrar', function() {
                    var id = this.id;
                    swal({
                            title: "Estas Seguro?",
                            text: "Una vez que se elimine, no podrás recuperar esta marca!",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                $.ajax({
                                    type: 'post',
                                    data: id,
                                    datatype: JSON,
                                    url: 'includes/inserts/deletefromtable.php?borrarmarca=' + id,
                                    success: function() {
                                        console.log('Success!', id);
                                    },
                                    error: function(e) {
                                        console.log('Error!', e);
                                    }
                                })
                                swal({
                                    title: "Poof!",
                                    text: "Se elimino la Marca",
                                    icon: "success",
                                });
                                setTimeout(function() {
                                    window.location.reload();
                                }, 2000);
                            } else {
                                swal("¡Tu Marca está segura!", "");
                            }
                        })
                });
                //Btn Editar
                $(document).on('click', '.btneditar', function() {
                    var id = $(this).data('id');
                    var marca = $('#' + id).children('td[data-target=nombre_marca]').text();

                    $('#idinput').val(id);
                    $('#marcainput').val(marca);
                    $('#modal-update').modal('toggle');
                });
            })

        </script>
    </body>

    </html>
