<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>SUCURSALES</title>
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
                    <div class="col-md-11">
                        <h1>SUCURSALES <i class="far fa-building"></i></h1>
                    </div>
                </div>
            </section>
            <section class="content container-fluid">
                <!-- List -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Lista</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                    <tr>
                                        <th>Razon Social</th>
                                        <th>Direccion</th>
                                        <th>Telefono</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sql = "SELECT * FROM sucursal WHERE razon_social!='ADMINISTRACION'";
                                                    $result = mysqli_query($conn,$sql);
                                                    if ($result->num_rows > 0) {
                                                        // output data of each row
                                                        while($row = $result->fetch_assoc()) {
                                                            $id = $row['idsucursal'];
                                                            echo "<tr id='$id'>";
                                                            echo "<td data-target='nombre'>".$row['razon_social']."</td>";
                                                            echo "<td data-target='direccion'>".$row['direccion']."</td>";
                                                            echo "<td data-target='telefono'>".$row['telefono']."</td>";
                                                            echo "<td><a class='btn btn-md bg-green btneditar' data-role='update' data-id='$id' title='Editar' data-toggle='modal' data-target='#modal-update-$id'><i class='fa fa-edit'></i></a></td>";
                                                            echo "</tr>";
                                                        }
                                                        } else {
                                                            echo "0 resultados";
                                                        }
                                                ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <a class="btn btn-sm btn-success btn-flat pull-left" id="btnadd" data-toggle="modal" data-target="#modal-agregar">Nueva Sucursal</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- modal agregar -->
                <div class="modal fade" id="modal-agregar">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="includes/inserts/addtotable.php?agregarsucursal" method="POST">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Agregar Sucursal</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="razon-social-input">Razon Social</label>
                                        <input type="text" class="form-control" name="razon-social-input" id="razon-social-input" required autofocus>
                                        <br/>
                                        <label for="direccion-input">Direccion</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fas fa-location-arrow"></i>
                                            </div>
                                            <input type="text" class="form-control" name="direccion-input" id="direccion-input">
                                        </div>
                                        <br/>
                                        <label for="telefono-input">Telefono</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fas fa-phone"></i>
                                            </div>
                                            <input type="number" class="form-control" name="telefono-input" id="telefono-input">
                                        </div>
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
                <!-- modal update -->
                <div class="modal fade" id="modal-update">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="includes/inserts/updatetable.php?editarsucursal" method="POST">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">EDITAR SUCURSAL</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="hidden" name="idinput" id="idinput" style="width: 100%;">
                                        <label for="razon-social-update">Razon Social</label>
                                        <input type="text" class="form-control" name="razon-social-update" id="razon-social-update" required autofocus>
                                        <br/>
                                        <label for="direccion-update">Direccion</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fas fa-location-arrow"></i>
                                            </div>
                                            <input type="text" class="form-control" name="direccion-update" id="direccion-update">
                                        </div>
                                        <br/>
                                        <label for="telefono-update">Telefono</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fas fa-phone"></i>
                                            </div>
                                            <input type="number" class="form-control" name="telefono-update" id="telefono-update">
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
    <script>
        //Btn Editar
        $(document).on('click', '.btneditar', function() {
            var id = $(this).data('id');
            var nombre = $('#' + id).children('td[data-target=nombre]').text();
            var direccion = $('#' + id).children('td[data-target=direccion]').text();
            var telefono = $('#' + id).children('td[data-target=telefono]').text();

            $('#idinput').val(id);
            $('#razon-social-update').val(nombre);
            $('#direccion-update').val(direccion);
            $('#telefono-update').val(telefono);
            $('#modal-update').modal('toggle');
        });

    </script>
</body>

</html>
