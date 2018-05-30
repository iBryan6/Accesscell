<!DOCTYPE html>
<html>

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
                            <div class="col-md-11">
                                <h1>
                            <?php echo $_SESSION['NombreSucursal'];?>
                        </h1>
                            </div>
                            <div class="col-md-1"><a class="btn btn-app" id="btnadd" data-toggle="modal" data-target="#modal-agregar"><i class="fa fa-plus"></i>Agregar</a></div>
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
                                            <th>ID</th>
                                            <th>FECHA</th>
                                            <th>PRODUCTO</th>
                                            <th>COSTO UNITARIO</th>
                                            <th>CANTIDAD</th>
                                            <th>COSTO TOTAL</th>
                                            <th>TIPO PAGO</th>
                                            <th>PROVEEDOR</th>
                                            <th>EMPLEADO</th>
                                            <th>OPCIONES</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $compras=1;
                                        $sql = "SELECT * FROM transaccion JOIN almacen ON (transaccion.idalmacen = almacen.idalmacen) JOIN producto ON (almacen.idproducto = producto.idproducto) JOIN empleado ON (empleado.idempleado = transaccion.idempleado) JOIN tipopago ON (transaccion.idTipopago = tipopago.idTipopago) WHERE idTipotransaccion=$compras";
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
                                                    echo "<td>".$row['proveedor']."</td>";
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
                                            <th>PROVEEDOR</th>
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
                                    <form action="includes/inserts/addtotable.php?agregarcompra" method="POST">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">NUEVA COMPRA</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" id="timedate" name="timedate" value="<?php date_default_timezone_set( 'America/New_York' ); echo date(" Y-m-d H:i:s "); ?>">

                                                <input type="hidden" class="form-control" id="userid" name="userid" value="<?php echo $_SESSION['idempleado'] ?>">

                                                <label for="fabricante">Nombre del Producto:</label>
                                                <br>
                                                <select class="form-control select2" id="inventarioselect" name="inventarioselect" style="width: 100%;">
                                                    <?php $sql = "SELECT * FROM almacen INNER JOIN producto ON(almacen.idproducto = producto.idproducto) INNER JOIN sucursal ON(producto.sucursal = sucursal.razon_social)";
                                                        $result = mysqli_query($conn,$sql);
                                                        if ($result->num_rows > 0) {
                                                            // output data of each row
                                                            while($row = $result->fetch_assoc()) {
                                                                echo "<option value='".$row['idalmacen']."'>".$row['categoria']." - ".$row['marca']." - ".$row['modelo']." - ".$row['proveedor']." - ".$row['razon_social']."</option>";
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
                                                <input type="number" min="0" step="0.10" class="form-control" style="width: 35%" id="cantidadinput" name="cantidadinput" required>
                                                <br>

                                                <label for="costoinput">Costo Total:</label><span style="font-variant: small-caps"> (en bolivianos)</span>
                                                <input type="number" min="0" step="0.10" class="form-control" style="width: 35%" id="costoinput" name="costoinput" required>
                                                <br>
                                                <label for="deudainput">Deuda:</label><span style="font-variant: small-caps"> (solo si no se pago en su totalidad)</span>
                                                <input type="number" min="0" step="0.10" class="form-control" style="width: 35%" id="deudainput" name="deudainput" placeholder="No es Requerido">
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
            })
            $('#tablacompras').DataTable({
                    dom: 'Bfrtip',
                    buttons: [{
                        extend: 'print',
                        text: '<i class="fas fa-print"></i> Imprimir',
                        title: 'Lista de Compras',
                        messageTop: 'AcessCell',
                        exportOptions: {
                            columns: ':visible'
                        }
                    }, {
                        extend: 'pdf',
                        text: '<i class="far fa-file-pdf"></i> Descarga PDF',
                        title: 'Acesscell Compras',
                        exportOptions: {
                            columns: ':visible'
                        }
                    }, {
                        extend: 'excel',
                        text: '<i class="far fa-file-excel"></i> Descarga Excel',
                        title: 'Acesscell Compras',
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
                //Btn Borrar
            $(document).on('click', '.btnborrar', function() {
                var id = this.id;
                swal({
                        title: "Estas Seguro? ",
                        text: "No se aconseja borrar la venta",
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
                                url: 'includes/inserts/deletefromtable.php?borrarcompra=' + id,
                                success: function() {
                                    console.log('Success!', id);
                                },
                                error: function(e) {
                                    console.log('Error!', e);
                                }
                            })
                            swal({
                                title: "Poof!",
                                text: "Se elimino la Compra",
                                icon: "success",
                            });
                            setTimeout(function() {
                                window.location.reload();
                            }, 1200);
                        } else {
                            swal("¡Tu Compra está segura!", "");
                        }
                    })
            })
        })

    </script>
</body>

</html>
