<?php
session_start();
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <title>COMPRAS</title>
        <?php include_once('includes/head.php');?>
    </head>

    <body class="hold-transition skin-primary sidebar-mini">
        <div class="wrapper">
            <!-- header -->
            <?php $page='TRANSACCION'; include 'includes/admin-header.php';?>
                <!-- /.header -->

                <!-- sidebar -->
                <?php include 'includes/admin-sidebar.php';?>
                    <!-- /.sidebar -->

                    <!-- Content Wrapper. Contains page content -->
                    <div class="content-wrapper">
                        <section class="content-header">
                            <div class="row">
                                <div class="col-md-10">
                                    <h1>
                            <?php echo $_SESSION['NombreSucursal'];?>
                        </h1>
                                </div>
                                <div class="col-md-2"><a class="btn btn-app" id="btnadd" data-toggle="modal" data-target="#modal-agregar-contado"><i class="fas fa-coins fa-2x"></i> Agregar</a></div>
                            </div>
                        </section>
                        <section class="content">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">LISTA DE COMPRAS</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="tablacompras" class="table table-bordered table-striped table-condensed table-hover bootgrid-table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>FECHA</th>
                                                <th>FACTURA</th>
                                                <th>PRODUCTO</th>
                                                <th>CANTIDAD</th>
                                                <th>COSTO TOTAL</th>
                                                <th>COSTO UNITARIO</th>
                                                <th>PROVEEDOR</th>
                                                <th>EMPLEADO</th>
                                                <th hidden>DETALLE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $compras=1;
                                        $sql = "SELECT * FROM transaccion JOIN almacen ON (transaccion.idalmacen = almacen.idalmacen) JOIN producto ON (almacen.idproducto = producto.idproducto) JOIN empleado ON (empleado.idempleado = transaccion.idempleado) JOIN tipopago ON (transaccion.idTipopago = tipopago.idTipopago) JOIN categoria ON (producto.categoriaid = categoria.idcategoria) WHERE idTipotransaccion=$compras";
                                        $result = mysqli_query($conn,$sql);
                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                    $id = $row['idTransaccion'];
                                                    $precio = $row['precio'];
                                                    $cantidad = $row['cantidad'];
                                                    echo "<tr>";
                                                    echo "<a class='btn btn-md'title='Open' id='$id'><td class='detailsopen details-control'></td></a>";
                                                    echo "<td>".$row['fecha']."</td>";
                                                    echo "<td>".$row['factura']."</td>";
                                                    echo "<td>".$row['marca']." - ".$row['nombre_categoria']." - ".$row['tipo']." - ".$row['modelo']."</td>";
                                                    echo "<td>".$cantidad."</td>";
                                                    echo "<td type='number' class='beforebs'>".$english_format_number = number_format($precio,2)."</td>";
                                                    echo "<td class='beforebs'>".$english_format_number = number_format(round($precio/$cantidad, 2),2)."</td>";
                                                    echo "<td>".$row['proveedor']."</td>";
                                                    echo "<td>".$row['username']."</td>";
                                                    echo "<td hidden>".$row['detalle']."</td>";
                                                    echo "</tr>";
                                                }
                                                } else {
                                                    echo "0 resultados";
                                                }
                                        ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th>FECHA</th>
                                                <th>FACTURA</th>
                                                <th>PRODUCTO</th>
                                                <th>CANTIDAD</th>
                                                <th>COSTO TOTAL</th>
                                                <th>COSTO UNITARIO</th>
                                                <th>PROVEEDOR</th>
                                                <th>EMPLEADO</th>
                                                <th hidden>DETALLE</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- modal agregar contado-->
                            <div class="modal fade" id="modal-agregar-contado">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="includes/inserts/addtotable.php?agregarcompra" method="POST">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">NUEVA COMPRA</h4>
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
                                                    <label for="inventarioselect">Nombre del Producto:</label>
                                                    <br>
                                                    <select class="form-control select2" id="inventarioselect" name="inventarioselect" style="width: 80%;">
                                                        <?php $sql = "SELECT * FROM almacen INNER JOIN producto ON(almacen.idproducto = producto.idproducto) INNER JOIN sucursal ON(producto.sucursal = sucursal.razon_social) INNER JOIN categoria ON (producto.categoriaid = categoria.idcategoria)";
                                                        $result = mysqli_query($conn,$sql);
                                                        if ($result->num_rows > 0) {
                                                            // output data of each row
                                                            while($row = $result->fetch_assoc()) {
                                                                echo "<option value='".$row['idalmacen']."' id='".$row['marca']."'>".$row['marca']." - ".$row['nombre_categoria']." - ".$row['tipo']." - ".$row['modelo']." | ".$row['razon_social']."</option>";
                                                            }
                                                            } else {
                                                                echo "0 resultados";
                                                            }
                                                    ?>
                                                    </select>
                                                    <br>
                                                    <br>
                                                    <label for="tipopagoselect">Tipo de Pago</label>
                                                    <input type="text" class="form-control" style="width: 30%" id="tipopagoselect" name="tipopagoselect" value="Efectivo" disabled>
                                                    <br>

                                                    <label for="cantidadinput">Cantidad:</label><span style="font-variant: small-caps"> (unidades)</span>
                                                    <input type="number" min="1" step="0.10" class="form-control" style="width: 35%" id="cantidadinput" name="cantidadinput" required>
                                                    <br>

                                                    <label for="costoinput">Costo Unitario:</label><span style="font-variant: small-caps"> (en bolivianos)</span>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fas fa-dollar-sign"></i>
                                                        </div>
                                                        <input type="text" min="1" step="0.10" class="form-control" style="width: 35%" id="costoinput" name="costoinput" required>
                                                    </div>
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
                //Initialize Select2 Elements
                $('.select2').select2({
                    placeholder: "Selecciona una categoria"
                });

                //HTML CODE TO SHOW
                function format(result) {
                    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
                        '<tr>' +
                        '<td><b>Detalles:</b></td>' +
                        '<td>' + result[9] + '</td>' +
                        '</tr>' +
                        '</table>';
                };

                //Datatables
                var table = $('#tablacompras').DataTable({
                    order: [
                        [1, "desc"]
                    ],
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

                //SELECTED ITEM SHOWS PRICE
                $("#inventarioselect").change(function() {
                    var selected = $("#inventarioselect").val();
                    $.get("includes/inserts/get.php?priceproduct=" + selected, function(data) {
                        $("#costoinput").val(data);
                    });
                });
            });

        </script>
    </body>

    </html>
