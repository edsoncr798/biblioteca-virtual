<?php

require_once "../../controllers/gestorPdf.php";
#clases y metodos
class Ajax{

    #subir la portada del libro

    public $pdfTemporal;
    
    public function gestorLibrosAjax(){

        $datos = $this->pdfTemporal ;
        $llamar = new Gestorpdf();
        $respuesta = $llamar -> mostrarPdf($datos);
        echo $respuesta;
    }

}

if(isset($_FILES["pdfLibro"]["tmp_name"])){

    $a = new ajax;
    $a  -> pdfTemporal = $_FILES["pdfLibro"]["tmp_name"];
    $a -> gestorLibrosAjax();
}