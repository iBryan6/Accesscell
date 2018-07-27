<?php
session_start();
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <title>EMPLEADOS</title>
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
                                    <h1>EMPLEADOS <i class="fas fa-user"></i></h1>
                                </div>
                            </div>
                        </section>
                        <section class="content container-fluid">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Lista</h3>

                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table class="table no-margin">
                                            <thead>
                                                <tr>
                                                    <th>Tipo Empleado</th>
                                                    <th>Usuario</th>
                                                    <th>Nombres</th>
                                                    <th>Apellidos</th>
                                                    <th>Carnet</th>
                                                    <th>Sucursal</th>
                                                    <th>Fecha de Registro</th>
                                                    <th>Estado</th>
                                                    <!--                                                    <th>Opciones</th>-->
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $sql = "SELECT * FROM empleado INNER JOIN sucursal ON(sucursal.idsucursal = empleado.sucursalid)";
                                                    $result = mysqli_query($conn,$sql);
                                                    if ($result->num_rows > 0) {
                                                        // output data of each row
                                                        while($row = $result->fetch_assoc()) {
                                                            if($row['estado']==1){
                                                                $estado = "<span class='label label-info'>Activo</span>";
                                                            }
                                                            else{
                                                                $estado = "<span class='label label-warning'>Inactivo</span>";
                                                            }
                                                            $id = $row['idempleado'];
                                                            echo "<tr id='$id'>";
                                                            echo "<td data-target='tipo'>".$row['tipo_empleado']."</td>";
                                                            echo "<td data-target='user'>".$row['username']."</td>";
                                                            echo "<td data-target='nombres'>".$row['nombres']."</td>";
                                                            echo "<td data-target='apellidos'>".$row['apellidos']."</td>";
                                                            echo "<td data-target='carnet'>".$row['carnet']."</td>";
                                                            echo "<td data-target='sucursal'>".$row['razon_social']."</td>";
                                                            echo "<td data-target='fecha'>".$row['fecha_registro']."</td>";
                                                            echo "<td data-target='estado'>".$estado."</td>";
//                                                            echo "<td><a class='btn btn-md bg-green btneditar' data-role='update' data-id='$id' title='Editar' data-toggle='modal' data-target='#modal-update-$id'><i class='fa fa-edit'></i></a></td>";
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
                                    <a class="btn btn-sm btn-success btn-flat pull-left" id="btnadd" data-toggle="modal" data-target="#modal-agregar">Nuevo Empleado</a>
                                    <a class="btn btn-sm btn-danger btn-flat pull-right" id="btnadd" data-toggle="modal" data-target="">Dar de Baja</a>
                                </div>
                                <!-- /.box-footer -->
                            </div>
                        </section>
                    </div>

                    <?php include 'includes/admin-footer.php';?>
        </div>
        <script>


        </script>
    </body>

    </html>

    <?php
