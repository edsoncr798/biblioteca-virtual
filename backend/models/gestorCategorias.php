<?php
class CategoriasModels extends Conexion{
#VERIFICAR QUE NO HAYA MAS CATEGORIAS IGUALES
#=======================================================================
    public function validarCategoriaModel($datosModel,$tabla){

        $stmt = Conexion::conectar()->prepare("SELECT tipo_categoria FROM $tabla WHERE tipo_categoria =:categoria");
        $stmt -> bindParam(":categoria", $datosModel, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();

    }

#============================================================================

#REGISTRAR NUEVA CATEGORIA
#=====================================================================
    public function registrarCategoriaModel($datosModel,$tabla){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(tipo_categoria) VALUES (:categoria)");

        $stmt -> bindParam(":categoria", $datosModel, PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

    }


#==============================================================================
#Listar las categorias
#================================================================================
    public function listarCategoriasModel($tabla){
        
        $stmt = Conexion::conectar()->prepare("SELECT id_categoria, tipo_categoria FROM  $tabla ");
        $stmt ->execute();
        return $stmt -> fetchAll();
    }

    #=========================================================================
    #Borrar categoria 
    #=======================================================================
    public function borrarCategoriaModel($datosModel,$tabla){
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_categoria=:id ");
        $stmt -> bindParam(":id", $datosModel, PDO::PARAM_STR);
        
        if($stmt->execute()){

            return "ok";

        }else{

            return "error";

        }    
    }

    #=============================================================================================
    #Editar categoria

    public function editarCategoriaModel($datosModel,$tabla){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  tipo_categoria=:categoria WHERE id_categoria=:id");
        $stmt -> bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
        $stmt -> bindParam(":categoria", $datosModel["categoria"], PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";

        }else{

            return "error";

        } 
    }
    #================================================================================================


}