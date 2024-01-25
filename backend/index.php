<?php
require_once "models/enlaces.php";
require_once "models/ingreso.php";
require_once "models/gestorLibros.php";
require_once "models/gestorCategorias.php";
require_once "models/gestorUsuario.php";
require_once "models/gestorContadores.php";

require_once "controllers/template.php";
require_once "controllers/ingreso.php";
require_once "controllers/enlaces.php";
require_once "controllers/gestorLibros.php";
require_once "controllers/gestorCategorias.php";
require_once "controllers/gestorUsuario.php";
require_once "controllers/gestorContadores.php";


$template = new TemplateController();
$template -> template();
?>