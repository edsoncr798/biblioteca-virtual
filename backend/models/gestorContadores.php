<?php
class GestorContarM extends Conexion{
    #CONTAR USUARIOS
    #================================================================
    public function contarUsuariosModel($tabla){

        $stmt = Conexion::conectar()->prepare("SELECT COUNT(*) total FROM $tabla");
        $stmt ->execute();
        return $stmt -> fetchAll();   
        

    }
    #===========================================================
    #CONTAR USUARIOS
    #================================================================
    public function contarLibrosModel($tabla){

        $stmt = Conexion::conectar()->prepare("SELECT COUNT(*) total FROM $tabla");
        $stmt ->execute();
        return $stmt -> fetchAll();   
        

    }
    #===========================================================
}