<?php
session_start();
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <title>CONFIGURACION</title>
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
                                <div class="col-md-11">
                                    <h1>CONFIGURACION DE CUENTA</h1>
                                </div>
                            </div>
                        </section>
                        <section class="content container-fluid">
                            <div class="row">
                                <div class="col-md-6 col-sm-5 col-xs-12">
                                    <form class="form-horizontal">
                                        <?php
                                        $sql = "SELECT * FROM empleado INNER JOIN sucursal ON(empleado.sucursalid = sucursal.idsucursal) WHERE username='{$_SESSION['username']}'";
                                        $result = mysqli_query($conn, $sql);
                                        $row = mysqli_fetch_array($result);
                                        ?>
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <label for="Username" class="col-sm-2 control-label">Usuario</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="Username" value="<?php echo $row['username']?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tipo" class="col-sm-2 control-label">Tipo</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="tipo" value="<?php echo $row['tipo_empleado'];?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="dateregister" class="col-sm-2 control-label">Fecha Registro</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="dateregister" value="<?php echo $_SESSION['fecha registro'];?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="sucursal" class="col-sm-2 control-label">Sucursal</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="sucursal" value="<?php echo $row['razon_social'];?>" disabled>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label for="names" class="col-sm-2 control-label">Nombres</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="names" value="<?php echo $row['nombres'];?>" autofocus>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label for="lastnames" class="col-sm-2 control-label">Apellidos</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="lastnames" value="<?php echo utf8_encode($row['apellidos']);?>">
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label for="carnetid" class="col-sm-2 control-label">Carnet</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" class="form-control" id="carnetid" value="<?php echo $row['carnet'];?>">
                                                    </div>
                                                </div>
                                                <br>
                                                <hr>
                                                <h3>Cambiar Contraseña</h3>
                                                <br>
                                                <div class="form-group">
                                                    <label for="password" class="col-sm-3 control-label">Contraseña Actual</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" class="form-control" id="password">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="newpassword" class="col-sm-3 control-label">Contraseña Nueva</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" class="form-control" id="newpassword">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="confirmpassword" class="col-sm-3 control-label">Confirmar Contraseña</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" class="form-control" id="confirmpassword">
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-success pull-right">Actualizar</button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </section>
                    </div>
                    <?php include 'includes/admin-footer.php';?>
        </div>
        <script>


        </script>
    </body>

    </html>
