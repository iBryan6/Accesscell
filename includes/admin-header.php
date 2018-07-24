<?php
require 'connect.php';
$sql = "SELECT * FROM empleado INNER JOIN sucursal ON(empleado.sucursalid = sucursal.idsucursal) WHERE username='{$_SESSION['username']}'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
?>
    <header class="main-header">
        <!-- Logo -->
        <a class="logo" href="admin-dashboard.php">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>C</span>
            <!-- logo for regular state and mobile devices -->
            <img class="img-responsive logo-lg" src="dist/img/Logo.png" alt="LOGO ACCESSCELL" width="65%">
        </a>
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a class="sidebar-toggle" data-toggle="push-menu" href="#" role="button">
                <span class="sr-only">Palanca de navegacion</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <span><?php echo $_SESSION['username'];?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <p>
                                    <?php
                                echo "<b>NOMBRES: </b>".$row['nombres']."<br>";
                                echo "<b>APELLIDOS: </b>".$row['apellidos']."<br>";
                                echo "<b>TELEFONO: </b>".$_SESSION['telefonousuario']."<br>";
                                echo "<b>CARNET: </b>".$row['carnet']."<br>";
                                echo "<b>REGISTRO: </b>".$_SESSION['fecha registro']."<br>";
                                ?>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-right">
                                    <a class="btn btn-default btn-flat" href="logoff.php">Desconectar</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
