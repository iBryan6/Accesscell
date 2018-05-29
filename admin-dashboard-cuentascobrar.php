<!DOCTYPE html>
<html>

<head>
    <title>CUENTAS POR COBRAR</title>
    <?php include_once('includes/head.php');?>
</head>

<body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">
        <!-- header -->
        <?php $page='CUENTASXCOBRAR'; include 'includes/admin-header.php';?>
        <!-- /.header -->

        <!-- sidebar -->
        <?php include 'includes/admin-sidebar.php';?>
        <!-- /.sidebar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    <?php echo $_SESSION['NombreSucursal'];?><small>Cuentas por cobrar</small></h1>
            </section>
            <!-- Main content -->
            <section class="container-fluid">
                <div class="col-md-12">
                    <a class="btn btn-app btntop" id="btnadd" data-toggle="modal" data-target="#modal-agregar"><i class="fa fa-plus"></i>Agregar</a>
                    <a class="btn btn-app btntop"><i class="fa fa-print"></i>Imprimir</a>
                </div>
            </section>
            <section class="content">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">CUENTAS POR COBRAR</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="categorias" class="table table-bordered table-striped table-condensed table-hover bootgrid-table">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Modelo/Producto</th>
                                    <th>Precio de Venta</th>
                                    <th>Venta</th>
                                    <th>Debe</th>
                                    <th>Cliente</th>
                                    <th>Telefono</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Feb 19, 2018</td>
                                    <td>S7 Edge</td>
                                    <td>20,000 <span>Bs.</span></td>
                                    <td>Detalle</td>
                                    <td>10,000</td>
                                    <td>Juan Perez</td>
                                    <td>70720210</td>
                                </tr>
                                <tr>
                                    <td>Feb 19, 2018</td>
                                    <td>S7 Edge</td>
                                    <td>200,000 <span>Bs.</span></td>
                                    <td>Al Mayor</td>
                                    <td>5,000</td>
                                    <td>Bill Gates</td>
                                    <td>72745101</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Modelo/Producto</th>
                                    <th>Precio de Venta</th>
                                    <th>Venta</th>
                                    <th>Debe</th>
                                    <th>Cliente</th>
                                    <th>Telefono</th>
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
    <!-- page script -->
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2({
                placeholder: "Selecciona una categoria"
            })
            $('#categorias').DataTable()
        })

        $(document).ready(function() {
            $("#optionsRadios3").click(function() {
                $("#toggleMonto").hide()
            })

            $("#optionsRadios4").click(function() {
                $("#toggleMonto").show()
            })
        });

    </script>
</body>

</html>
