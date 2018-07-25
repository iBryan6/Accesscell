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
            include 'includes/header.php';
            ?>
                <?php include 'includes/sidebar.php';?>
                    <div class="content-wrapper">
                        <section class="content-header">
                            <div class="row">
                                <div class="col-md-11">
                                    <h1>
                            <?php echo $namesucursal =  $_SESSION['sucursalname'];?>
                        </h1>
                                </div>
                            </div>
                        </section>
                        <!-- Main content -->
                        <section class="content container-fluid">
                            <div class="row">
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box">
                                        <a href="dashboard-inventario">
                                            <span class="info-box-icon bg-aqua"><i class="fas fa-boxes"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">PRODUCTOS</span>
                                                <span class="info-box-number" style="font-size: 30px;">
                                                <?php
                                                $sql = "SELECT SUM(stock) as total FROM almacen INNER JOIN producto ON(producto.idproducto = almacen.idproducto) WHERE sucursal='$namesucursal'";
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
                                        <a href="dashboard-proveedor">
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
                                        <a href="configuration">
                                            <span class="info-box-icon bg-grey"><i class="fas fa-cog fa-spin"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">CONFIGURACION</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <?php include 'includes/footer.php';?>
        </div>
    </body>

    </html>
