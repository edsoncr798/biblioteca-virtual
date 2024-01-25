<?php

class GestorPdf{

    #Mostrar Portada del Libro
    public function mostrarPdf($datos){

        


            $aleatorio = mt_rand(100, 999);
            $ruta = "../../views/images/pdf/temp/libro".$aleatorio.".pdf";
            move_uploaded_file($datos,$ruta);

            echo $ruta;

        
            
    }
}
?>