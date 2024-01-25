<?php

require_once "../../controllers/gestorLibros.php";
#clases y metodos
class Ajax{

    #subir la portada del libro

    public $imagenTemporal;
    
    public function gestorLibrosAjax(){

        $datos = $this->imagenTemporal ;
        $llamar = new GestorLibros();
        $respuesta = $llamar -> mostrarPortadaLibro($datos);
        echo $respuesta;
    }

}

if(isset($_FILES["portadaLibro"]["tmp_name"])){

    $a = new ajax;
    $a  -> imagenTemporal = $_FILES["portadaLibro"]["tmp_name"];
    $a -> gestorLibrosAjax();
}
