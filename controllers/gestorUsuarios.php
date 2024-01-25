<?php
class usuariosController{

    public function registroUsuarioController(){
        if(isset($_POST["dniRegistro"])){
            


            if(preg_match('/^[0-9]+$/',$_POST["dniRegistro"]) &&  preg_match('/^[a-zA-Z\s]+$/',$_POST["nombresRegistro"]) && preg_match('/^[a-zA-Z\s]+$/',$_POST["apellidosRegistro"]) && preg_match('/^[a-zA-Z0-9\s\.,]+$/',$_POST["usuarioRegistro"])){
                
                $tipo=0;
                $datosController = array("dni" => $_POST["dniRegistro"],
                "nombres" => $_POST["nombresRegistro"],
                "apellidos" => $_POST["apellidosRegistro"],
                "correo" => $_POST["correoRegistro"],
                "usuario" => $_POST["usuarioRegistro"],
                "contrasena" => $_POST["contrasenaRegistro"],
                "tipo" =>$tipo);

                #validar el dni del usuario
                #=====================================================================
                $llamar = new RegistroModel();
                $validarUsuario = $llamar -> validarUsuarioModel($datosController,"usuarios"); 
                
                if($validarUsuario == 0){

                    $respuesta = $llamar -> registroUsuarioModel($datosController,"usuarios");
    
                    if($respuesta == "ok"){
                        echo '<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
                        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
                        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                        <script>
                        swal({
                            title: "!Ok¡",
                            text: "¡Ya eres un usuario, puedes acceder al contenido!",
                            type: "success",
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                          },
                          function(){
                            window.location.href="backend/";
                          });
                          </script>';
                    }else{
                        echo "error";
                    }

                }else{
                    echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    El usuario con el DNI:'.$_POST["dniRegistro"].' ya se encuentra registrado <a href="#" class="alert-link">Error al Registrase</a>.
                </div>';
                }

                #=========================================================

            }else{
                echo '<div class="alert alert-danger">¡no se puede resgistrar el usuario, no se permiten caracteres especiales!</div>';
            }
        }
    }

}
?>