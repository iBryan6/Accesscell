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
                                    <form action="includes/inserts/updatetable.php?editarcuenta" method="POST" class="form-horizontal">
                                        <div class="box-body">
                                            <div class="form-group" hidden>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" id="iduser" name="iduser" value="<?php echo $row['idempleado']?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="usuarionombre" class="col-sm-2 control-label">Usuario</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="usuarionombre" name="usuarionombre" value="<?php echo $row['username']?>" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="tipo" class="col-sm-2 control-label">Tipo</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="tipo" name="tipo" value="<?php echo $row['tipo_empleado'];?>" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="dateregister" class="col-sm-2 control-label">Fecha Registro</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="dateregister" name="dateregister" value="<?php echo $_SESSION['fecha registro'];?>" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="sucursal" class="col-sm-2 control-label">Sucursal</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="sucursal" name="sucursal" value="<?php echo $row['razon_social'];?>" disabled>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label for="names" class="col-sm-2 control-label">Nombres</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="names" name="names" value="<?php echo $row['nombres'];?>" autofocus>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label for="lastnames" class="col-sm-2 control-label">Apellidos</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="lastnames" name="lastnames" value="<?php echo $row['apellidos'];?>">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label for="carnetid" class="col-sm-2 control-label">Carnet</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" id="carnetid" name="carnetid" value="<?php echo $row['carnet'];?>">
                                                </div>
                                            </div>
                                            <br>
                                            <hr>
                                            <h3>Cambiar Contraseña</h3>
                                            <br>
                                            <div class="form-group">
                                                <label for="password" class="col-sm-3 control-label">Contraseña Actual</label>
                                                <div class="col-sm-9">
                                                    <input type="password" class="form-control" id="password" name="password" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="newpassword" class="col-sm-3 control-label">Contraseña Nueva</label>
                                                <div class="col-sm-9">
                                                    <input type="password" class="form-control" id="newpassword" name="newpassword" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="confirmpassword" class="col-sm-3 control-label">Confirmar Contraseña</label>
                                                <div class="col-sm-9">
                                                    <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" disabled>
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
