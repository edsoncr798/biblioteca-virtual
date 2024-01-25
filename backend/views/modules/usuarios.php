<?php
    session_start();
    if(!$_SESSION["validar"]){

        header("location:ingreso");
        exit();

    }

    include "views/modules/cabezote.php";
?>
<br>
<br>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Seccion Usuarios</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

<!--=====================================
ARTÍCULOS ADMINISTRABLE          
======================================-->

                                        
     <button id="btnAgregarLibro" class="btn btn-info btn-lg">Agregar Usuario</button><br>
             <br>

                                        <!--==== AGREGAR ARTÍCULO  ====-->

                    <div id="agregarLibro" style="display:none">
                    <form class="form-horizontal" method="post" onsubmit="return validarUsuario()">
                    <fieldset>
                        <legend class="text-center header"><h1>Resgistrarse como Usuario</h1></legend>
                        
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-keyboard-o bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="dni" name="dniRegistro" type="number" placeholder="DNI" class="form-control" min ="1" max="99999999" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-text-height bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="nombres" name="nombresRegistro" type="text" placeholder="Nombres" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-text-height bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="apellidos" name="apellidosRegistro" type="text" placeholder="Apellidos" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="correo" name="correoRegistro" type="email" placeholder="Correo Electrónico" class="form-control" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-laptop bigicon"></i></span>
                            <div class="col-md-8">
                                <select class="form-control" name="tipoUsuario">
                                    <option value="0">ADMINISTRADOR</option>
                                    <option value="1" selected>LECTOR</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-users"></i></span>
                            <div class="col-md-8">
                                <input id="usuario" name="usuarioRegistro" type="text" placeholder="Nombre de Usuario" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-eye-slash"></i></span>
                            <div class="col-md-8">
                                <input id="contrasena" name="contrasenaRegistro" type="password" placeholder="Contraseña" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <input type="submit" class="btn btn-primary btn-lg" value="Registrarse">
                            </div>
                        </div>
                    </fieldset>
                </form>
                <?php
                    $registrar = new GestorUsuario();
                    $registrar -> registrarUsuarioController();
                ?>

                     </div>
             <hr>


<!--====  Fin de ARTÍCULOS ADMINISTRABLE  ====-->


                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Lista de todos los Libros Cargados
                            </div>

                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>DNI</th>
                                                <th>Nombres</th>
                                                <th>Apellidos</th>
                                                <th>Correo</th>
                                                <th>Usuario</th>
                                                <th>Contraseña</th>
                                                <th>TipoUsuario</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $listar = new GestorUsuario();
                                            $listar->listarUsuarios();
                                            $listar ->eliminarUsuarioController();
                                            $listar ->editarUsuarioController();
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                                <div class="well">
                                    <h4>DataTables Usage Information</h4>
                                    <p>DataTables is a very flexible, advanced tables plugin for jQuery. In SB Admin, we are using a specialized version of DataTables built for Bootstrap 3. We have also customized the table headings to use Font Awesome icons
                                        in place of images. For complete documentation on DataTables, visit their website at <a target="_blank" href="https://datatables.net/">https://datatables.net/</a>.</p>
                                    <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">View DataTables Documentation</a>
                                </div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

            </div>
            <!-- /.container-fluid -->
        </div>


