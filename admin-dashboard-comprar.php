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
                <div class="box">
                    <div class="col-md-10">
                        <h1>NUEVA COMPRA</h1>
                    </div>
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


                    <!-- LISTA DE PRODUCTOS -->
<!--                    <div>
                        <hr style="width: 100%; color: black; height: 1px; background-color:black;" />
                        <div class="col-md-10"><h3>Lista de Productos</h3></div>
                        <div class="col-md-1"><a class="btn btn-success" id="btnadd" data-toggle="modal" data-target="#finalizar_compra"><i class="fas fa-money-check-alt"></i> Finalizar Compra <i class="fas fa-money-check-alt"></i></a></div>
                        <div class="box-body col-md-12" >
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
                                            <th>PROVEEDOR</th>
                                            <th>OPCIONES</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>-->
                </div>
            </section>

            <section class="content container-fluid">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><b>Lista de Productos</b></h3>
                            <div class="box-tools pull-right">
                              <!-- Collapse Button -->
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
                                            <th>PROVEEDOR</th>
                                            <th>OPCIONES</th>
                                    </tr>
                                </thead>
                                <tbody  id="listproductos">
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
                                            <th>OPCIONES</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include 'includes/admin-footer.php';?>
    </div>
    <script>
        $(document).ready(function() {
            localStorage.clear();


            //BOX BEFORE CLOSING PAGE
            function myfun(){
                 console.log('SI TE SALES SE BORRARA SU BOLETA');
            }
            window.onbeforeunload = function(){
              myfun();
              return "Quieres salirte de la pagina? Se borrara todo tu trabajo.";
            };

            //SELECT 2 ELEMENTS
            $('.select2').select2({});

            //DATATABLES
            var table = $('#tablalistproductos').DataTable({
                order: [
                    [0, "desc"]
                ],
                "scrollY": "500px",
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
            $('#agregaralista').click(function(){
                var producto = $('#selectproducto').val();
                var cantidad = $('#inputcantidad').val();
                var precio = $('#inputprecio').val();
                var storage = localStorage.getItem('Items');
                var list = JSON.parse(localStorage.getItem('Items'));
                var itemlist =[];

                if(producto == null || producto == "" || cantidad =='' || cantidad == 0 || precio =='' || precio == 0){
                    alert("Llene todos los campos con datos validos");
                }

                else{
                    if (storage==null){
                        itemlist = [{producto,cantidad,precio}];
                        localStorage.setItem('Items', JSON.stringify(itemlist));
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
                    }
                    else{
                        var Items = localStorage.getItem('Items');
                        if(Items.includes(producto)){
                            alert("Ya existe este producto en la lista");
                        }
                        else{
                            list.push({producto,cantidad,precio});
                                localStorage.setItem('Items', JSON.stringify(list));
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
                        }

                    }
                }
            });

            //BTN BORRAR
            $(document).on('click', '.btnborrar', function() {
                    var id = this.id;
                    var itemlist = JSON.parse(localStorage.getItem('Items'));
                    swal({
                            title: "Estas Seguro?",
                            text: "Una vez eliminado se debera ingresar el producto de nuevo a la lista!",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                $('tr#'+id).remove();
                                    var Items = localStorage.getItem('Items');
                                    if(Items.includes(id)){
                                        var position = itemlist.findIndex(i => i.producto === id);
                                        itemlist.splice(position, 1);
                                        localStorage.setItem('Items', JSON.stringify(itemlist));
                                        swal({
                                              icon: "success",
                                              title: 'Borrado!',
                                              text: 'Se borro el producto',
                                              buttons: false,
                                              timer: 1500
                                        });
                                    }
                                    else{
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
        });

    </script>
</body>

</html>
