<!DOCTYPE html>
<html lang="es">

<head>
    <title>SUCURSALES</title>
    <?php include_once('includes/head.php');?>
</head>

<body class="hold-transition skin-primary">
    <div>
        <!-- header -->
        <?php include 'includes/admin-header.php';
            $resultsucursales = $conn->query("SELECT * FROM sucursal WHERE razon_social= 'ADMINISTRACION'");
        ?>
        <!-- /.header -->

        <!-- Content Wrapper. Contains page content -->
        <div class="container">
            <section class="content-header">
                <h1 class="center">LISTA DE SUCURSALES</h1>
            </section>
            <!-- Main content -->
            <section class="content container-fluid">
                <div class="col-md-12">
                    <div class="box box-widget widget-user">
                        <?php if ($resultsucursales->num_rows >= 1) {
                            // output data of each row
                            while($row = $resultsucursales->fetch_assoc()) {
                                echo "<a href='admin-dashboard.php?ID={$row['idsucursal']}'>";
                                echo "<div class='widget-user-header bg-primary-sucursal'>";
                                    echo "<h1 class='widget-user-username'>".$row["razon_social"]."</h1><br>";
                                    echo "<h5 class='widget-user-desc'>".$row["direccion"]."</h5>";
                                echo "</div><br>";
                                echo "</a>";
                            }
                            } else {
                                echo "0 resultados";
                            }
                        ?>
                    </div>
                </div>
            </section>
            <!-- /.content -->
            <section class="content container-fluid">
            </section>
        </div>
        <!-- /.content-wrapper -->

        <!-- footer -->
        <?php include 'includes/admin-footer.php';?>
        <!-- /.footer -->
    </div>
    <!-- ./wrapper -->
</body>

</html>
