<?php
session_start();
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <title>EMPLEADOS</title>
        <?php include_once('includes/head.php');?>
    </head>

    <body class="hold-transition skin-primary sidebar-mini">
        <div class="wrapper">
            <?php $page='OPCIONES'; include 'includes/admin-header.php';?>
                <?php include 'includes/admin-sidebar.php';?>
                    <div class="content-wrapper">
                        <section class="content-header">
                            <div class="row">
                                <div class="col-md-11">
                                    <h1>EMPLEADOS <i class="fas fa-user"></i></h1>
                                </div>
                            </div>
                        </section>
                        <section class="content container-fluid">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Lista</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table id="empleados" class="table no-margin">
                                            <thead>
                                                <tr>
                                                    <th>Tipo Empleado</th>
                                                    <th>Usuario</th>
                                                    <th>Nombres</th>
                                                    <th>Apellidos</th>
                                                    <th>Carnet</th>
                                                    <th>Sucursal</th>
                                                    <th>Fecha de Registro</th>
                                                    <th>Estado</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $sql = "SELECT * FROM empleado INNER JOIN sucursal ON(sucursal.idsucursal = empleado.sucursalid)";
                                                    $result = mysqli_query($conn,$sql);
                                                    if ($result->num_rows > 0) {
                                                        // output data of each row
                                                        while($row = $result->fetch_assoc()) {
                                                            if($row['estado']==1){
                                                                $estado = "<span class='label label-info'>Activo</span>";
                                                            }
                                                            else{
                                                                $estado = "<span class='label label-warning'>Inactivo</span>";
                                                            }
                                                            $id = $row['idempleado'];
                                                            echo "<tr id='$id'>";
                                                            echo "<td data-target='tipo'>".$row['tipo_empleado']."</td>";
                                                            echo "<td data-target='user'>".$row['username']."</td>";
                                                            echo "<td data-target='nombres'>".$row['nombres']."</td>";
                                                            echo "<td data-target='apellidos'>".$row['apellidos']."</td>";
                                                            echo "<td data-target='carnet'>".$row['carnet']."</td>";
                                                            echo "<td data-target='sucursal'>".$row['razon_social']."</td>";
                                                            echo "<td data-target='fecha'>".$row['fecha_registro']."</td>";
                                                            echo "<td data-target='estado'>".$estado."</td>";
                                                            echo "</tr>";
                                                        }
                                                        } else {
                                                            echo "0 resultados";
                                                        }
                                                ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Tipo Empleado</th>
                                                    <th>Usuario</th>
                                                    <th>Nombres</th>
                                                    <th>Apellidos</th>
                                                    <th>Carnet</th>
                                                    <th>Sucursal</th>
                                                    <th>Fecha de Registro</th>
                                                    <th>Estado</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="box-footer clearfix">
                                    <a class="btn btn-sm btn-success btn-flat pull-left" id="btnadd" data-toggle="modal" data-target="#modal-agregar">Nuevo Empleado</a>
                                    <a class="btn btn-sm btn-danger btn-flat pull-right" id="btnadd" data-toggle="modal" data-target="#modal-baja">Dar de Baja</a>
                                </div>
                            </div>
                            <div class="modal fade" id="modal-agregar">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="includes/inserts/addtotable.php?agregarempleado" method="POST">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Agregar Empleado</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" id="timedate" name="timedate" value="<?php date_default_timezone_set( 'America/New_York' ); echo date(" Y-m-d H:i:s "); ?>">
                                                    <label for="username">Usuario</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fas fa-user-tag"></i>
                                                        </div>
                                                        <input type="text" class="form-control" name="username-input" id="username-input" required autofocus>
                                                    </div>
                                                    <br/>
                                                    <label for="password">Contraseña</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fas fa-key"></i>
                                                        </div>
                                                        <input type="text" class="form-control" name="password-input" id="password-input">
                                                    </div>
                                                    <br/>
                                                    <label for="sucurscal-select">Sucursal de trabajo</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fas fa-building"></i>
                                                        </div>
                                                        <select class="form-control select2" id="sucurscal-select" name="sucurscal-select" required>
                                                            <?php $sql = "SELECT * FROM sucursal WHERE idsucursal != 1";
                                                        $result = mysqli_query($conn,$sql);
                                                        if ($result->num_rows > 0) {
                                                            // output data of each row
                                                            while($row = $result->fetch_assoc()) {
                                                                echo "<option value=".$row['idsucursal'].">".$row['razon_social']."</option>";
                                                            }
                                                            } else {
                                                                echo "0 resultados";
                                                            }
                                                    ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default pull-left bg-red" data-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-primary bg-green" name="guardar">Guardar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="modal-baja">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="includes/inserts/updatetable.php?statusempleado" method="POST">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Dar de Baja</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="user-select">Usuario</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fas fa-user"></i>
                                                        </div>
                                                        <select class="form-control select2" id="user-select" name="user-select" required>
                                                            <?php $sql = "SELECT * FROM empleado WHERE username != '$usernamesession' AND tipo_empleado != 'Super Admin' AND estado !=0";
                                                        $result = mysqli_query($conn,$sql);
                                                        if ($result->num_rows > 0) {
                                                            // output data of each row
                                                            while($row = $result->fetch_assoc()) {
                                                                echo "<option value=".$row['idempleado'].">Usuario: ".$row['username']." | ".$row['nombres']." ".$row['apellidos']."</option>";
                                                            }
                                                            } else {
                                                                echo "0 resultados";
                                                            }
                                                    ?>
                                                        </select>
                                                    </div>
                                                    <br/>
                                                    <div class="center">
                                                        <h4><b>NINGUN USUARIO ES ELIMINADO!</b><br/></h4><span>SOLO SE DARA DE BAJA EN EL SISTEMA PARA NO PODER INICIAR SESSION.</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default pull-left bg-red" data-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-primary bg-green" name="guardar">Guardar</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                        </section>
                    </div>
                    <?php include 'includes/admin-footer.php';?>
        </div>
        <script>
            $(document).ready(function() {
                //Datatables (search,paging,etc)
                $('#empleados').DataTable({
                    dom: 'Bfrtip',
                    language: {
                        "decimal": "",
                        "emptyTable": "No hay información",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": "Mostrar _MENU_ Entradas",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscar:",
                        "zeroRecords": "Sin resultados encontrados",
                        "paginate": {
                            "first": "Primero",
                            "last": "Ultimo",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    },
                    paging: false,
                    "order": [
                        [6, "desc"]
                    ],
                    buttons: [{
                        extend: 'print',
                        text: '<i class="fas fa-print"></i> Imprimir',
                        title: 'Lista de Marcas',
                        messageTop: 'AccessCell',
                        exportOptions: {
                            columns: ':visible'
                        }
                    }, {
                        extend: 'pdf',
                        text: '<i class="far fa-file-pdf"></i> Descarga PDF',
                        title: 'AccessCell Marcas',
                        exportOptions: {
                            columns: ':visible'
                        }
                    }, {
                        extend: 'excel',
                        text: '<i class="far fa-file-excel"></i> Descarga Excel',
                        title: 'AccessCell Marcas',
                        exportOptions: {
                            columns: ':visible'
                        }
                    }, {
                        extend: 'colvis',
                        text: '<i class="fas fa-columns"></i><b> Columnas Visibles</b>',
                        postfixButtons: [{
                            extend: 'colvisRestore',
                            text: '<b>VER TODO</b>'
                        }]
                    }],
                    columnDefs: [{
                        targets: -1,
                        visible: true
                    }],
                });
            })

        </script>
    </body>

    </html>

    <?php
