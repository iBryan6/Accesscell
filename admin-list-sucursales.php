<?php
session_start();
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <title>SUCURSALES</title>
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
                                    <h1>SUCURSALES</h1>
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
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table class="table no-margin">
                                            <thead>
                                                <tr>
                                                    <th>Razon Social</th>
                                                    <th>Direccion</th>
                                                    <th>Telefono</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer clearfix">
                                    <a href="javascript:void(0)" class="btn btn-sm btn-success btn-flat pull-left">Nueva Sucursal</a>
                                </div>
                                <!-- /.box-footer -->
                            </div>
                        </section>
                    </div>
                    <?php include 'includes/admin-footer.php';?>
        </div>
        <script>
            $(document).ready(function() {
                $("form").submit(function(event) {
                    event.preventDefault();
                    var iduser = $("#iduser").val();
                    var names = $("#names").val();
                    var lastnames = $("#lastnames").val();
                    var carnetid = $("#carnetid").val();
                    var passwordactual = $("#passwordactual").val();
                    var newpassword = $("#newpassword").val();
                    var confirmpassword = $("#confirmpassword").val();
                    var submit = $("#actualizarbtn").val();
                    $(".form-message").load("includes/inserts/updatetable.php?editarcuenta", {
                        iduser: iduser,
                        names: names,
                        lastnames: lastnames,
                        carnetid: carnetid,
                        passwordactual: passwordactual,
                        newpassword: newpassword,
                        confirmpassword: confirmpassword,
                        submit: submit
                    });
                });
            });

        </script>
    </body>

    </html>
