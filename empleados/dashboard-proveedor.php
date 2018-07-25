<?php
session_start();
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <title>PROVEEDOR</title>
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
                                    <h3 class="box-title">LISTA DE PROVEEDORES</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table id="tableproveedores" class="table table-bordered table-striped table-condensed table-hover bootgrid-table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>REPRESENTANTE</th>
                                                    <th>PAIS</th>
                                                    <th>TELEFONO</th>
                                                    <th>OPCIONES</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $sql = "SELECT * FROM proveedor";
                                            $result = mysqli_query($conn,$sql);
                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                    $id = $row['idproveedor'];
                                                    echo "<tr id='$id'>";
                                                    echo "<td>".$id."</td>";
                                                    echo "<td data-target='representante'>".$row['representante']."</td>";
                                                    echo "<td data-target='ubicacion'>".$row['ubicacion']."</td>";
                                                    echo "<td data-target='telefono'>".$row['telefono']."</td>";
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
                                                    <th>REPRESENTANTE</th>
                                                    <th>PAIS</th>
                                                    <th>TELEFONO</th>
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
                                        <form action="includes/inserts/addtotable.php?agregarproveedor" method="POST">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">AGREGAR PROVEEDOR NUEVO</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="representante">Representante:</label>
                                                    <br>
                                                    <input type="text" class="form-control" name="representante" style="width: 70%" maxlength="100" required autofocus>
                                                    <br>

                                                    <label for="ubicacion">Pais:</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fas fa-map-marker-alt"></i>
                                                        </div>
                                                        <input type="text" class="form-control" name="ubicacion" placeholder="No es requerido" style="width: 70%" maxlength="100">
                                                    </div>

                                                    <br>

                                                    <label for="telefono">Telefono: <small>(591-474-10001)</small></label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-phone"></i>
                                                        </div>
                                                        <input type="text" class="form-control" name="telefono" placeholder="No es requerido" style="width: 35%" autocomplete="tel-national" maxlength="14">
                                                    </div>

                                                    <br>
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
                                        <form action="includes/inserts/updatetable.php?editarproveedor" method="POST">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">EDITAR PROVEEDOR</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <input type="text" name="idinput" id="idinput" style="width: 100%; display: none;">
                                                    <label for="representante">Representante:</label>
                                                    <input type="text" class="form-control" name="representanteinput" id="representanteinput" style="width: 100%" maxlength="100" required autofocus>
                                                    <br>
                                                    <br>

                                                    <label for="ubicacion">Ubicacion:</label>
                                                    <input type="text" class="form-control" name="ubicacioninput" id="ubicacioninput" style="width: 100%" maxlength="100">
                                                    <br>
                                                    <br>

                                                    <label for="telefono">Telefono:</label>
                                                    <input type="text" class="form-control" name="telefonoinput" id="telefonoinput" style="width: 100%" autocomplete="tel-national" maxlength="14">
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
        <!-- page script -->
        <script>
            $(document).ready(function() {
                //Datatables (search,paging,etc)
                $('#tableproveedores').DataTable({
                    dom: 'Bfrtip',
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
                //Btn Editar
                $(document).on('click', '.btneditar', function() {
                    var id = $(this).data('id');
                    var representante = $('#' + id).children('td[data-target=representante]').text();
                    var ubicacion = $('#' + id).children('td[data-target=ubicacion]').text();
                    var telefono = $('#' + id).children('td[data-target=telefono]').text();

                    $('#idinput').val(id);
                    $('#representanteinput').val(representante);
                    $('#ubicacioninput').val(ubicacion);
                    $('#telefonoinput').val(telefono);
                    $('#modal-update').modal('toggle');
                });
                //Btn Borrar
                $(document).on('click', '.btnborrar', function() {
                    var id = this.id;
                    var table = $('#tableproveedores').DataTable();
                    swal({
                            title: "Estas Seguro?",
                            text: "Una vez que se elimine, no podrás recuperar este Proveedor!",
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
                                    url: 'includes/inserts/deletefromtable.php?borrarproveedor=' + id,
                                    success: function() {
                                        console.log('Success!', id);
                                    },
                                    error: function(e) {
                                        console.log('Error!', e);
                                    }
                                })
                                swal({
                                    title: "Poof!",
                                    text: "Se elimino el Proveedor",
                                    icon: "success",
                                });
                                setTimeout(function() {
                                    window.location.reload();
                                }, 2000);
                            } else {
                                swal("¡Tu Proveedor está seguro!", "");
                            }
                        })
                });
            })

        </script>
    </body>

    </html>
