
<?php
    session_start();
    if(!$_SESSION["validar"]){

        header("location:ingreso");
        exit();

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <input type="hidden" name="dniDescarga" value="<?php echo $_SESSION["dni"] ?> ">
    <?php
    $leer= new GestorLibros();
    $leer -> leerLibroLectorController();
    $leer -> guardarDescargaController();

    ?>
    
</body>
</html>