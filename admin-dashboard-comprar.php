<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>NUEVA COMPRA</title>
    <?php include_once('includes/head.php');?>
</head>

<body class="hold-transition skin-primary sidebar-mini">
    <div class="wrapper">
        <!-- header -->
        <?php $page='OPCIONES'; include 'includes/admin-header.php';?>
        <?php include 'includes/admin-sidebar.php';?>
        <div class="content-wrapper">
            <section class="content-header">
                <div class="row">
                    <div class="col-md-10">
                        <h1>NUEVA COMPRA</h1>
                    </div>
                    <div class="col-md-"><a class="btn btn-success" id="btnadd" data-toggle="modal" data-target="#finalizar_compra"><i class="fas fa-money-check-alt"></i> Finalizar Compra <i class="fas fa-money-check-alt"></i></a></div>
                </div>
            </section>
            <section class="content container-fluid">
                <div class="row">
                    <!-- DATOS DEL RECIBO -->
                    <div class="col-md-10 col-sm-12 col-xs-12">
                        <h3>Datos del Recibo</h3>
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <label for="facturainput">Numero:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fas fa-receipt"></i>
                                </div>
                                <input type="number" class="form-control" id="facturainput" name="facturainput" autofocus>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <label for="tipopagoselect">Tipo de Pago</label>
                            <br>
                            <select class="form-control select2" id="tipopagoselect" name="tipopagoselect[]">
                                <option></option>
                                <?php $sql = "SELECT Tipopago FROM tipopago";
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
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <label for="detalleinput">Detalle:</label>
                            <textarea class="form-control" rows="4" id="detalleinput" name="detalleinput" placeholder="Opcional"></textarea>
                        </div>
                    </div>
                    <!-- AQUI ESTARAN TODOS LO ITEMS PARA PODER SELECIONAR -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <hr style="width: 100%; color: black; height: 1px; background-color:black;" />
                        <h3>Producto Nuevo</h3>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label for="selectsucursal">Sucursal</label>
                            <select class="form-control select2" id="selectsucursal" name="selectsucursal[]">
                                <option></option>
                                <?php $sql = "SELECT razon_social FROM sucursal WHERE razon_social <>'ADMINISTRACION'";
                                $result = mysqli_query($conn,$sql);
                                if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    echo "<option value='".$row['razon_social']."'>".$row['razon_social']."</option>";
                                }
                                } else {
                                    echo "0 resultados";
                                }
                            ?>
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label for="selectproveedor">Proveedor</label>
                            <select class="form-control select2" id="selectproveedor" name="selectproveedor[]" disabled>
                            </select>
                            <br>
                            <br>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <label for="selectcategoria">Categoria</label>
                            <select class="form-control select2" id="selectcategoria" name="selectcategoria[]" disabled>
                            </select>
                        </div>
                        <div class="col-md-9 col-sm-6 col-xs-12">
                            <label for="selectproducto">Producto</label>
                            <select class="form-control select2" id="selectproducto" name="selectproducto[]" disabled>
                            </select>
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12"><br>
                            <label for="inputcantidad">Cantidad</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fas fa-boxes"></i>
                                </div>
                                <input type="number" min="1" step="0.10" class="form-control" id="inputcantidad" name="inputcantidad[]" required>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12"><br>
                            <label for="inputprecio">Precio Unitario</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                                <input type="text" min="1" step="0.10" class="form-control" id="inputprecio" name="inputprecio[]" required>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-6 col-xs-12"><br>
                            <button type="submit" id="agregaralista" class="btn btn-info">Agregar a la Lista</button>
                        </div>
                    </div>
                    <!-- LISTA DE PRODUCTOS -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <hr style="width: 100%; color: black; height: 1px; background-color:black;" />
                        <h3>Lista de productos</h3>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="tablacompras" class="table table-bordered table-striped table-condensed table-hover bootgrid-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>CATEGORIAS</th>
                                            <th>MARCA</th>
                                            <th>MODELO</th>
                                            <th>CANTIDAD</th>
                                            <th>COSTO UNITARIO</th>
                                            <th>COSTO TOTAL</th>
                                            <th>PROVEEDOR</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>CATEGORIAS</th>
                                            <th>MARCA</th>
                                            <th>MODELO</th>
                                            <th>CANTIDAD</th>
                                            <th>COSTO UNITARIO</th>
                                            <th>COSTO TOTAL</th>
                                            <th>PROVEEDOR</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
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

            //DATATABLES
            var table = $('#tablacompras').DataTable({
                order: [
                    [1, "desc"]
                ],
                "scrollY": "300px",
                "scrollCollapse": true,
                "paging": false,
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
                }],
                columnDefs: [{
                    targets: -1,
                    visible: true
                }],
            });

            //SUCURSAL A PROVEEDOR
            $('#selectsucursal').change(function() {
                var sucursal = $(this).val();
                $('#selectproveedor').empty();
                $('#selectproveedor').removeAttr('disabled');
                $.ajax({
                    url: "includes/transacciones/get.php",
                    method: "POST",
                    data: {
                        sucursal: sucursal
                    },
                    success: function(data) {
                        $('#selectproveedor').html(data);
                    }
                });
            });

            //PROVEEDOR A CATEGORIA
            $('#selectproveedor').change(function() {
                var proveedor = $(this).val();
                $('#selectcategoria').empty();
                $('#selectcategoria').removeAttr('disabled');
                $.ajax({
                    url: "includes/transacciones/get.php",
                    method: "POST",
                    data: {
                        proveedor: proveedor
                    },
                    success: function(data) {
                        $('#selectcategoria').html(data);
                    }
                });
            });

            //CATEGORIA A PRODUCTO
            $('#selectcategoria').change(function() {
                var categoria = $(this).val();
                $('#selectproducto').empty();
                $('#selectproducto').removeAttr('disabled');
                $.ajax({
                    url: "includes/transacciones/get.php",
                    method: "POST",
                    data: {
                        categoria: categoria
                    },
                    success: function(data) {
                        $('#selectproducto').html(data);
                    }
                });
            });


        });

    </script>
</body>

</html>
