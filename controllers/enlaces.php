<?php
class Enlaces{
    public function enlacesController(){

        if(isset($_GET["action"])){
            $enlaces = $_GET["action"];
        }

        else{
            $enlaces = "index";
        }
        $llamar = new EnlacesModels();
        $respuesta= $llamar -> enlacesModel($enlaces);

        include $respuesta;

    }
}
?>