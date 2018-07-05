<?php
session_start();
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <title>ACESSCELL</title>
        <?php include_once('includes/head.php');?>
    </head>

    <body class="hold-transition skin-primary sidebar-mini">
        <div class="wrapper">
            <!-- header -->
            <?php $page= 'PRINCIPAL';
        include 'includes/admin-header.php';
        if (isset($_GET['ID'])){
            $ID = mysqli_real_escape_string($conn, $_GET['ID']);
            $sql = "SELECT * FROM sucursal WHERE idsucursal='$ID' ";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            $_SESSION['IDsucursal'] = $row['idsucursal'];
            $_SESSION['NombreSucursal'] = $row['razon_social'];
        }
        ?>
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
                                <div class="col-md-1">
                                    <a class="btn btn-app btntop" id="btnsucursales" href="admin-sucursales.php"><i class="fa fa-building"></i>Todas las Sucursales</a>
                                </div>
                            </div>
                        </section>
                        <!-- Main content -->
                        <section class="content container-fluid">
                            <div class="row">
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box">
                                        <a href="admin-dashboard-ventas.php">
                                            <span class="info-box-icon bg-green"><i class="fas fa-shopping-cart"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">VENTAS</span>
                                                <span class="info-box-number" style="font-size: 30px;">
                                        <?php
                                        $sql = "select count(*) as total from transaccion where idTipotransaccion=2";
                                        $result = mysqli_query($conn, $sql);
                                        $row = mysqli_fetch_array($result);
                                        echo $row['total'];
                                        ?>
                                        </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <!--<div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-yellow"><i class="fas fa-users"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">CLIENTES</span>
                                        </div>
                                    </div>
                                </div>-->
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box">
                                        <a href="admin-dashboard-inventario.php">
                                            <span class="info-box-icon bg-aqua"><i class="fas fa-boxes"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">PRODUCTOS</span>
                                                <span class="info-box-number" style="font-size: 30px;">
                                        <?php
                                        $sql = "select count(*) as total from producto";
                                        $result = mysqli_query($conn, $sql);
                                        $row = mysqli_fetch_array($result);
                                        echo $row['total'];
                                        ?>
                                        </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box">
                                        <a href="admin-dashboard-compras.php">
                                            <span class="info-box-icon bg-black"><i class="fas fa-cart-plus"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">COMPRAS</span>
                                                <span class="info-box-number" style="font-size: 30px;">
                                        <?php
                                        $sql = "select count(*) as total from transaccion where idTipotransaccion=1";
                                        $result = mysqli_query($conn, $sql);
                                        $row = mysqli_fetch_array($result);
                                        echo $row['total'];
                                        ?>
                                        </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box">
                                        <a href="admin-dashboard-proveedor.php">
                                            <span class="info-box-icon bg-red"><i class="fas fa-truck"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">PROVEEDORES</span>
                                                <span class="info-box-number" style="font-size: 30px;">
                                        <?php
                                        $sql = "select count(*) as total from proveedor";
                                        $result = mysqli_query($conn, $sql);
                                        $row = mysqli_fetch_array($result);
                                        echo $row['total'];
                                        ?>
                                        </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-blue"><i class="fas fa-users-cog"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">PERSONAL</span>
                                            <span class="info-box-number" style="font-size: 30px;">
                                        <?php
                                        $sql = "select count(*) as total from empleado";
                                        $result = mysqli_query($conn, $sql);
                                        $row = mysqli_fetch_array($result);
                                        echo $row['total'];
                                        ?>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-grey"><i class="fas fa-cog fa-spin"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">CONFIGURACION</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
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


        </script>

    </body>

    </html>
