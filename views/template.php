<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIBLIOTECA VIRTUAL | MPM</title>

    <link href="views/css/bootstrap.min.css" rel="stylesheet">
    <link href="views/css/font-awesome.min.css" rel="stylesheet">
    <link href="views/css/prettyPhoto.css" rel="stylesheet">
    <link href="views/css/price-range.css" rel="stylesheet">
    <link href="views/css/animate.css" rel="stylesheet">
	<link href="views/css/main.css" rel="stylesheet">
	<link href="views/css/responsive.css" rel="stylesheet">   
    <link href="views/css/estilo.css" rel="stylesheet">  
    <link rel="stylesheet" href="views/css/style.css">

    <link rel="shortcut icon" href="images/iconolibreria.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

</head>

<body>



<section>
<?php
    $modulos = new Enlaces();
    $modulos -> enlacesController();
    ?>

</section>


    	 <!--Librerias de Jquery, Bootstrap y otras mas--> 
    <script src="views/js/jquery.js"></script>
	<script src="views/js/bootstrap.min.js"></script>
	<script src="views/js/jquery.scrollUp.min.js"></script>
	<script src="views/js/price-range.js"></script>
    <script src="views/js/jquery.prettyPhoto.js"></script>
    <script src="views/js/main.js"></script>
    <script src="views/js/validar.js"></script>
</body>
</html>