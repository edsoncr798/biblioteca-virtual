<?php
class GestorUsuario extends GestorUsuarioM{
    

#REGISTRAR UN USUARIO NUEVO
#===============================================================================================
    public function registrarUsuarioController(){
        if(isset($_POST["dniRegistro"])){



            if(preg_match('/^[0-9]+$/',$_POST["dniRegistro"]) &&  preg_match('/^[a-zA-Z\s]+$/',$_POST["nombresRegistro"]) && preg_match('/^[a-zA-Z\s]+$/',$_POST["apellidosRegistro"]) && preg_match('/^[a-zA-Z0-9\s\.,]+$/',$_POST["usuarioRegistro"])){
                
               
                $datosController = array("dni" => $_POST["dniRegistro"],
                "nombres" => $_POST["nombresRegistro"],
                "apellidos" => $_POST["apellidosRegistro"],
                "correo" => $_POST["correoRegistro"],
                "correo" => $_POST["correoRegistro"],
                "usuario" => $_POST["usuarioRegistro"],
                "contrasena" => $_POST["contrasenaRegistro"],
                "tipo" =>$_POST["tipoUsuario"]);

                #validar el dni del usuario
                #=====================================================================
                $validarUsuario = GestorUsuarioM:: validarUsuarioModel($datosController,"usuarios"); 
                
                if($validarUsuario == 0){

                    $respuesta = GestorUsuarioM:: registrarUsuarioModel($datosController,"usuarios");
    
                    if($respuesta == "ok"){
                        echo '<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
                        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
                        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                        <script>
                        swal({
                            title: "!Ok¡",
                            text: "¡Usuario Nuevo, registrado correctamente!",
                            type: "success",
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                          },
                          function(){
                            window.location.href="usuarios";
                          });
                          </script>';
                    }else{
                        echo "error";
                    }

                }else{
                    echo '<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
                    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
                    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                    <script>
                    swal({
                        title: "!Error¡",
                        text: "¡El DNI, ya se encuentra registrado!",
                        type: "error",
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                      },
                      function(){
                        window.location.href="usuarios";
                      });
                      </script>';
                }

                #=========================================================

            }else{
                echo '<div class="alert alert-danger">¡no se puede resgistrar el usuario, no se permiten caracteres especiales!</div>';
            }
        }

    }
#==========================================================================================
#Listar los Usuarios 
#==============================================================================================
public function listarUsuarios(){

    
    $respuesta = GestorUsuarioM:: listarUsuariosModel("usuarios");

    foreach($respuesta as $row=>$item){
        $selea ="";
        $selel="";
        if($item["id_tipo_usuario"] == 0){ 
            $selea="selected";
        }
        if($item["id_tipo_usuario"] == 1){ 
            $selel="selected";
        }
        echo '                                           
        <tr class="odd gradeX" id="">
            <td>'.$item["id_usuario"].'</td>
            <td >'.$item["nombres"].'</td>
            <td class="center">'.$item["apellidos"].'</td>
            <td class="center">'.$item["correo"].'</td>
            <td>'.$item["usuario"].'</td>
            <td>'.$item["contrasena"].'</td>
            <td>'.$item["tipo_usuario"].'</td>
            <td><a href="index.php?action=usuarios&idBorrar='.$item["id_usuario"].'" ><i class="fa fa-times btn btn-danger" ></i></a> <a href="#editar'.$item["id_usuario"].'" data-toggle="modal" ><i class="fa fa-pencil btn btn-primary editarLibro" ></i></a> </td>
        </tr>
        
        <div id="editar'.$item["id_usuario"].'" class="modal fade">

        <div class="modal-dialog modal-content">

           <div class="modal-header" style="border:1px solid #eee">           
               <button type="button" class="close" data-dismiss="modal">&times;</button>       
           </div>


           <div class="modal-body" style="border:1px solid #eee">

            <form class="form-horizontal" method="post" onsubmit="">
                <fieldset>
                    <legend class="text-center header"><h1>Editar Usuario</h1></legend>

                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                        <div class="col-md-8">
                            <input id="nombres" name="nombresRegistroEditar" type="text" placeholder="Nombres" value="'.$item["nombres"].'" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                        <div class="col-md-8">
                            <input id="apellidos" name="apellidosRegistroEditar" type="text" placeholder="Apellidos" value="'.$item["apellidos"].'" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                        <div class="col-md-8">
                            <input id="correo" name="correoRegistroEditar" type="email" placeholder="Correo Electrónico" value="'.$item["correo"].'" class="form-control" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                        <div class="col-md-8">
                            <select class="form-control" name="tipoUsuarioEditar">
                                <option value="0" '.$selea.'>ADMINISTRADOR</option>
                                <option value="1"  '.$selel.' >LECTOR</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-users"></i></span>
                        <div class="col-md-8">
                            <input id="usuario" name="usuarioRegistroEditar" type="text" placeholder="Nombre de Usuario" value="'.$item["usuario"].'" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-eye-slash"></i></span>
                        <div class="col-md-8">
                            <input id="contrasena" name="contrasenaRegistroEditar" type="password" placeholder="Contraseña" value="'.$item["contrasena"].'" class="form-control" required>
                        </div>
                    </div>
                    <input type="hidden" name="dniUsuarioEditar" value="'.$item["id_usuario"].'" >
                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <input type="submit" class="btn btn-primary btn-lg" value="Actualizar">
                        </div>
                    </div>
                </fieldset>
            </form>           
        
       
           </div>

           <div class="modal-footer" style="border:1px solid #eee">
       
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       
           </div>

        </div>

   </div>';

    }


}
#===============================================================================================
#ELIMINAR UN USUARIO
#====================================================================================
public function eliminarUsuarioController(){

    if(isset($_GET["idBorrar"])){

        $datosController=$_GET["idBorrar"];
        $respuesta = GestorUsuarioM:: eliminarUsuarioModel($datosController,"usuarios");

        if($respuesta == "ok"){
            echo '<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script>
            swal({
                title: "!Ok¡",
                text: "El usuario se ha borrado correctamente!",
                type: "success",
                confirmButtonText: "Cerrar",
                closeOnConfirm: false
              },
              function(){
                window.location.href="usuarios";
              });
              </script>';
        }
    }


}

#=======================================================================================
#EDITAR UN USUARIO
#=========================================================================================
    public function editarUsuarioController(){

        if(isset($_POST["nombresRegistroEditar"])){
            
            $datosController = array("dni" => $_POST["dniUsuarioEditar"],
            "nombres" => $_POST["nombresRegistroEditar"],
            "apellidos" => $_POST["apellidosRegistroEditar"],
            "correo" => $_POST["correoRegistroEditar"],
            "usuario" => $_POST["usuarioRegistroEditar"],
            "contrasena" => $_POST["contrasenaRegistroEditar"],
            "tipo" =>$_POST["tipoUsuarioEditar"]);


            $respuesta =  GestorUsuarioM:: editarUsuarioModel($datosController,"usuarios");
            
            if($respuesta == "ok"){
                echo '<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script>
                swal({
                    title: "!Ok¡",
                    text: "El Usuario ha sido actualizado correctamente!",
                    type: "success",
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                  },
                  function(){
                    window.location.href="usuarios";
                  });
                  </script>';
            }else{
                echo $respuesta;
            }

        }

    }
#===================================================================================


}