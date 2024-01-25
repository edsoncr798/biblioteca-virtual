<?php

require_once "backend/models/conexion.php";
class RegistroModel extends Conexion{

    #VALIDAR DNI DEL USUARIO
    #======================================================
    public function validarUsuarioModel($datosModel,$tabla){

        $stmt = Conexion::conectar()->prepare("SELECT id_usuario FROM $tabla WHERE id_usuario =:dni");
        $stmt -> bindParam(":dni", $datosModel["dni"], PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    #REGISTRAR USUARIOS LECTORES
    #=====================================================
    public function registroUsuarioModel($datosModel, $tabla){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_usuario, nombres, apellidos, correo, usuario, contrasena, id_tipo_usuario) VALUES (:dni,:nombres,:apellidos,:correo,:usuario,:contrasena,:tipo)");
        
        $stmt -> bindParam(":dni", $datosModel["dni"], PDO::PARAM_INT);
        $stmt -> bindParam(":nombres", $datosModel["nombres"], PDO::PARAM_STR);
        $stmt -> bindParam(":apellidos", $datosModel["apellidos"], PDO::PARAM_STR);
        $stmt -> bindParam(":correo", $datosModel["correo"], PDO::PARAM_STR);
        $stmt -> bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
        $stmt -> bindParam(":contrasena", $datosModel["contrasena"], PDO::PARAM_STR);
        $stmt -> bindParam(":tipo", $datosModel["tipo"], PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
    }

}