<?php class Ingreso{

    public function ingresoController(){
        
        if(isset($_POST["usuarioIngreso"])){
            if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuarioIngreso"]) && preg_match('/^[a-zA-Z0-9]+$/',$_POST["contrasenaIngreso"])){

                $datosController = array("usuario"=>$_POST["usuarioIngreso"], 
                "contrasena"=>$_POST["contrasenaIngreso"]);

                $datosValidar = $_POST["usuarioIngreso"] ;

                $llamar = new IngresoModels() ;
                $validarIngreso = $llamar -> validarIngresoModel($datosValidar,"usuarios");

                if($validarIngreso == 0) {
                    echo '
                    <div class="alert alert-danger">El usuario no existe, registrarse </div>
                    ';

                }else{
                    $respuesta = $llamar -> ingresoModel($datosController,"usuarios");
    
                    $intentos= $respuesta["intentos"];
                    $usuarioActual=$_POST["usuarioIngreso"];
                    $maximoIntentos= 2;
                    if($intentos<$maximoIntentos){
        
                            if($respuesta["contrasena"] == $_POST["contrasenaIngreso"]){
                                
                                $intentos = 0;
                                $datosController=array("usuarioActual"=>$usuarioActual, "actualizarIntentos"=>$intentos);
            
                                $llamar = new IngresoModels() ;
                                $respuestaActualizarIntentos = $llamar -> intentosModel($datosController,"usuarios");
        
                                session_start();
                                $_SESSION["validar"] = true;
                                $_SESSION["usuario"]= $respuesta["usuario"];
                                $_SESSION["rol"] = $respuesta["id_tipo_usuario"];
                                $_SESSION["dni"] = $respuesta["id_usuario"];

                                if($_SESSION["rol"] == 0){
                                    
                                    header("location:inicio");
                                }else{
            
                                header("location:mostrar");
                                }
            
                            }else{
            
                                ++$intentos;
                                $datosController=array("usuarioActual"=>$usuarioActual, "actualizarIntentos"=>$intentos);
            
                                $llamar = new IngresoModels() ;
                                $respuestaActualizarIntentos = $llamar -> intentosModel($datosController,"usuarios");
                                
                                #header("location:index.php?action=fallo");
                                echo '

                                            <div class="alert alert-danger">Contraseña incorrecta</div>
                                ';
            
                            }
                    }else{
                            $intentos = 0;
                            $datosController=array("usuarioActual"=>$usuarioActual, "actualizarIntentos"=>$intentos);
            
                            $llamar = new IngresoModels() ;
                            $respuestaActualizarIntentos = $llamar -> intentosModel($datosController,"usuarios");
            
                            #header("location:index.php?action=fallo3intentos");
                            echo '

                                        <div class="alert alert-danger">Falló 3 veces, eres un intruso </div>
                            ';
                        }
                }
            } 
        }
    }

}?>