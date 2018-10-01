<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>VENTAS</title>
    <?php include_once('includes/head.php');?>
</head>

<body class="hold-transition skin-primary sidebar-mini">
    <div class="wrapper">
        <?php $page='TRANSACCION'; include 'includes/admin-header.php';?>
        <?php include 'includes/admin-sidebar.php';?>
        <div class="content-wrapper">
            <section class="content-header">
                <div class="row">
                    <div class="col-md-10">
                        <h1>
                            <?php echo $_SESSION['sucursalname'];?>
                        </h1>
                    </div>
                    <div class="col-md-2"><a class="btn btn-app" id="btnadd" href="#"><i class="fas fa-coins fa-2x"></i> Agregar</a></div>
                </div>
            </section>
            <section class="content">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">LISTA DE VENTAS</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="tablaventas" class="table table-bordered table-striped table-condensed table-hover bootgrid-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>FECHA</th>
                                        <th>FACTURA</th>
                                        <th>COSTO TOTAL</th>
                                        <th>TIPO PAGO</th>
                                        <th>EMPLEADO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>FECHA</th>
                                        <th>FACTURA</th>
                                        <th>COSTO TOTAL</th>
                                        <th>TIPO PAGO</th>
                                        <th>EMPLEADO</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modal-agregar">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="includes/inserts/addtotable.php?agregarventa" method="POST">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">NUEVA VENTA AL CONTADO</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="timedate" name="timedate" value="<?php date_default_timezone_set( 'America/New_York' ); echo date(" Y-m-d H:i:s "); ?>">

                                        <input type="hidden" class="form-control" id="userid" name="userid" value="<?php echo $_SESSION['idempleado'] ?>">

                                        <label for="facturainput">Factura:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fas fa-receipt"></i>
                                            </div>
                                            <input type="number" class="form-control" style="width: 35%" id="facturainput" name="facturainput" autofocus>
                                        </div>
                                        <br>
                                        <label for="tipopagoselect">Tipo de Pago</label>
                                        <input type="text" class="form-control" style="width: 30%" id="tipopagoselect" name="tipopagoselect" value="Efectivo" disabled>
                                        <hr>
                                        <div id="dynamic-field">
                                            <h3>Producto #1</h3>
                                            <label for="inventarioselect">Nombre del Producto:</label>
                                            <br>
                                            <select class="form-control select2" id="inventarioselect" name="inventarioselect[]" style="width: 100%;">
                                                        <?php $sql = "SELECT * FROM almacen INNER JOIN producto ON(almacen.idproducto = producto.idproducto) INNER JOIN sucursal ON(producto.sucursal = sucursal.razon_social) INNER JOIN categoria ON (producto.categoriaid = categoria.idcategoria)";
                                                        $result = mysqli_query($conn,$sql);
                                                        if ($result->num_rows > 0) {
                                                            // output data of each row
                                                            while($row = $result->fetch_assoc()) {
                                                                echo "<option value='".$row['idalmacen']."'>".$row['marca']." - ".$row['nombre_categoria']." ".$row['tipo']." - ".$row['modelo']." | ".$row['razon_social']."</option>";
                                                            }
                                                            } else {
                                                                echo "0 resultados";
                                                            }
                                                    ?>
                                                    </select>
                                            <br>
                                            <br>

                                            <label for="cantidadinput">Cantidad:</label><span style="font-variant: small-caps"> (unidades)</span>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fas fa-boxes"></i>
                                                </div>
                                                <input type="number" min="1" step="0.10" class="form-control" style="width: 35%" id="cantidadinput" name="cantidadinput[]" required>
                                            </div>
                                            <br>

                                            <label for="costoinput">Precio Unitario:</label><span style="font-variant: small-caps"> (en bolivianos)</span>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <b>Venta Mayor</b>
                                                </div>
                                                <input type="text" class="form-control" style="width: 60%" id="preciomayoradd" disabled>
                                                <div class="input-group-addon">
                                                    <b>Venta Menor</b>
                                                </div>
                                                <input type="text" class="form-control" style="width: 60%" id="preciomenoradd" disabled>
                                            </div>
                                            <br/>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fas fa-dollar-sign"></i>
                                                </div>
                                                <input type="number" min="1" step="0.10" class="form-control" style="width: 35%" id="costoinput" name="costoinput[]" required>
                                            </div>
                                            <br/>
                                        </div>
                                        <hr>
                                            <button type="submit" class="btn btn-primary bg-info btn-sm" id="add-more">Agregar Producto</button>
                                        <br>
                                        <br>
                                        <label for="detalleinput">Detalle:</label>
                                        <textarea class="form-control" rows="5" id="detalleinput" name="detalleinput" placeholder="No es Requerido"></textarea>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left bg-red" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary bg-green">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modal-agregar-credito">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="includes/inserts/addtotable.php?agregarventacredito" method="POST">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">NUEVA VENTA A CREDITO</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="timedatecredit" name="timedatecredit" value="<?php date_default_timezone_set( 'America/New_York' ); echo date(" Y-m-d H:i:s "); ?>">

                                        <input type="hidden" class="form-control" id="useridcredit" name="useridcredit" value="<?php echo $_SESSION['idempleado'] ?>">

                                        <label for="facturainputcredit">Factura:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fas fa-receipt"></i>
                                            </div>
                                            <input type="number" class="form-control" style="width: 35%" id="facturainputcredit" name="facturainputcredit" autofocus>
                                        </div>
                                        <br>
                                        <label for="inventarioselectcredit">Nombre del Producto:</label>
                                        <br>
                                        <select class="form-control select2" id="inventarioselectcredit" name="inventarioselectcredit" style="width: 100%;">
                                                        <?php $sql = "SELECT * FROM almacen INNER JOIN producto ON(almacen.idproducto = producto.idproducto) INNER JOIN sucursal ON(producto.sucursal = sucursal.razon_social) INNER JOIN categoria ON (producto.categoriaid = categoria.idcategoria)";
                                                        $result = mysqli_query($conn,$sql);
                                                        if ($result->num_rows > 0) {
                                                            // output data of each row
                                                            while($row = $result->fetch_assoc()) {
                                                                echo "<option value='".$row['idalmacen']."'>".$row['marca']." - ".$row['nombre_categoria']." - ".$row['tipo']." - ".$row['modelo']." | ".$row['razon_social']."</option>";
                                                            }
                                                            } else {
                                                                echo "0 resultados";
                                                            }
                                                    ?>
                                                    </select>
                                        <br>
                                        <br>
                                        <label for="tipopagoselectcredit">Tipo de Pago</label>
                                        <input type="text" class="form-control" style="width: 30%" id="tipopagoselectcredit" name="tipopagoselectcredit" value="Credito" disabled>
                                        <br>

                                        <label for="cantidadinputcredit">Cantidad:</label><span style="font-variant: small-caps"> (unidades)</span>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fas fa-boxes"></i>
                                            </div>
                                            <input type="number" min="1" step="0.10" class="form-control" style="width: 30%" id="cantidadinputcredit" name="cantidadinputcredit" required>
                                        </div>
                                        <br>

                                        <label for="costoinputcredit">Precio Unitario:</label><span style="font-variant: small-caps"> (en bolivianos)</span>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <b>Venta Mayor</b>
                                            </div>
                                            <input type="text" class="form-control" style="width: 60%" id="preciomayoraddcredit" disabled>
                                            <div class="input-group-addon">
                                                <b>Venta Menor</b>
                                            </div>
                                            <input type="text" class="form-control" style="width: 60%" id="preciomenoraddcredit" disabled>
                                        </div>
                                        <br/>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fas fa-dollar-sign"></i>
                                            </div>
                                            <input type="number" min="1" step="0.10" class="form-control" id="costoinputcredit" name="costoinputcredit" style="width: 26%" required>
                                        </div>
                                        <br>
                                        <label for="resultadocredit">Total:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fas fa-equals"></i>
                                            </div>
                                            <input type="number" min="0.00" step="0.05" class="form-control" id="resultadocredit" name="resultadocredit" style="width: 25%" disabled>
                                            <button type="button" class="btn btn-default pull-left bg-blue" id="calcularbtn">Calcular</button>
                                        </div>
                                        <br>

                                        <label for="pagoinicialcredit">Pago Inicial:</label><span style="font-variant: small-caps"> (en bolivianos)</span>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fas fa-dollar-sign"></i>
                                            </div>
                                            <input type="number" min="1" step="0.10" class="form-control" id="pagoinicialcredit" name="pagoinicialcredit" style="width: 35%" required>
                                        </div>
                                        <br>
                                        <label for="detalleinputcredit">Detalle:</label>
                                        <textarea class="form-control" rows="5" id="detalleinputcredit" name="detalleinputcredit" placeholder="No es Requerido"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left bg-red" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary bg-green">Guardar</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            </section>
        </div>
        <?php include 'includes/admin-footer.php';?>
    </div>
    <!-- ./wrapper -->
    <script>
        $(document).ready(function() {
            //Initialize Select2 Elements
            $('.select2').select2({});

            //HTML CODE TO SHOW
            function format(result) {
                return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
                    '<tr>' +
                    '<td><b>Deuda:</b></td>' +
                    '<td>Bs. ' + numeral(result[9]).format('0,0.00') + '</td>' +
                    '<td><b>Pago Inicial:</b></td>' +
                    '<td>Bs. ' + numeral(result[11]).format('0,0.00') + '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td><b>Detalles:</b></td>' +
                    '<td>' + result[10] + '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td><b>Agregar un Pago?</b></td>' +
                    '<td><a href="#">Agregar</a></td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td><b>Lista de Pagos:</b></td>' +
                    '<td><a href="#">Ver</a></td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td><b>Sucursal:</b></td>' +
                    '<td>'+ result[12] + '</td>' +
                    '</tr>' +
                    '</table>';
            };

            //DATATABLES
            var table = $('#tablaventas').DataTable({
                "order": [
                    [1, "desc"]
                ],
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
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'print',
                    text: '<i class="fas fa-print"></i> Imprimir',
                    title: 'Lista de Compras',
                    messageTop: 'AccessCell',
                    exportOptions: {
                        columns: ':visible'
                    }
                }, {
                    extend: 'pdf',
                    text: '<i class="far fa-file-pdf"></i> Descarga PDF',
                    title: 'AccessCell Compras',
                    exportOptions: {
                        columns: ':visible'
                    }
                }, {
                    extend: 'excel',
                    text: '<i class="far fa-file-excel"></i> Descarga Excel',
                    title: 'AccessCell Compras',
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
                'rowCallback': function(row, data, index) {
                    if (data[3] == "Efectivo") {
                        $(row).find('td:eq(3)').css('color', 'green');
                    } else {
                        $(row).find('td:eq(3)').css('color', 'red');
                    }
                },
            });

            //SHOW AND CLOSE DETAILS
            $(document).on('click', '.details-control', function() {
                var td = $(this).closest('td');
                var row = table.row(td);
                if (row.child.isShown()) {
                    // This row is already open - close it
                    row.child.hide();
                    td.removeClass('detailsopen');
                    td.addClass('detailsopen');
                } else {
                    // Open this row
                    row.child(format(row.data())).show();
                    td.removeClass('detailsopen');
                    td.addClass('detail');
                }
            });
        })

    </script>
</body>

</html>
