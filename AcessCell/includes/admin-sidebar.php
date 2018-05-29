<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <!-- Optionally, you can add icons to the links -->
            <li class="<?php if($page=='PRINCIPAL'){echo 'active';} ?>">
                <?php echo "<a href='admin-dashboard.php?ID={$_SESSION['IDsucursal']}'><i class='fa fa-th-large'></i><span>" .'PRINCIPAL'. "</span></a>"; ?>
            </li>
            <li class="treeview <?php if($page=='LISTAS'){echo 'active';} ?>">
                <a href="#"><i class="fa fa-clipboard-list"></i><span>LISTAS</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu">
                    <li>
                        <?php echo "<a href='admin-dashboard-proveedor.php?ID={$_SESSION['IDsucursal']}'>" .'Proveedores'. "</a>"; ?>
                    </li>
                    <li>
                        <?php echo "<a href='admin-dashboard-marcas.php?ID={$_SESSION['IDsucursal']}'>" .'Marcas'. "</a>"; ?>
                    </li>
                    <li>
                        <?php echo "<a href='admin-dashboard-categoria.php?ID={$_SESSION['IDsucursal']}'>" .'Categorias'. "</a>"; ?>
                    </li>
                    <li>
                        <?php echo "<a href='admin-dashboard-productos.php?ID={$_SESSION['IDsucursal']}'>" .'Productos'. "</a>"; ?>
                    </li>
                </ul>
            </li>
            <li class="<?php if($page=='INVENTARIO'){echo 'active';} ?>">
                <?php echo "<a href='admin-dashboard-inventario.php?ID={$_SESSION['IDsucursal']}'><i class='fa fa-archive'></i><span>" .'INVENTARIO'. "</span></a>"; ?>
            </li>
            <li class="treeview <?php if($page=='TRANSACCION'){echo 'active';} ?>">
                <a href="#"><i class="fas fa-exchange-alt"></i><span> TRANSACCION</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu">
                    <li>
                        <?php echo "<a href='admin-dashboard-compras.php?ID={$_SESSION['IDsucursal']}'>" .'Compras'. "</a>"; ?>
                    </li>
                    <li>
                        <?php echo "<a href='admin-dashboard-ventas.php?ID={$_SESSION['IDsucursal']}'>" .'Ventas'. "</a>"; ?>
                    </li>
                    <li>
                        <?php echo "<a href='#?ID={$_SESSION['IDsucursal']}'>" .'Devoluciones'. "</a>"; ?>
                    </li>
                    <li>
                        <?php echo "<a href='#?ID={$_SESSION['IDsucursal']}'>" .'Intercambios'. "</a>"; ?>
                    </li>
                </ul>
            </li>
            <li class="<?php if($page=='CUENTASXCOBRAR'){echo 'active';} ?>">
                <?php echo "<a href='#?ID={$_SESSION['IDsucursal']}'><i class='fa fa-users'></i><span>" .'CUENTAS POR COBRAR'. "</span></a>"; ?>
            </li>
            <li class="treeview <?php if($page=='OPCIONES'){echo 'active';} ?>">
                <a href="#"><i class="fa fa-cogs"></i><span>OPCIONES</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu">
                    <li>
                        <?php echo "<a href='#?ID={$_SESSION['IDsucursal']}'>" .'Respaldar base de datos'. "</a>"; ?>
                    </li>
                    <li>
                        <?php echo "<a href='#?ID={$_SESSION['IDsucursal']}'>" .'Lista del personal'. "</a>"; ?>
                    </li>
                    <li>
                        <?php echo "<a href='#?ID={$_SESSION['IDsucursal']}'>" .'Opciones'. "</a>"; ?>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
