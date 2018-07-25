<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="<?php if($page=='PRINCIPAL'){echo 'active';} ?>">
                <?php echo "<a href='admin-dashboard'><i class='fa fa-th-large'></i><span>" .'PRINCIPAL'. "</span></a>"; ?>
            </li>
            <li class="treeview <?php if($page=='LISTAS'){echo 'active';} ?>">
                <a href="#"><i class="fa fa-clipboard-list"></i><span>LISTAS</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu">
                    <li>
                        <?php echo "<a href='admin-dashboard-proveedor'>" .'Proveedores'. "</a>"; ?>
                    </li>
                    <li>
                        <?php echo "<a href='admin-dashboard-marcas'>" .'Marcas'. "</a>"; ?>
                    </li>
                    <li>
                        <?php echo "<a href='admin-dashboard-categoria'>" .'Categorias'. "</a>"; ?>
                    </li>
                    <li>
                        <?php echo "<a href='admin-dashboard-productos'>" .'Productos'. "</a>"; ?>
                    </li>
                </ul>
            </li>
            <li class="<?php if($page=='INVENTARIO'){echo 'active';} ?>">
                <?php echo "<a href='admin-dashboard-inventario'><i class='fa fa-archive'></i><span>" .'INVENTARIO'. "</span></a>"; ?>
            </li>
            <li class="treeview <?php if($page=='TRANSACCION'){echo 'active';} ?>">
                <a href="#"><i class="fas fa-exchange-alt"></i><span> TRANSACCION</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu">
                    <li>
                        <?php echo "<a href='admin-dashboard-compras'>" .'Compras'. "</a>"; ?>
                    </li>
                    <li>
                        <?php echo "<a href='admin-dashboard-ventas'>" .'Ventas'. "</a>"; ?>
                    </li>
                </ul>
            </li>
            <li class="treeview <?php if($page=='OPCIONES'){echo 'active';} ?>">
                <a href="#"><i class="fa fa-cogs"></i><span>OPCIONES</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu">
                    <li>
                        <?php echo "<a href='#'>" .'Lista del Personal'. "</a>"; ?>
                    </li>
                    <li>
                        <?php echo "<a href='admin-list-sucursales'>" .'Lista de Sucursales'. "</a>"; ?>
                    </li>
                    <li>
                        <?php echo "<a href='admin-configuration'>" .'Configuracion'. "</a>"; ?>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
