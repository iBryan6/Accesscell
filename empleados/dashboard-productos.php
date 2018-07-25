<?php
session_start();
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <title>PRODUCTOS</title>
        <?php include_once('includes/head.php');?>
    </head>

    <body class="hold-transition skin-primary sidebar-mini">
        <div class="wrapper">
            <!-- header -->
            <?php $page='LISTAS'; include 'includes/header.php';?>
                <!-- /.header -->

                <!-- sidebar -->
                <?php include 'includes/sidebar.php';?>
                    <!-- /.sidebar -->

                    <!-- Content Wrapper. Contains page content -->
                    <div class="content-wrapper">
                        <section class="content-header">
                            <div class="row">
                                <div class="col-md-11">
                                    <h1>
                            <?php echo $_SESSION['sucursalname'];?>
                        </h1>
                                </div>
                                <div class="col-md-1"><a class="btn btn-app" id="btnadd" data-toggle="modal" data-target="#modal-agregar"><i class="fa fa-plus"></i>Agregar</a></div>
                            </div>
                        </section>
                        <section class="content">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">LISTA DE PRODUCTOS</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table id="tablaproducto" class="table table-bordered table-striped table-condensed table-hover bootgrid-table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>MARCA</th>
                                                    <th>CATEGORIA</th>
                                                    <th>MODELO</th>
                                                    <th>PRECIO VENTA MAYOR</th>
                                                    <th>PRECIO VENTA MENOR</th>
                                                    <th>PROVEEDOR</th>
                                                    <th>OPCIONES</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $sql = "SELECT * FROM producto INNER JOIN sucursal ON(producto.sucursal = sucursal.razon_social) INNER JOIN categoria ON(producto.categoriaid = categoria.idcategoria)";
                                            $result = mysqli_query($conn,$sql);
                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                    $id = $row['idproducto'];
                                                    echo "<tr id='$id'>";
                                                    echo "<td>".$id."</td>";
                                                    echo "<td data-target='marca'>".$row['marca']."</td>";
                                                    echo "<td data-target='categoria' value='".$row['idcategoria']."'>".$row['nombre_categoria']." ".$row['tipo']."</td>";
                                                    echo "<td data-target='modelo'>".$row['modelo']."</td>";
                                                    echo "<td data-target='preciomayor' class='beforebs'>".$english_format_number = number_format($row['preciomayor'],2)."</td>";
                                                    echo "<td data-target='preciodetalle' class='beforebs'>".$english_format_number = number_format($row['preciodetalle'],2)."</td>";
                                                    echo "<td data-target='proveedor'>".$row['proveedor']."</td>";
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
                                                    <th>MARCA</th>
                                                    <th>CATEGORIA</th>
                                                    <th>MODELO</th>
                                                    <th>PRECIO VENTA MAYOR</th>
                                                    <th>PRECIO VENTA MENOR</th>
                                                    <th>PROVEEDOR</th>
                                                    <th>OPCIONES</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- modal agregar -->
                            <div class="modal fade" id="modal-agregar">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="includes/inserts/addtotable.php?agregarproducto" method="POST">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">AGREGAR PRODUCTO NUEVO</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="selectsucursal">Sucursal:</label>
                                                    <br>
                                                    <input type="text" class="form-control" id="selectsucursal" name="selectsucursal" style="width: 70%" value="<?php echo $_SESSION['sucursalname'];?>" disabled>
                                                    <br>
                                                    <label for="selectproveedor">Proveedor:</label>
                                                    <br>
                                                    <select class="form-control select2" id="selectproveedor" name="selectproveedor" style="width: 70%;" required>
                                                        <?php $sql = "SELECT * FROM proveedor";
                                                        $result = mysqli_query($conn,$sql);
                                                        if ($result->num_rows > 0) {
                                                            // output data of each row
                                                            while($row = $result->fetch_assoc()) {
                                                                echo "<option>".$row['representante']."</option>";
                                                            }
                                                            } else {
                                                                echo "0 resultados";
                                                            }
                                                    ?>
                                                    </select>
                                                    <br>
                                                    <br>
                                                    <label for="selectmarca">Marca:</label>
                                                    <br>
                                                    <select class="form-control select2" id="selectmarca" name="selectmarca" style="width: 70%;" required>
                                                        <?php $sql = "SELECT * FROM marca";
                                                        $result = mysqli_query($conn,$sql);
                                                        if ($result->num_rows > 0) {
                                                            // output data of each row
                                                            while($row = $result->fetch_assoc()) {
                                                                echo "<option>".$row['nombre_marca']."</option>";
                                                            }
                                                            } else {
                                                                echo "0 resultados";
                                                            }
                                                    ?>
                                                    </select>
                                                    <br>
                                                    <br>

                                                    <label for="selectcategoria">Categoria:</label>
                                                    <br>
                                                    <select class="form-control select2" id="selectcategoria" name="selectcategoria" style="width: 70%;" required>
                                                        <?php $sql = "SELECT * FROM categoria";
                                                        $result = mysqli_query($conn,$sql);
                                                        if ($result->num_rows > 0) {
                                                            // output data of each row
                                                            while($row = $result->fetch_assoc()) {
                                                                echo "<option value='".$row['idcategoria']."'>".$row['nombre_categoria']." ".$row['tipo']."</option>";
                                                            }
                                                            } else {
                                                                echo "0 resultados";
                                                            }
                                                    ?>
                                                    </select>
                                                    <br>
                                                    <br>

                                                    <label for="modeloinput">Modelo:</label>
                                                    <input type="text" class="form-control" id="modeloinput" name="modeloinput" style="width: 70%" maxlength="45" required>
                                                    <br>

                                                    <label for="costounitarioinput">Costo de Compra:</label><span style="font-variant: small-caps"> (en bolivianos)</span>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fas fa-dollar-sign"></i>
                                                        </div>
                                                        <input type="Number" min="0" step="0.10" class="form-control" id="costounitarioinput" name="costounitarioinput" maxlength="15" style="width: 35%">
                                                    </div>
                                                    <br>

                                                    <label for="preciovminput">Precio de Venta por Mayor:</label><span style="font-variant: small-caps"> (en bolivianos)</span>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fas fa-dollar-sign"></i>
                                                        </div>
                                                        <input type="Number" min="0" step="0.10" class="form-control" id="preciovminput" name="preciovminput" maxlength="15" style="width: 35%">
                                                    </div>

                                                    <br>

                                                    <label for="preciovdinput">Precio de Venta por Menor:</label><span style="font-variant: small-caps"> (en bolivianos)</span>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fas fa-dollar-sign"></i>
                                                        </div>
                                                        <input type="Number" min="0" step="0.10" class="form-control" id="preciovdinput" name="preciovdinput" maxlength="15" style="width: 35%">
                                                    </div>
                                                    <br>

                                                    <label for="descripcioninput">Descripcion:</label>
                                                    <textarea class="form-control" rows="5" id="descripcioninput" name="descripcioninput"></textarea>
                                                    <br>
                                                </div>
                                            </div>
                                            <div class=" modal-footer ">
                                                <button type="button " class="btn btn-default pull-left bg-red" data-dismiss="modal">Cancelar</button>
                                                <button type="button " class="btn btn-primary bg-green">Guardar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                            <!-- modal update -->
                            <div class="modal fade" id="modal-update">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="includes/inserts/updatetable.php?editarproducto" method="POST">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">EDITAR PRODUCTO</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <input type="hidden" name="idinput" id="idinput" style="width: 100%;">
                                                    <label for="updatesucursal">Sucursal:</label>
                                                    <br>
                                                    <input type="text" class="form-control" id="updatesucursal" name="updatesucursal" style="width: 70%" value="<?php echo $_SESSION['sucursalname'];?>" disabled>
                                                    <br>
                                                    <label for="updateproveedor">Proveedor:</label>
                                                    <br>
                                                    <select class="form-control select2" id="updateproveedor" name="updateproveedor" style="width: 70%;" required>
                                                        <?php $sql = "SELECT * FROM proveedor";
                                                        $result = mysqli_query($conn,$sql);
                                                        if ($result->num_rows > 0) {
                                                            // output data of each row
                                                            while($row = $result->fetch_assoc()) {
                                                                echo "<option>".$row['representante']."</option>";
                                                            }
                                                            } else {
                                                                echo "0 resultados";
                                                            }
                                                    ?>
                                                    </select>
                                                    <br>
                                                    <br>
                                                    <label for="updatemarca">Marca:</label>
                                                    <br>
                                                    <select class="form-control select2" id="updatemarca" name="updatemarca" style="width: 70%;" required>
                                                        <?php $sql = "SELECT * FROM marca";
                                                        $result = mysqli_query($conn,$sql);
                                                        if ($result->num_rows > 0) {
                                                            // output data of each row
                                                            while($row = $result->fetch_assoc()) {
                                                                echo "<option>".$row['nombre_marca']."</option>";
                                                            }
                                                            } else {
                                                                echo "0 resultados";
                                                            }
                                                    ?>
                                                    </select>
                                                    <br>
                                                    <br>

                                                    <label for="updatecat">Categoria:</label>
                                                    <br>
                                                    <select class="form-control select2" id="updatecat" name="updatecat" style="width: 70%;" required>
                                                        <?php $sql = "SELECT * FROM categoria";
                                                        $result = mysqli_query($conn,$sql);
                                                        if ($result->num_rows > 0) {
                                                            // output data of each row
                                                            while($row = $result->fetch_assoc()) {
                                                                echo "<option value='".$row['idcategoria']."'>".$row['nombre_categoria']." ".$row['tipo']."</option>";
                                                            }
                                                            } else {
                                                                echo "0 resultados";
                                                            }
                                                    ?>
                                                    </select>
                                                    <br>
                                                    <br>

                                                    <label for="updatemodelo">Modelo:</label>
                                                    <input type="text" class="form-control" id="updatemodelo" name="updatemodelo" style="width: 70%" maxlength="45" required>
                                                    <br>

                                                    <label for="updatecosto">Costo de Compra:</label><span style="font-variant: small-caps"> (en bolivianos)</span>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fas fa-dollar-sign"></i>
                                                        </div>
                                                        <input type="Number" min="0" step="0.10" class="form-control" id="updatecosto" name="updatecosto" maxlength="15" style="width: 35%" required>
                                                    </div>
                                                    <br>

                                                    <label for="updateventamayor">Precio de Venta por Mayor:</label><span style="font-variant: small-caps"> (en bolivianos)</span>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fas fa-dollar-sign"></i>
                                                        </div>
                                                        <input type="Number" min="0" step="0.10" class="form-control" id="updateventamayor" name="updateventamayor" maxlength="15" style="width: 35%">
                                                    </div>
                                                    <br>

                                                    <label for="updatepreciodet">Precio de Venta por Menor:</label><span style="font-variant: small-caps"> (en bolivianos)</span>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fas fa-dollar-sign"></i>
                                                        </div>
                                                        <input type="Number" min="0" step="0.10" class="form-control" id="updatepreciodet" name="updatepreciodet" maxlength="15" style="width: 35%">
                                                    </div>
                                                    <br>

                                                    <label for=" updatedescripcion ">Descripcion:</label>
                                                    <textarea class="form-control " rows="5 " id="updatedescripcion " name="updatedescripcion "></textarea>
                                                    <br>
                                                </div>
                                            </div>
                                            <div class=" modal-footer ">
                                                <button type="button " class="btn btn-default pull-left bg-red " data-dismiss="modal ">Cancelar</button>
                                                <button type="button " class="btn btn-primary bg-green ">Guardar</button>
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
                    <?php include 'includes/footer.php';?>
                        <!-- /.footer -->
        </div>
        <!-- ./wrapper -->
        <script>
            $(document).ready(function() {
                //Datatables (search,paging,select2,etc)
                $('.select2').select2({
                    placeholder: "Selecciona una categoria "
                });
                //DATATABLES
                $('#tablaproducto').DataTable({
                    dom: 'Bfrtip',
                    "order": [
                        [1, "asc"]
                    ],
                    buttons: [{
                        extend: 'print',
                        text: '<i class="fas fa-print "></i> Imprimir',
                        title: 'Lista de Productos',
                        messageTop: 'AccessCell',
                        exportOptions: {
                            columns: ':visible'
                        }
                    }, {
                        extend: 'pdf',
                        text: '<i class="far fa-file-pdf "></i> Descarga PDF',
                        title: 'AccessCell Productos',
                        exportOptions: {
                            columns: ':visible'
                        }
                    }, {
                        extend: 'excel',
                        text: '<i class="far fa-file-excel "></i> Descarga Excel',
                        title: 'AccessCell Productos',
                        exportOptions: {
                            columns: ':visible'
                        }
                    }, {
                        extend: 'colvis',
                        text: '<i class="fas fa-columns "></i><b> Columnas Visibles</b>',
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

                //Btn Borrar
                $(document).on('click', '.btnborrar', function() {
                    var id = this.id;
                    swal({
                            title: "Estas Seguro? ",
                            text: "(PRIMERO BORRAR EL PRODUCTO DEL INVENTARIO)",
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
                                    url: 'includes/inserts/deletefromtable.php?borrarproducto=' + id,
                                    success: function() {
                                        console.log('Success!', id);
                                    },
                                    error: function(e) {
                                        console.log('Error!', e);
                                    }
                                })
                                swal({
                                    title: "Poof!",
                                    text: "Se elimino el Producto",
                                    icon: "success",
                                });
                                setTimeout(function() {
                                    window.location.reload();
                                }, 1200);
                            } else {
                                swal("¡Tu Producto está seguro! ", " ");
                            }
                        })
                });

                //Btn Editar
                $(document).on('click', '.btneditar', function() {
                    var id = $(this).data('id');
                    var marca = $('#' + id).children('td[data-target=marca]').text();
                    var categoria = $('#' + id).children('td[data-target=categoria]').attr('value');
                    var modelo = $('#' + id).children('td[data-target=modelo]').text();
                    var costodecompra = $('#' + id).children('td[data-target=costodecompra]').text();
                    var preciomayor = $('#' + id).children('td[data-target=preciomayor]').text();
                    var preciodetalle = $('#' + id).children('td[data-target=preciodetalle]').text();
                    var descripcion = $('#' + id).children('td[data-target=descripcion]').text();
                    var proveedor = $('#' + id).children('td[data-target=proveedor]').text();

                    $('#idinput').val(id);
                    $('#updatemarca').val(marca).trigger('change');
                    $('#updatecat').val(categoria).trigger('change');
                    $('#updatemodelo').val(modelo);
                    $('#updatecosto').val(costodecompra);
                    $('#updateventamayor').val(preciomayor);
                    $('#updatepreciodet').val(preciodetalle);
                    $('#updatedescripcion').val(descripcion);
                    $('#updateproveedor').val(proveedor).trigger('change');
                    $('#modal-update').modal('toggle');
                });
            })

        </script>
    </body>

    </html>
