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
                    <div class="col-md-2"><a class="btn btn-app" id="btnadd" href="admin-dashboard-comprar.php"><i class="fas fa-coins fa-2x"></i> Agregar</a></div>
                </div>
            </section>
            <section class="content">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">LISTA DE COMPRAS</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="tablacompras" class="table table-bordered table-striped table-condensed table-hover bootgrid-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>FECHA Y HORA</th>
                                        <th>NUMERO DE RECIBO</th>
                                        <th>COSTO TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>FECHA Y HORA</th>
                                        <th>NUMERO DE RECIBO</th>
                                        <th>COSTO TOTAL</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
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
                                        <label for="tipopagoselect">Tipo de Pago</label>
                                        <input type="text" class="form-control" style="width: 30%" id="tipopagoselect" name="tipopagoselect" value="Efectivo" disabled>
                                        <hr>
                                        <div id="dynamic-field">
                                            <h3>Producto#1</h3>
                                            <label for="inventarioselect">Nombre del Producto:</label>
                                            <br>
                                            <select class="form-control select2" id="inventarioselect" name="inventarioselect[]">
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

                                            <label for="costoinput">Costo Unitario:</label><span style="font-variant: small-caps"> (en bolivianos)</span>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fas fa-dollar-sign"></i>
                                                </div>
                                                <input type="text" min="1" step="0.10" class="form-control" style="width: 35%" id="costoinput" name="costoinput[]" required>
                                            </div>
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
                                    <button type="submit" id="submit-form" class="btn btn-primary bg-green">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include 'includes/admin-footer.php';?>
    </div>
    <script>
        $(document).ready(function() {
            //SELECT 2 ELEMENTS
            $('.select2').select2({});

            //HTML CODE TO SHOW
            function format(result) {
                return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
                    '<tr>' +
                    '<td><b>Detalles:</b></td>' +
                    '<td>' + result[9] + '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td><b>Sucursal:</b></td>' +
                    '<td>' + result[10] + '</td>' +
                    '</tr>' +
                    '</table>';
            };

            //DATATABLES
            var table = $('#tablacompras').DataTable({
                "processing": true,
                "ajax": {
                    "method": "GET",
                    "url": "includes/transacciones/get.php?test",
                    "dataSrc": ""
                },
                "columns": [{
                        "data": "idRecibo"
                    },
                    {
                        "data": "fecha"
                    },
                    {
                        "data": "numero"
                    },
                    {
                        "data": "pagoTotal",
                        className: "beforebs"
                    }
                ],
                order: [
                    [1, "desc"]
                ],
                language: {
                    "decimal": ",",
                    "thousands": ".",
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

        });

    </script>
</body>

</html>
