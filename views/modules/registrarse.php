
<?php include "views/modules/navegacion.php"; ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
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
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="nombres" name="nombresRegistro" type="text" placeholder="Nombres" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
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
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-users"></i></span>
                            <div class="col-md-8">
                                <input id="usuario" name="usuarioRegistro" type="text" placeholder="Nombre de Usuario" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-eye-slash"></i></span> 
                            <div class="col-md-8">
                             <input id="contrasena" name="contrasenaRegistro" type="password" placeholder="Contraseña" class="form-control" required><span></span>
                             <button id="show_password" class="btn btn-primary form-control " type="button" onclick="mostrar()"> <span class="fa fa-eye-slash icon"></span> </button>
                            </div>
                        </div>
                    
                        <?php
                            $usuarios = new usuariosController();
                            $usuarios -> registroUsuarioController();
                        ?>
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <input type="submit" class="btn btn-primary btn-lg" value="Registrarse">
                            </div>
                        </div>
                    </fieldset>
                </form>
 
            </div>
        </div>
    </div>
</div>

