<?php
class Conexion{

    public function conectar(){
        $link = new PDO("mysql:host=localhost;dbname=biblioteca_maynas","root","");

        return $link;
    }
}
