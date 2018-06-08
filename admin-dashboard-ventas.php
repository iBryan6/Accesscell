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
                            <div class="col-md-8">
                                <h1>
                            <?php echo $_SESSION['NombreSucursal'];?>
                        </h1>
                            </div>
                            <div class="col-md-1"><a class="btn btn-app" id="btnadd" data-toggle="modal" data-target="#modal-agregar"><i class="fas fa-coins fa-2x"></i> Contado</a></div>
                            <div class="col-md-1"><a class="btn btn-app" id="btnaddcredito" data-toggle="modal" data-target="#modal-agregarcredito"><i class="far fa-sticky-note fa-2x"></i> Credito</a></div>
                            <div class="col-md-2"><a class="btn btn-app" id="btnaddmultiple" data-toggle="modal" data-target="#modal-agregarmultiple"><i class="fas fa-boxes fa-2x"></i> Multiple</a></div>
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
                                    <form action="includes/inserts/addtotable.php?agregarventa" method="POST">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">NUEVA VENTA</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" id="timedate" name="timedate" value="<?php date_default_timezone_set( 'America/New_York' ); echo date(" Y-m-d H:i:s "); ?>">

                                                <input type="hidden" class="form-control" id="userid" name="userid" value="<?php echo $_SESSION['idempleado'] ?>">

                                                <label for="facturainput">Factura:</label>
                                                <input type="num" class="form-control" style="width: 35%" id="facturainput" name="facturainput" autofocus>
                                                <br>
                                                <label for="inventarioselect">Nombre del Producto:</label>
                                                <br>
                                                <select class="form-control select2" id="inventarioselect" name="inventarioselect" style="width: 100%;">
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
                                                <label for="tipopagoselect">Tipo de Pago</label>
                                                <br>
                                                <select class="form-control select2" id="tipopagoselect" name="tipopagoselect" style="width: 100%;">
                                                    <?php $sql = "SELECT * FROM tipopago";
                                                        $result = mysqli_query($conn,$sql);
                                                        if ($result->num_rows > 0) {
                                                            // output data of each row
                                                            while($row = $result->fetch_assoc()) {
                                                                echo "<option value='".$row['idTipopago']."'>".$row['Tipopago']."</option>";
                                                            }
                                                            } else {
                                                                echo "0 resultados";
                                                            }
                                                    ?>
                                                </select>
                                                <br>
                                                <br>

                                                <label for="cantidadinput">Cantidad:</label><span style="font-variant: small-caps"> (unidades)</span>
                                                <input type="number" min="1" step="0.10" class="form-control" style="width: 35%" id="cantidadinput" name="cantidadinput" required>
                                                <br>

                                                <label for="costoinput">Costo Total:</label><span style="font-variant: small-caps"> (en bolivianos)</span>
                                                <input type="number" min="1" step="0.10" class="form-control" style="width: 35%" id="costoinput" name="costoinput" required>
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
