<!DOCTYPE html>
<html>

<head>
    <title>INVENTARIO</title>
    <?php include_once('includes/head.php');?>
</head>

<body class="hold-transition skin-primary sidebar-mini">
    <div class="wrapper">
        <!-- header -->
        <?php $page='INVENTARIO'; include 'includes/admin-header.php';?>
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
                                <h3 class="box-title">LISTA DEL INVENTARIO</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="tablainventario" class="table table-bordered table-striped table-condensed table-hover bootgrid-table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>PRODUCTO</th>
                                            <th>SUCURSAL</th>
                                            <th>CANTIDAD</th>
                                            <th>COSTO FISICO</th>
                                            <th>INVENTARIO VALORADO</th>
                                            <th>OPCIONES</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $sql = "SELECT * FROM almacen INNER JOIN producto ON (almacen.idproducto = producto.idproducto) INNER JOIN sucursal ON (producto.sucursal = sucursal.razon_social) INNER JOIN categoria ON (producto.categoriaid = categoria.idcategoria)";
                                            $result = mysqli_query($conn,$sql);
                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                    $id = $row['idalmacen'];
                                                    $cantidad = $row['stock'];
                                                    $preciofisico = $row['costodecompra'];
                                                    $precioventa = $row['preciomayor'];
                                                    echo "<tr id='$id'>";
                                                    echo "<td data-target='id'>".$id."</td>";
                                                    echo "<td data-target='modelo' data-value='".$row['idproducto']."'>".$row['marca']." - ".$row['nombre_categoria']." -  ".$row['tipo']." - ".$row['modelo']."</td>";
                                                    echo "<td data-target='razon_social'>".$row['razon_social']."</td>";
                                                    echo "<td data-target='stock' class='afterund'>".$cantidad."</td>";
                                                    echo "<td data-target='preciofisico' class='beforebs'>".$english_format_number = number_format(($cantidad*$preciofisico),2)."</td>";
                                                    echo "<td data-target='precioventa' class='beforebs'>".$english_format_number = number_format(($cantidad*$precioventa),2)."</td>";
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
                                            <th>PRODUCTO</th>
                                            <th>SUCURSAL</th>
                                            <th>CANTIDAD</th>
                                            <th>COSTO FISICO</th>
                                            <th>INVENTARIO VALORADO</th>
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
                                    <form action="includes/inserts/addtotable.php?agregarinventario" method="POST">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Agregar Inventario Inicial</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="selectproducto">Producto:</label>
                                                <br>
                                                <select class="form-control select2" id="selectproducto" name="selectproducto" style="width: 100%;" required>
                                                    <?php $sql = "SELECT * FROM producto INNER JOIN sucursal ON(producto.sucursal = sucursal.razon_social) INNER JOIN categoria ON (producto.categoriaid = categoria.idcategoria)";
                                                        $result = mysqli_query($conn,$sql);
                                                        if ($result->num_rows > 0) {
                                                            // output data of each row
                                                            while($row = $result->fetch_assoc()) {
                                                                echo "<option value='".$row['idproducto']."'>".$row['marca']." - ".$row['nombre_categoria']." - ".$row['tipo']." - ".$row['modelo']." | ".$row['razon_social']."</option>";
                                                            }
                                                            } else {
                                                                echo "0 resultados";
                                                            }
                                                    ?>
                                                </select>
                                                <br>
                                                <br>
                                                <label for="stockinput">Inventario Inicial</label><span style="font-variant: small-caps"> (unidades)</span>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fas fa-boxes"></i>
                                                    </div>
                                                    <input type="Number" min="0" step="1" class="form-control" id="stockinput" name="stockinput" style="width: 35%">
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
                                    <form action="includes/inserts/updatetable.php?editarinventario" method="POST">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Editar Inventario</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <input type="hidden" name="idinput" id="idinput" style="width: 100%;">
                                                <input type="hidden" name="updateidprod" id="updateidprod" style="width: 100%;">

                                                <label for="updateproducto">Producto:</label>
                                                <br>
                                                <input type="text" min="0" step="1" class="form-control" id="updateproducto" name="updateproducto" style="width: 100%" disabled>
                                                <br>

                                                <label for="updatestock">Inventario: </label><span style="font-variant: small-caps"> (unidades)</span>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fas fa-boxes"></i>
                                                    </div>
                                                    <input type="Number" min="0" step="1" class="form-control" id="updatestock" name="updatestock" style="width: 35%">
                                                </div>
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
    <script>
        $(document).ready(function() {
            //Datatables (search,paging,select2,etc)
            $('.select2').select2({
                placeholder: "Selecciona una categoria"
            })
            $('#tablainventario').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'print',
                    text: '<i class="fas fa-print"></i> Imprimir',
                    title: 'Lista del Inventario',
                    messageTop: 'AccessCell',
                    exportOptions: {
                        columns: ':visible'
                    }
                }, {
                    extend: 'pdf',
                    text: '<i class="far fa-file-pdf"></i> Descarga PDF',
                    title: 'AccessCell Inventario',
                    exportOptions: {
                        columns: ':visible'
                    }
                }, {
                    extend: 'excel',
                    text: '<i class="far fa-file-excel"></i> Descarga Excel',
                    title: 'AccessCell Inventario',
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
                //color columns
                'rowCallback': function(row, data, index) {
                    if (data[3] <= 50 & data[3] >= 11) {
                        $(row).find('td:eq(3)').css('background-color', '#F39C12');
                        $(row).find('td:eq(3)').css('color', '#fff');
                    }
                    if (data[3] <= 10) {
                        $(row).find('td:eq(3)').css('background-color', '#DD4B39');
                        $(row).find('td:eq(3)').css('color', '#fff');
                    }
                },
            })

            //Btn Borrar
            $(document).on('click', '.btnborrar', function() {
                var id = this.id;
                swal({
                        title: "Estas Seguro? ",
                        text: "(PRIMERO DEBES BORRAR LAS TRANSACCIONES)",
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
                                url: 'includes/inserts/deletefromtable.php?borrarinventario=' + id,
                                success: function() {
                                    console.log('Success!', id);
                                },
                                error: function(e) {
                                    console.log('Error!', e);
                                }
                            })
                            swal({
                                title: "Poof!",
                                text: "Se elimino el Producto del Inventario",
                                icon: "success",
                            });
                            setTimeout(function() {
                                window.location.reload();
                            }, 1200);
                        } else {
                            swal("¡Tu Producto está seguro!", "");
                        }
                    })
            })

            //Btn Editar
            $(document).on('click', '.btneditar', function() {
                var id = $(this).data('id');
                var idtest = $('#' + id).children('td[data-target=modelo]').attr('data-value');
                var stock = $('#' + id).children('td[data-target=stock]').text();
                var producto = $('#' + id).children('td[data-target=modelo]').text();

                $('#idinput').val(id);
                $('#updateidprod').val(idtest);
                $('#updatestock').val(stock);
                $('#updateproducto').val(producto);
                $('#modal-update').modal('toggle');
            })
        })

    </script>
</body>

</html>
