<?php

class EnlacesModels{

    public function enlacesModel($enlaces){

        if($enlaces == "inicio" ||
        $enlaces == "registrarse" ){

            $module = "views/modules/".$enlaces.".php";
        }
        else if($enlaces =="index"){

            $module = "views/modules/inicio.php";

        }
        else if($enlaces =="login"){

            header("location:backend/index.php");

        }
        else if($enlaces=="fallo"){
            $module = "views/modules/registrarse.php";
        }

        else{
            $module = "views/modules/inicio.php";
        }
        

        return $module;

    }
}
?>