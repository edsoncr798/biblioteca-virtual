<?php
class GestorContar extends GestorContarM{
    #CONTAR LOS USUARIOS
    #=============================================================================
    public function contarUsuariosController() {

        $respuesta = GestorContarM :: contarUsuariosModel("usuarios");
        foreach($respuesta as $row=>$item){
            echo $item["total"];
        }


    }
    #============================================================================
    #CONTAR LOS LIBROS
    #=============================================================================
    public function contarLibrosController() {

        $respuesta = GestorContarM :: contarLibrosModel("libros");
        foreach($respuesta as $row=>$item){
            echo $item["total"];
        }


    }
    #============================================================================
        #CONTAR LAS CATEGORIAS
    #=============================================================================
    public function contarCateController() {

        $respuesta = GestorContarM :: contarLibrosModel("categoria_libros");
        foreach($respuesta as $row=>$item){
            echo $item["total"];
        }


    }
    #============================================================================

            #CONTAR LAS DESCARGAS
    #=============================================================================
    public function contarDescargasController() {

        $respuesta = GestorContarM :: contarLibrosModel("descargas");
        foreach($respuesta as $row=>$item){
            echo $item["total"];
        }


    }
    #============================================================================



}