<?php
class GestorUsuarioM extends Conexion{
#VALIDAR USUARIO
#=================================================================================
public function validarUsuarioModel($datosModel, $tabla){
    $stmt = Conexion::conectar()->prepare("SELECT id_usuario FROM $tabla WHERE id_usuario =:dni");
    $stmt -> bindParam(":dni", $datosModel["dni"], PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch();

}

#=============================================================================
#REGISTAR UN NUEVO USUARIO
#==================================================================================
public function registrarUsuarioModel($datosModel, $tabla){
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

#====================================================================================
#LISTAR LOS USUARIOS
#==================================================================================
 public function listarUsuariosModel($tabla){
    $tipo="tipo_usuario";
    $stmt = Conexion::conectar()->prepare("SELECT id_usuario,nombres, apellidos, correo, usuario,contrasena,id_tipo_usuario, tipo_usuario FROM $tabla as U INNER JOIN $tipo as T on T.id_tipo = U.id_tipo_usuario");
    $stmt ->execute();
    return $stmt -> fetchAll();


}
#==================================================================================
#ELIMANAR UN USUARIO
#====================================================================================
public function eliminarUsuarioModel($datosModel,$tabla){
    $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_usuario=:id ");
    $stmt -> bindParam(":id", $datosModel, PDO::PARAM_STR);
    
    if($stmt->execute()){

        return "ok";

    }else{

        return "error";

    }  

}

#==============================================================================
#EDITAR USUARIO
#======================================================================================
public function editarUsuarioModel($datosModel,$tabla){
    $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombres=:nombres, apellidos=:apellidos, correo=:correo, usuario=:usuario, contrasena=:contrasena, id_tipo_usuario=:tipo WHERE id_usuario=:dni");
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

#======================================================================================
}