<!DOCTYPE html>
<html>

<head>
    <title>VENTAS</title>
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
                    <div class="col-md-2">
                       <center>
                        <a class="btn btn-app" id="btnadd" data-toggle="modal" data-target="#modal-agregar">
                            <i class="fa fa-plus"></i>Agregar
                        </a>
                        </center>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">LISTA DE VENTAS</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="tablaventas" class="table table-bordered table-striped table-condensed table-hover bootgrid-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>FECHA</th>
                                    <th>PRODUCTO</th>
                                    <th>VENTA UNITARIA</th>
                                    <th>CANTIDAD</th>
                                    <th>VENTA TOTAL</th>
                                    <th>TIPO PAGO</th>
                                    <th>EMPLEADO</th>
                                    <th>OPCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        $ventas=2;
                                        $sql = "SELECT * FROM transaccion JOIN almacen ON (transaccion.idalmacen = almacen.idalmacen) JOIN producto ON (almacen.idproducto = producto.idproducto) JOIN empleado ON (empleado.idempleado = transaccion.idempleado) JOIN tipopago ON (transaccion.idTipopago = tipopago.idTipopago) WHERE idTipotransaccion=$ventas";
                                        $result = mysqli_query($conn,$sql);
                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                    $id = $row['idTransaccion'];
                                                    $precio = $row['precio'];
                                                    $cantidad = $row['cantidad'];
                                                    echo "<tr>";
                                                    echo "<td>".$id."</td>";
                                                    echo "<td>".$row['fecha']."</td>";
                                                    echo "<td>".$row['marca']." ".$row['modelo']."</td>";
                                                    echo "<td class='beforebs'>".$precio/$cantidad."</td>";
                                                    echo "<td>".$cantidad."</td>";
                                                    echo "<td type='number' class='beforebs'>".$precio."</td>";
                                                    echo "<td>".$row['Tipopago']."</td>";
                                                    echo "<td>".$row['username']."</td>";
                                                    echo "<td><a class='btn btn-md bg-red btnborrar' id='$id' title='Eliminar'><i class='fa fa-trash'></i></a>
                                                    <a class='btn btn-md bg-green' id='$id'><i class='fa fa-edit'></i></a></td>";
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
                                    <th>FECHA</th>
                                    <th>PRODUCTO</th>
                                    <th>COSTO UNITARIO</th>
                                    <th>CANTIDAD</th>
                                    <th>COSTO TOTAL</th>
                                    <th>TIPO PAGO</th>
                                    <th>EMPLEADO</th>
                                    <th>OPCIONES</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- modal agregar -->
                <div class="modal fade" id="modal-agregar">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">AGREGAR PRODUCTO NUEVO</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="producto">Modelo/Producto:</label>
                                    <br>
                                    <select class="form-control select2" id="producto" style="width: 70%;">
                                                <option>Tarjeta Viva 10Bs.</option>
                                                <option>Tarjeta Entel 10Bs.</option>
                                                <option>Tarjeta Tigo 10Bs.</option>
                                            </select>
                                    <br>
                                    <br>

                                    <label for="precio">Precio Unitario:</label><span style="font-variant: small-caps"> (En Bolivianos)</span>
                                    <input type="Number" min="0" step="0.10" class="form-control" id="precio" placeholder="Importante" style="width: 35%" required>
                                    <br>

                                    <label for="cantidad">Cantidad:</label><span style="font-variant: small-caps"> (Unidades)</span>
                                    <input type="Number" min="0" step="1" class="form-control" id="Importante" style="width: 35%">
                                    <br>

                                    <label for="venta">Venta:</label>
                                    <div class="form-group" id="venta">
                                        <div class="radio">
                                            <label>
                                                        <input type="radio" name="optionsRadiosVentas" id="optionsRadios1" value="Detalle" checked> Detalle
                                                    </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                        <input type="radio" name="optionsRadiosVentas" id="optionsRadios2" value="Al Mayor"> Al Mayor
                                                    </label>
                                        </div>
                                    </div>

                                    <label for="tipopago">Tipo de Pago:</label>
                                    <div class="form-group" id="tipopago">
                                        <div class="radio">
                                            <label>
                                                        <input type="radio" name="optionsRadiosPago" id="optionsRadios3" value="Contado" checked> Contado
                                                    </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                        <input type="radio" name="optionsRadiosPago" id="optionsRadios4" value="Credito"> Credito
                                                    </label>
                                        </div>
                                    </div>
                                    <div id="toggleMonto">
                                        <label for="monto">Monto Pagado:</label><span style="font-variant: small-caps"> (En Bolivianos)</span>
                                        <input type="Number" min="0" step="0.10" class="form-control desc" id="monto" placeholder="Importante" style="width: 35%" required>
                                        <br>
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left bg-red" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-primary bg-green">Guardar</button>
                            </div>
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
            //Initialize Select2 Elements
            $('.select2').select2({
                placeholder: "Selecciona una categoria"
            })
            $('#tablaventas').DataTable({
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
            })
        })

    </script>
</body>

</html>
