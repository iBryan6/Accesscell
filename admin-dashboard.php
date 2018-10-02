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
                            <?php echo $_SESSION['sucursalname'];?>
                        </h1>
                    </div>
                </div>
            </section>
            <!-- Main content -->
            <section class="content container-fluid">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <a href="admin-dashboard-ventas">
                                <span class="info-box-icon bg-green"><i class="fas fa-shopping-cart"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">VENTAS</span>
                                    <span class="info-box-number" style="font-size: 30px;">
                                        <?php
                                        $sql = "select count(*) as total from recibo where idTipotransaccion=2";
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
                            <a href="admin-dashboard-inventario">
                                <span class="info-box-icon bg-aqua"><i class="fas fa-box"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">STOCK DE PRODUCTOS</span>
                                    <span class="info-box-number" style="font-size: 30px;">
                                        <?php
                                                $sql = "SELECT COUNT(*) as total FROM almacen";
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
                            <a href="admin-dashboard-inventario">
                                <span class="info-box-icon bg-aqua"><i class="fas fa-boxes"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">STOCK GLOBAL</span>
                                    <span class="info-box-number" style="font-size: 30px;">
                                        <?php
                                                $sql = "SELECT SUM(stock) as total FROM almacen";
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
                            <a href="admin-dashboard-compras">
                                <span class="info-box-icon bg-black"><i class="fas fa-cart-plus"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">COMPRAS</span>
                                    <span class="info-box-number" style="font-size: 30px;">
                                        <?php
                                        $sql = "select count(*) as total from recibo where idTipotransaccion=1";
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
                            <a href="admin-dashboard-proveedor">
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
                            <a href="admin-empleados">
                                <span class="info-box-icon bg-blue"><i class="fas fa-users-cog"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">EMPLEADOS</span>
                                    <span class="info-box-number" style="font-size: 30px;">
                                        <?php
                                        $sql = "select count(*) as total from empleado";
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
                            <a href="admin-configuration">
                                <span class="info-box-icon bg-grey"><i class="fas fa-cog fa-spin"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">CONFIGURACION</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <!--<section class="content-header">
                            <div class="row">
                                <div class="col-md-11">
                                    <h2>FLUJO</h2>
                                </div>
                            </div>
                        </section>
                        <section class="content container-fluid">
                            <div class="row">
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-orange"><i class="fas fa-dollar-sign"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Costo total del Stock</span>
                                            <span class="info-box-number beforebs" style="font-size: 30px;">
                                                <?php
                                                $result = mysqli_query($conn, "SELECT SUM(costodecompra*stock) as total FROM almacen INNER JOIN producto ON (almacen.idproducto = producto.idproducto)");
                                                if ($result->num_rows > 0) {
                                                    while($row = $result->fetch_assoc()) {
                                                        echo $english_format_number = number_format($row['total'],2);
                                                    }
                                                    } else {
                                                        echo "0";
                                                    }
                                                ?>
                                                </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-purple"><i class="fas fa-boxes"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Stock Valorado por Mayor</span>
                                            <span class="info-box-number beforebs" style="font-size: 30px;">
                                                <?php
                                                $result = mysqli_query($conn, "SELECT SUM(preciomayor*stock) as total FROM almacen INNER JOIN producto ON (almacen.idproducto = producto.idproducto)");
                                                if ($result->num_rows > 0) {
                                                    while($row = $result->fetch_assoc()) {
                                                        echo $english_format_number = number_format($row['total'],2);
                                                    }
                                                    } else {
                                                        echo "0";
                                                    }
                                                ?>
                                                </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-teal"><i class="fas fa-box"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Stock Valorado por Menor</span>
                                            <span class="info-box-number beforebs" style="font-size: 30px;">
                                                <?php
                                                $result = mysqli_query($conn, "SELECT SUM(preciodetalle*stock) as total FROM almacen INNER JOIN producto ON (almacen.idproducto = producto.idproducto)");
                                                if ($result->num_rows > 0) {
                                                    while($row = $result->fetch_assoc()) {
                                                        echo $english_format_number = number_format($row['total'],2);
                                                    }
                                                    } else {
                                                        echo "0";
                                                    }
                                                ?>
                                                </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>-->
            <!---->

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
