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
        <?php $page='TRANSACCION'; include 'includes/admin-header.php';?>
        <?php include 'includes/admin-sidebar.php';?>
        <div class="content-wrapper">

            <section class="content-header">
                <div class="row">
                    <div class="col-md-10">
                        <h1>NUEVA COMPRA <i class="fas fa-shopping-cart"></i></h1>
                    </div>
                </div>
            </section>

            <section class="content container-fluid">
                <div class="row">
                    <!-- DATOS DEL RECIBO -->
                    <div class="col-md-10 col-sm-12 col-xs-12">
                        <h3>Datos del Recibo</h3>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <label for="facturainput">Numero:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fas fa-receipt"></i>
                                </div>
                                <input type="number" class="form-control" id="facturainput" name="facturainput" maxlength="15" autofocus>
                            </div>
                        </div>

                        <div class="col-md-8 col-sm-12 col-xs-12">
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
                            <select class="form-control select2" id="selectproveedor" disabled>
                            </select>
                            <br>
                            <br>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <label for="selectcategoria">Categoria</label>
                            <select class="form-control select2" id="selectcategoria" disabled>
                            </select>
                        </div>
                        <div class="col-md-9 col-sm-6 col-xs-12">
                            <label for="selectproducto">Producto</label>
                            <select class="form-control select2" id="selectproducto" disabled>
                            </select>
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12"><br>
                            <label for="inputcantidad">Cantidad</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fas fa-boxes"></i>
                                </div>
                                <input type="number" min="1" step="1" class="form-control" id="inputcantidad" required>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12"><br>
                            <label for="inputprecio">Precio Unitario</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                                <input type="number" min="1" step="0.10" class="form-control" id="inputprecio" required>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-6 col-xs-12"><br>
                            <button type="submit" id="agregaralista" class="btn btn-info">Agregar a la Lista</button>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content container-fluid">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><b>Lista de Productos</b></h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="tablalistproductos" class="table table-bordered table-striped table-condensed table-hover bootgrid-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>CATEGORIAS</th>
                                        <th>MARCA</th>
                                        <th>MODELO</th>
                                        <th>CANTIDAD</th>
                                        <th>COSTO UNITARIO</th>
                                        <th>COSTO TOTAL</th>
                                        <th>SUCURSAL</th>
                                        <th>PROVEEDOR</th>
                                        <th>OPCIONES</th>
                                    </tr>
                                </thead>
                                <tbody id="listproductos">
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
                                        <th>SUCURSAL</th>
                                        <th>PROVEEDOR</th>
                                        <th>OPCIONES</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="pull-left col-md-3 col-sm-3 col-xs-12">
                            <br><label for="totalPriceShow" class="countList">Total: 0</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fas fa-wallet"></i>
                                </div>
                                <input class="form-control totalPriceShow" placeholder="BOB 0.00" disabled>
                            </div>
                        </div>
                        <div class="pull-right col-md-2 col-sm-2 col-xs-12"><br><br>
                            <a class="btn btn-block btn-success" id="btnfinalizar">Finalizar Compra</a>
                        </div>

                    </div>
                </div>
            </section>

            <!-- modal agregar -->
            <div class="modal fade" id="pagoFinalModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="includes/transacciones/compralist.php?compraFinal" method="POST">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Finalizar Compra</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group row">
                                    <!--Numero de Recibo-->
                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        <label for="fechaText">Fecha</label>
                                        <p id="fechaText"></p>
                                    </div>
                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        <label for="reciboNumText">Numero de Recibo</label>
                                        <p id="reciboNumText"></p>
                                        <input type="hidden" class="form-control" id="reciboNumFinal" name="reciboNumFinal">
                                    </div>
                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        <label for="usuarioText">Usuario</label>
                                        <p id="usuarioText"></p>
                                        <input type="hidden" class="form-control" id="usuarioFinal" name="usuarioFinal"><br>
                                    </div>
                                    <!--Productos-->
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="table-responsive box-body no-padding">
                                            <table id="productosFinalTable" class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Producto</th>
                                                        <th>Cantidad</th>
                                                        <th>Precio</th>
                                                        <th>Precio Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="productosDiv">
                                                </tbody>
                                            </table>
                                        </div><br>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="pull-right" style="background-color:#F0F0F0; padding:10px;">
                                                <p class="countList">Total: 0</p>
                                                <p class="totalPriceShow">BOB 0.00</p>
                                            </div>
                                            <input type="hidden" class="form-control" id="totalPrice" name="totalPrice">
                                            <br>
                                        </div>
                                    </div>
                                    <!--Detalle-->
                                    <div class="col-md-12 col-sm-12 col-xs-12" id="detalleTextFinalDiv">
                                        <label for="detalleTextFinal">Detalle</label>
                                        <p id="detalleTextFinal">-</p>
                                        <input type="hidden" class="form-control" id="detalleFinal" name="detalleFinal">
                                    </div>
                                    <div id="hiddenItems">

                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left bg-red" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary bg-green">Comprar</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </div>
        <?php include 'includes/admin-footer.php';?>
    </div>
    <script>
        $(document).ready(function() {
            localStorage.clear();
            localStorage.setItem("sumaTotal", 0);

            //GET LOCALSTORAGE ARRAY
            function getLS() {
                var Items = JSON.parse(localStorage.getItem('Items'));
                for (var row = 0; row < Items.length; row++) {
                    var prod = Items[row].producto;
                    var cant = Items[row].cantidad;
                    var prec = Items[row].precio;
                    $('#hiddenItems').append("<input type='hidden' name='productoList[]' value='"+prod+"'>");
                    $('#hiddenItems').append("<input type='hidden' name='cantidadList[]' value='"+cant+"'>");
                    $('#hiddenItems').append("<input type='hidden' name='precioList[]' value='"+prec+"'>");
                }
            }

            //SELECT 2 ELEMENTS
            $('.select2').select2({});

            //LOAD TOTAL TO INPUT
            function loadTotal() {
                var show = localStorage.getItem('sumaTotal');
                var countList = localStorage.getItem('Items');
                $('.totalPriceShow').val(parseInt(show).toLocaleString('en-US', {
                    style: 'currency',
                    currency: 'BOB'
                }));
                $('.totalPriceShow').text(parseInt(show).toLocaleString('en-US', {
                    style: 'currency',
                    currency: 'BOB'
                }));

                return show;
                $('.countList').text("Total: " + JSON.parse(countList).length);
            };

            //BOX BEFORE CLOSING PAGE
            window.onbeforeunload = function() {
                return "Quieres salirte de la pagina? Se borrara todo tu trabajo.";
            };

            //DATATABLES
            var table = $('#tablalistproductos').DataTable({
                order: [
                    [0, "desc"]
                ],
                "scrollY": "400px",
                "scrollCollapse": true,
                "paging": false,
                searching: false,
                ordering: false,
                info: false,
                select: true,
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
            });

            //SUCURSAL A PROVEEDOR
            $('#selectsucursal').change(function() {
                var sucursal = $(this).val();
                $('#selectproveedor').empty();
                $('#selectcategoria').empty();
                $('#selectproducto').empty();
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
                var sucursalcategoria = $('#selectsucursal').val();
                $('#selectcategoria').empty();
                $('#selectproducto').empty();
                $('#selectcategoria').removeAttr('disabled');
                $.ajax({
                    url: "includes/transacciones/get.php",
                    method: "POST",
                    data: {
                        proveedor: proveedor,
                        sucursalcategoria: sucursalcategoria
                    },
                    success: function(data) {
                        $('#selectcategoria').html(data);
                    }
                });
            });

            //CATEGORIA A PRODUCTO
            $('#selectcategoria').change(function() {
                var sucursalproducto = $('#selectsucursal').val();
                var proveedorproducto = $('#selectproveedor').val();
                var categoria = $(this).val();
                $('#selectproducto').empty();
                $('#selectproducto').removeAttr('disabled');
                $.ajax({
                    url: "includes/transacciones/get.php",
                    method: "POST",
                    data: {
                        sucursalproducto: sucursalproducto,
                        proveedorproducto: proveedorproducto,
                        categoria: categoria
                    },
                    success: function(data) {
                        $('#selectproducto').html(data);
                    }
                });
            });

            //SUBMIT PRODUCT TO LIST
            $('#agregaralista').click(function() {
                var producto = $('#selectproducto').val();
                var cantidad = $('#inputcantidad').val();
                var precio = $('#inputprecio').val();
                var storage = localStorage.getItem('Items');
                var list = JSON.parse(localStorage.getItem('Items'));
                var itemlist = [];
                var totalAntiguo = localStorage.getItem('sumaTotal');

                if (producto == null || producto == "" || cantidad == '' || cantidad == 0 || precio == '' || precio == 0) {
                    alert("Llene todos los campos con datos validos");
                } else {
                    if (storage == null) {
                        itemlist = [{
                            producto,
                            cantidad,
                            precio
                        }];
                        localStorage.setItem('Items', JSON.stringify(itemlist));
                        var sum = parseFloat(precio) * parseInt(cantidad);
                        var sumaTotal = (parseInt(totalAntiguo) + sum);
                        localStorage.setItem('sumaTotal', sumaTotal);
                        $.ajax({
                            url: "includes/transacciones/compralist.php",
                            method: "POST",
                            data: {
                                itemlist
                            },
                            success: function(data) {
                                $('#listproductos').html(data);
                            }
                        });
                        loadTotal();
                    } else {
                        var Items = localStorage.getItem('Items');
                        if (Items.includes(producto)) {
                            alert("Ya existe este producto en la lista");
                        } else {
                            list.push({
                                producto,
                                cantidad,
                                precio
                            });
                            localStorage.setItem('Items', JSON.stringify(list));
                            var sum = parseFloat(precio) * parseInt(cantidad);
                            var sumaTotal = (parseInt(totalAntiguo) + sum);
                            localStorage.setItem('sumaTotal', sumaTotal);
                            $.ajax({
                                url: "includes/transacciones/compralist.php",
                                method: "POST",
                                data: {
                                    list
                                },
                                success: function(data) {
                                    $('#listproductos').html(data);
                                }
                            });
                            loadTotal();
                        }

                    }
                }
            });

            //BTN BORRAR
            $(document).on('click', '.btnborrar', function() {
                var id = this.id;
                var itemlist = JSON.parse(localStorage.getItem('Items'));
                var totalAntiguo = localStorage.getItem('sumaTotal');
                swal({
                        title: "Estas Seguro?",
                        text: "Una vez eliminado se debera ingresar el producto de nuevo a la lista!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $('tr#' + id).remove();
                            var Items = localStorage.getItem('Items');
                            if (Items.includes(id)) {
                                var position = itemlist.findIndex(i => i.producto === id);
                                var precio = itemlist[position].precio;
                                var cantidad = itemlist[position].cantidad;
                                var sum = precio * cantidad;
                                var sumaTotal = (parseFloat(totalAntiguo) - sum);
                                localStorage.setItem('sumaTotal', sumaTotal);
                                itemlist.splice(position, 1);
                                localStorage.setItem('Items', JSON.stringify(itemlist));
                                loadTotal();
                                swal({
                                    icon: "success",
                                    title: 'Borrado!',
                                    text: 'Se borro el producto',
                                    buttons: false,
                                    timer: 1500
                                });
                            } else {
                                swal({
                                    icon: "warning",
                                    title: 'Error al borrar',
                                    buttons: false,
                                    timer: 1500
                                });
                            }

                        } else {
                            swal("¡No Borraste nada!", "");
                        }
                    })
            });

            //OPEN MODAL WITH VALIDATION
            $('#btnfinalizar').click(function() {
                var numeroRecibo = $('#facturainput').val();
                var pagoSelect = $('#tipopagoselect').val();
                var detalle = $('#detalleinput').val();
                var d = new Date();
                var dateFormat = d.toDateString();

                if (numeroRecibo.length < 5 || numeroRecibo == 0) {
                    alert("Verifique que el numero de recibo sea valido");
                } else {
                    var Items = localStorage.getItem('Items');
                    if (Items === null || JSON.parse(Items).length < 1) {
                        alert("No puedes finalizar la compra sin productos en la lista!");
                    } else {

                        Items = JSON.parse(localStorage.getItem('Items'));
                        $("#pagoFinalModal").modal();
                        //Precio
                        $('#totalPrice').val(loadTotal());
                        //Fecha
                        $('#fechaText').text(dateFormat);
                        //Numero Recibo
                        $('#reciboNumText').text(numeroRecibo);
                        $('#reciboNumFinal').val(numeroRecibo);
                        //Usuario
                        $('#usuarioText').text("<?php echo $usernamesession;?>");
                        $('#usuarioFinal').val("<?php echo $usernamesession;?>");
                        //Productos
                        $("#productosDiv").empty();
                        $.ajax({
                            url: "includes/transacciones/compralist.php",
                            method: "POST",
                            data: {
                                Items
                            },
                            success: function(data) {
                                $('#productosDiv').html(data);
                            }
                        });
                        if (detalle == "" || detalle == null) {
                            $('#detalleTextFinalDiv').css("display", "none");
                        } else {
                            $('#detalleTextFinalDiv').removeAttr('style');
                            $('#detalleTextFinal').text(detalle);
                            $('#detalleFinal').val(detalle);
                        }
                        $('#arrayItems').val(getLS());
                    }
                }
            });
        });

    </script>
</body>

</html>
