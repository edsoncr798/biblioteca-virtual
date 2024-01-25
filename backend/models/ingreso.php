<?php

require_once "conexion.php";
class IngresoModels extends Conexion{


        #VALIDAR INGRESO
    #==============================================================================

    public function validarIngresoModel($datosModel,$tabla){

        $stmt = Conexion::conectar()->prepare("SELECT usuario FROM $tabla WHERE usuario =:usuario ");
        $stmt -> bindParam(":usuario", $datosModel, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
    }
#================================================================================

    public function ingresoModel($datosModel,$tabla){

        $stmt = Conexion::conectar()->prepare("SELECT id_usuario ,usuario,contrasena,id_tipo_usuario, intentos FROM $tabla WHERE usuario =:usuario ");
        $stmt -> bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
        #$stmt -> bindParam(":contrasena", $datosModel["contrasena"], PDO::PARAM_STR);
        #$stmt -> bindParam(":intentos", $datosModel["intentos"], PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch();
    }

    public function intentosModel($datosModel,$tabla){

        $stmt = Conexion::conectar()->prepare("UPDATE  $tabla SET intentos=:intentos WHERE usuario=:usuario");

        $stmt -> bindParam(":usuario", $datosModel["usuarioActual"], PDO::PARAM_STR);
        $stmt -> bindParam(":intentos", $datosModel["actualizarIntentos"], PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }
        else{
            return "error";
        }

    }
}
?>