<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

<title>PANEL DE CONTROL | BMM</title>

    <link rel="stylesheet" href="views/css/style.css">
    <link rel="stylesheet" href="views/css/pdf.css">
    <!-- Bootstrap Core CSS -->
    <link href="views/css/bootstrap.min.css" rel="stylesheet">
        <!-- MetisMenu CSS -->
    <link href="views/css/metisMenu.min.css" rel="stylesheet">
    <!-- Timeline CSS -->
    <link href="views/css/timeline.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="views/css/startmin.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="views/css/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="views/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- DataTables CSS -->
    <link href="views/css/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="views/css/dataTables/dataTables.responsive.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>

    <div id="wrapper">
            <?php
            $modulos = new Enlaces();
            $modulos -> enlacesController();
            ?>

    </div>

    <!-- jQuery -->
    <script src="views/js/jquery.min.js"></script>

  	<script src="views/js/jquery-2.2.0.min.js"></script>
    <script src="views/js/jquery-ui.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="views/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="views/js/metisMenu.min.js"></script>
    <!-- DataTables JavaScript -->
    <script src="views/js/dataTables/jquery.dataTables.min.js"></script>
    <script src="views/js/dataTables/dataTables.bootstrap.min.js"></script>   

    <!-- Custom Theme JavaScript -->
    <script src="views/js/startmin.js"></script>

    <script src="views/js/validarIngreso.js"></script>
    <script src="views/js/gestorLibros.js"></script>
    <script src="views/js/gestorPdf.js"></script>
    <script src="views/js/validar.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>


</body>

</html>

<?php ob_end_flush(); ?>
