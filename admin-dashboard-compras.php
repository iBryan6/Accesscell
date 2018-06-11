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
                            <div class="col-md-8">
                                <h1><?php echo $_SESSION['NombreSucursal'];?></h1>
                            </div>
                            <div class="col-md-1"><a class="btn btn-app" id="btnadd" data-toggle="modal" data-target="#modal-agregar-contado"><i class="fas fa-coins fa-2x"></i> Contado</a></div>
                            <div class="col-md-1"><a class="btn btn-app" id="btnaddcredito" data-toggle="modal" data-target="#modal-agregarcredito"><i class="fas fa-handshake fa-2x"></i> Credito</a></div>
                            <div class="col-md-2"><a class="btn btn-app" id="btnaddmultiple" data-toggle="modal" data-target="#modal-agregar-multiple"><i class="fas fa-boxes fa-2x"></i> Multiple</a></div>
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
                                            <th>FACTURA</th>
                                            <th>PRODUCTO</th>
                                            <th>CANTIDAD</th>
                                            <th>COSTO TOTAL</th>
                                            <th>COSTO UNITARIO</th>
                                            <th>PROVEEDOR</th>
                                            <th>EMPLEADO</th>
                                            <th>OPCIONES</th>
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
                                                    echo "<td>".$id."</td>";
                                                    echo "<td>".$row['fecha']."</td>";
                                                    echo "<td>".$row['factura']."</td>";
                                                    echo "<td>".$row['marca']." - ".$row['nombre_categoria']." - ".$row['tipo']." - ".$row['modelo']."</td>";
                                                    echo "<td>".$cantidad."</td>";
                                                    echo "<td type='number' class='beforebs'>".$precio."</td>";
                                                    echo "<td class='beforebs'>".$precio/$cantidad."</td>";
                                                    echo "<td>".$row['proveedor']."</td>";
                                                    echo "<td>".$row['username']."</td>";
                                                    echo "<td><a class='btn btn-md bg-red btnborrar' id='$id' title='Eliminar'><i class='fa fa-trash'></i></a></td>";
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
                                            <th>FACTURA</th>
                                            <th>PRODUCTO</th>
                                            <th>CANTIDAD</th>
                                            <th>COSTO TOTAL</th>
                                            <th>COSTO UNITARIO</th>
                                            <th>PROVEEDOR</th>
                                            <th>EMPLEADO</th>
                                            <th>OPCIONES</th>
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
                                            <h4 class="modal-title">NUEVA COMPRA AL CONTADO</h4>
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
                                                <select class="form-control select2" id="inventarioselect" name="inventarioselect" style="width: 80%;">
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
                                                <input type="text" class="form-control" style="width: 50%" id="tipopagoselect" name="tipopagoselect" value="Efectivo" disabled>
                                                <br>

                                                <label for="cantidadinput">Cantidad de Compra:</label><span style="font-variant: small-caps"> (unidades)</span>
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
                        <!-- modal agregar multiple-->
                        <div class="modal fade" id="modal-agregar-multiple">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="includes/inserts/addtotable.php?agregarcompramultiple" method="POST">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">NUEVA COMPRA AL CONTADO</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" id="timedatemutilple" name="timedate" value="<?php date_default_timezone_set( 'America/New_York' ); echo date(" Y-m-d H:i:s "); ?>">

                                                <input type="hidden" class="form-control" id="useridmultiple" name="userid" value="<?php echo $_SESSION['idempleado'] ?>">
                                                <button type="button" class="btn btn-success" title="Agregar Mas" id="btnaddproduct">Agregar otro producto</button>
                                                <br>
                                                <br>
                                                <label for="facturainputmultiple">Factura:</label>
                                                <input type="num" class="form-control" style="width: 35%" id="facturainputmultiple" name="facturainputmultiple" autofocus>
                                                <br>
                                                <label for="tipopagoselectmultiple">Tipo de Pago</label>
                                                <input type="text" class="form-control" style="width: 50%" id="tipopagoselectmultiple" name="tipopagoselectmultiple" value="Efectivo" disabled>
                                                <br>
                                                <table id="dynamicfield">
                                                    <tr>
                                                        <td>
                                                            <label for="inventarioselectmultiple">PRODUCTO #1</label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <select class="form-control select2" id="inventarioselectmultiple" name="inventarioselectmultiple[]" style="width: 95%;">
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
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for="cantidadinputmultiple">Cantidad de Compra:</label><span style="font-variant: small-caps"> (unidades)</span>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="number" min="1" step="0.10" class="form-control" id="cantidadinputmultiple" name="cantidadinputmultiple" required>
                                                            <br>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for="costoinputmultiple">Costo Total:</label><span style="font-variant: small-caps"> (en bolivianos)</span>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="number" min="1" step="0.10" class="form-control" id="costoinputmultiple" name="costoinputmultiple" required>
                                                            <br>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <hr>

                                                <label for="detalleinputmultiple">Detalle:</label>
                                                <textarea class="form-control" rows="5" id="detalleinputmultiple" name="detalleinputmultiple" placeholder="No es Requerido"></textarea>
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
                //Datatables
            $('#tablacompras').DataTable({
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

            var i = 1;
            $('#btnaddproduct').click(function() {
                i++;
                $('#dynamicfield').append('<table id="row' + i + '" style="width:100%"><tr><td><label for="inventarioselectmultiple">PRODUCTO #' + i + '</label></td><td><button type="button" class="btn btn-danger btn_remove" title="Eliminar" id="' + i + '">Eliminar</button></td></tr><tr><td><select class="form-control select2" id="inventarioselectmultiple" name="inventarioselectmultiple[]"></select><br><br></td></tr><tr><td><label for="cantidadinputmultiple">Cantidad de Compra:</label><span style="font-variant: small-caps"> (unidades)</span></td></tr><tr><td><input type="number" min="1" step="0.10" class="form-control"id="cantidadinputmultiple" name="cantidadinputmultiple" required><br></td></tr><tr><td><label for="costoinputmultiple">Costo Total:</label><span style="font-variant: small-caps"> (en bolivianos)</span></td></tr><tr><td><input type="number" min="1" step="0.10" class="form-control"id="costoinputmultiple" name="costoinputmultiple" required><br></td></tr></table>');
            })
            $(document).on('click', '.btn_remove', function() {
                var button_id = $(this).attr("id");
                $("#row" + button_id + "").remove();
            })
        })

    </script>
</body>

</html>
