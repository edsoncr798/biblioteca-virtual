<?php

require_once "conexion.php";
class GestorLibrosModel extends Conexion{


    #Guardar Datos del Libro en el modelo
    #================================================================
    public function guardarLibroModel($datosModel,$tabla){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_libro, titulo, portada, id_categoria, edicion, editorial, autor, fecha_publi, pdf) VALUES (:codigo,:titulo,:portada,:categoria,:edicion,:editorial,:autor,:fecha,:pdf)");

        #bindParam:vinvula una varible php aun parametro de sustitucion con nombre o signo
        #de interrogacion correspondiente de la sentencia sql que fue usada para prepaparar la sentencia

        $stmt -> bindParam(":codigo", $datosModel["codigo"], PDO::PARAM_STR);
        $stmt -> bindParam(":titulo", $datosModel["titulo"], PDO::PARAM_STR);
        $stmt -> bindParam(":portada", $datosModel["portada"], PDO::PARAM_STR);
        $stmt -> bindParam(":categoria", $datosModel["categoria"], PDO::PARAM_INT);
        $stmt -> bindParam(":edicion", $datosModel["edicion"], PDO::PARAM_STR);
        $stmt -> bindParam(":editorial", $datosModel["editorial"], PDO::PARAM_STR);
        $stmt -> bindParam(":autor", $datosModel["autor"], PDO::PARAM_STR);
        $stmt -> bindParam(":fecha", $datosModel["fecha"], PDO::PARAM_INT);
        $stmt -> bindParam(":pdf", $datosModel["pdf"], PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";

        }else{

            return "error";

        }       


    }

    #Consulta para mostrar libros model
    #===============================================000
    public function mostrarLibrosModel($tabla){

        $stmt = Conexion::conectar()->prepare("SELECT id_libro, titulo, portada, tipo_categoria,c.id_categoria id_cat, edicion, editorial, autor, fecha_publi, pdf FROM $tabla as l INNER JOIN categoria_libros AS c ON l.id_categoria= c.id_categoria");
        $stmt ->execute();
        return $stmt -> fetchAll();

        

    }

    #Borrar Libro Model
    #=======================================
    public function borrarLibrosModel($datosModel,$tabla){
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_libro=:id ");
        $stmt -> bindParam(":id", $datosModel, PDO::PARAM_STR);
        
        if($stmt->execute()){

            return "ok";

        }else{

            return "error";

        }       




    }


    #ACTULIZAR LIBRO
    #==========================================================

    public function editarLibroModel($datosModel, $tabla){
        
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET titulo =:titulo, portada=:portada, id_categoria=:categoria, edicion=:edicion, editorial=:editorial, autor=:autor, fecha_publi=:fecha, pdf=:pdf WHERE id_libro=:codigo");
        $stmt -> bindParam(":codigo", $datosModel["codigo"], PDO::PARAM_STR);
        $stmt -> bindParam(":titulo", $datosModel["titulo"], PDO::PARAM_STR);
        $stmt -> bindParam(":portada", $datosModel["portada"], PDO::PARAM_STR);
        $stmt -> bindParam(":categoria", $datosModel["categoria"], PDO::PARAM_INT);
        $stmt -> bindParam(":edicion", $datosModel["edicion"], PDO::PARAM_STR);
        $stmt -> bindParam(":editorial", $datosModel["editorial"], PDO::PARAM_STR);
        $stmt -> bindParam(":autor", $datosModel["autor"], PDO::PARAM_STR);
        $stmt -> bindParam(":fecha", $datosModel["fecha"], PDO::PARAM_INT);
        $stmt -> bindParam(":pdf", $datosModel["pdf"], PDO::PARAM_STR);
        
        if($stmt->execute()){

            return "ok";

        }else{

            return "error";

        } 
    }

#Cargar las categorias 
#===============================================000
    public function cargarCategoriasModel($tabla){

        $stmt = Conexion::conectar()->prepare("SELECT id_categoria, tipo_categoria FROM  $tabla ");
        $stmt ->execute();
        return $stmt -> fetchAll();

        

    }

#LEER PDF LECTOR
#===============================================000
    public function leerLibroLectorModel($datosModel,$tabla){

        $stmt = Conexion::conectar()->prepare("SELECT pdf FROM $tabla WHERE id_libro=$datosModel");
        $stmt ->execute();
        return $stmt -> fetchAll();

        

    }

    #GUARDAR DESCARGA
#===============================================000
public function guardarDescargaModel($datosModel,$tabla){

    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_libro, id_usuario, fecha_descarga) VALUES (:id_Libro,:dni,:fecha)");
    $stmt -> bindParam(":dni", $datosModel["dni"], PDO::PARAM_STR);
    $stmt -> bindParam(":id_Libro", $datosModel["id_Libro"], PDO::PARAM_INT);
    $stmt -> bindParam(":fecha", $datosModel["fecha"], PDO::PARAM_STR);
    if($stmt->execute()){

        return "ok";

    }else{

        return "error";

    } 
    

}



}
?>