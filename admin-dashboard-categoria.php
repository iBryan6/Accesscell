<!DOCTYPE html>
<html>

<head>
    <title>CATEGORIAS</title>
    <?php include_once('includes/head.php');?>
</head>

<body class="hold-transition skin-primary sidebar-mini">
    <div class="wrapper">
        <!-- header -->
        <?php $page='LISTAS'; include 'includes/admin-header.php';?>
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
                        <h3 class="box-title">LISTA DE CATEGORIAS</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="tablecategorias" class="table table-bordered table-striped table-condensed table-hover bootgrid-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>CATEGORIA</th>
                                    <th>TIPO</th>
                                    <th>OPCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $sql = "SELECT * FROM categoria";
                                            $result = mysqli_query($conn,$sql);
                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                    $id = $row['idcategoria'];
                                                    echo "<tr id='$id'>";
                                                    echo "<td>".$id."</td>";
                                                    echo "<td data-target='nombre_categoria'>".$row['nombre_categoria']."</td>";
                                                    echo "<td data-target='nombre_tipo'>".$row['tipo']."</td>";
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
                                    <th>CATEGORIA</th>
                                    <th>TIPO</th>
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
                            <form action="includes/inserts/addtotable.php?agregarcategoria" method="POST">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Agregar Categoria</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Categoria Nueva</label>
                                        <input type="text" class="form-control" name="nombrecategoria" placeholder="Celulares - Carcasas - Vidrios Templados" maxlength="45" required autofocus>
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
                            <form action="includes/inserts/updatetable.php?editarcategoria" method="POST">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">EDITAR CATEGORIA</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="hidden" name="idinput" id="idinput" style="width: 100%;">
                                        <label for="categoriainput">Categoria:</label>
                                        <input type="text" class="form-control" name="categoriainput" id="categoriainput" style="width: 100%" maxlength="45" required autofocus>
                                        <br>
                                        <br>
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
            //Datatables (search,paging,etc)
            $('#tablecategorias').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'print',
                    text: '<i class="fas fa-print"></i> Imprimir',
                    title: 'Lista de Categorias',
                    messageTop: 'AccessCell',
                    exportOptions: {
                        columns: ':visible'
                    }
                }, {
                    extend: 'pdf',
                    text: '<i class="far fa-file-pdf"></i> Descarga PDF',
                    title: 'Acesscell Categorias',
                    exportOptions: {
                        columns: ':visible'
                    }
                }, {
                    extend: 'excel',
                    text: '<i class="far fa-file-excel"></i> Descarga Excel',
                    title: 'Acesscell Categorias',
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
                        title: "Estas Seguro?",
                        text: "Una vez que se elimine, no podrás recuperar esta categoria!",
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
                                url: 'includes/inserts/deletefromtable.php?borrarcategoria=' + id,
                                success: function() {
                                    console.log('Success!', id);
                                },
                                error: function(e) {
                                    console.log('Error!', e);
                                }
                            })
                            swal({
                                title: "Poof!",
                                text: "Se elimino la Categoria",
                                icon: "success",
                            });
                            setTimeout(function() {
                                window.location.reload();
                            }, 2000);
                        } else {
                            swal("¡Tu Categoria está segura!", "");
                        }
                    })
            })
            //Btn Editar
            $(document).on('click', '.btneditar', function() {
                var id = $(this).data('id');
                var categoria = $('#' + id).children('td[data-target=nombre_categoria]').text();

                $('#idinput').val(id);
                $('#categoriainput').val(categoria);
                $('#modal-update').modal('toggle');
            })
        })

    </script>
</body>

</html>
