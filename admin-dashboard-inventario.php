<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>INVENTARIO</title>
    <?php include_once('includes/head.php');?>
</head>

<body class="hold-transition skin-primary sidebar-mini">
    <div class="wrapper">
        <!-- header -->
        <?php $page='INVENTARIO'; include 'includes/admin-header.php';?>
        <?php include 'includes/admin-sidebar.php';?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="row">
                    <div class="col-md-11">
                        <h1>
                            <?php echo $_SESSION['sucursalname'];?> <i class="fa fa-archive"></i>
                        </h1>
                    </div>
                    <div class="col-md-1"><a class="btn btn-app" id="btnadd" data-toggle="modal" data-target="#modal-agregar"><i class="fa fa-plus"></i>Agregar</a></div>
                </div>
            </section>
            <section class="content container-fluid">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">LISTA DEL INVENTARIO</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="tablainventario" class="table table-bordered table-striped table-condensed table-hover bootgrid-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>PRODUCTO</th>
                                        <th>SUCURSAL</th>
                                        <th>PROVEEDOR</th>
                                        <th>CANTIDAD</th>
                                        <th>PRECIO DE COSTO</th>
                                        <th>VENTA POR MAYOR</th>
                                        <th>VENTA POR MENOR</th>
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
                                                    $ventamayor = $row['preciomayor'];
                                                    $ventamenor = $row['preciodetalle'];
                                                    echo "<tr id='$id'>";
                                                    echo "<td data-target='id'>".$id."</td>";
                                                    echo "<td data-target='modelo' data-value='".$row['idproducto']."'>".$row['marca']." - ".$row['nombre_categoria']." -  ".$row['tipo']." - ".$row['modelo']."</td>";
                                                    echo "<td data-target='razon_social'>".$row['razon_social']."</td>";
                                                    echo "<td data-target='proveedor'>".$row['proveedor']."</td>";
                                                    echo "<td data-target='stock' class='afterund'>".$cantidad."</td>";
                                                    echo "<td data-target='preciofisico' class='beforebs'>".$english_format_number = number_format(($cantidad*$preciofisico),2)."</td>";
                                                    echo "<td data-target='ventamayor' class='beforebs'>".$english_format_number = number_format(($cantidad*$ventamayor),2)."</td>";
                                                    echo "<td data-target='ventamenor' class='beforebs'>".$english_format_number = number_format(($cantidad*$ventamenor),2)."</td>";
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
                                        <th>PROVEEDOR</th>
                                        <th>CANTIDAD</th>
                                        <th>PRECIO DE COSTO</th>
                                        <th>VENTA POR MAYOR</th>
                                        <th>VENTA POR MENOR</th>
                                        <th>OPCIONES</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
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
                                                                echo "<option value='".$row['idproducto']."'>".$row['marca']." - ".$row['nombre_categoria']." - ".$row['tipo']." - ".$row['modelo']." | ".$row['razon_social']." | ".$row['proveedor']."</option>";
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
            </section>
        </div>

        <?php include 'includes/admin-footer.php';?>
    </div>
    <!-- ./wrapper -->
    <script>
        $(document).ready(function() {
            //Datatables (search,paging,select2,etc)
            $('.select2').select2({
                placeholder: "Selecciona una categoria"
            });
            //DATATABLES
            $('#tablainventario').DataTable({
                dom: 'Bfrtip',
                "order": [
                    [1, "asc"]
                ],
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
            });

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
            });

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
            });
        })

    </script>
</body>

</html>
