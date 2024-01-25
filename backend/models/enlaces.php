<?php

class EnlacesModels{

    public function enlacesModel($enlaces){

        if($enlaces == "inicio" ||
        $enlaces == "libros" ||
        $enlaces == "perfil" ||
        $enlaces == "ingreso" ||
        $enlaces == "categoria" ||
        $enlaces == "usuarios" ||
        $enlaces == "mostrar" ||
        $enlaces == "leer" ||
         $enlaces == "salir"){
    
            $module = "views/modules/".$enlaces.".php";
        }
        else if($enlaces =="index"){
    
        $module = "views/modules/ingreso.php";
    
        }
        else if($enlaces=="fallo"){
                $module = "views/modules/ingreso.php";
        }
        else{
                $module = "views/modules/ingreso.php";
        }
            
    
        return $module;

    }
}
?>