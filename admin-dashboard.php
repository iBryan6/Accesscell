<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <title>ACESSCELL</title>
    <?php include_once('includes/head.php');?>
</head>

<body class="hold-transition skin-green sidebar-mini">
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
                <h1>
                    <?php echo $_SESSION['NombreSucursal'];?><small> Panel de Control</small></h1>
            </section>
            <section class="container-fluid">
                <div class="col-md-12">
                    <a class="btn btn-app btntop" id="btnsucursales" href="admin-sucursales.php"><i class="fa fa-building"></i>Todas las Sucursales</a>
                </div>
            </section>
            <!-- Main content -->
            <section class="content container-fluid">
                <div class="container">
                    <canvas id="VentasChart"></canvas>
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
        var VentasChart = document.getElementById('VentasChart').getContext('2d');
        //Global Options
        Chart.defaults.global.defaultFontSize = 15;
        Chart.defaults.global.defaultFontColor = '#000';

        var ventasgeneralchart = new Chart(VentasChart, {
            type: 'line',
            data: {
                labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio"],
                datasets: [{
                    label: 'Numero de Ventas',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1,
                    borderColor: '#777',
                    hoverBorderWidth: 3,
                    hoverBorderColor: '#000'

                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Numero de ventas por Mes',
                    fontSize: 25
                },
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

    </script>

</body>

</html>
