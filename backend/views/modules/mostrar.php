<?php
    session_start();
    if(!$_SESSION["validar"]){

        header("location:ingreso");
        exit();

    }

    include "views/modules/cabezote.php";
?>
<br>
<br>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Seccion Libros</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Lista de todos los Libros Cargados 
                            </div>

                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Codigo</th>
                                                <th>Titulo         </th>
                                                <th>Portada</th>
                                                <th>Categoria</th>
                                                <th>Edición</th>
                                                <th>Editorial</th>
                                                <th>Autor</th>
                                                <th>Año_Publi</th>
                                                <th>Pdf</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php

                                                $mostrarLibro = new GestorLibros();
                                                $mostrarLibro -> mostrarLibrosLectorController();
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                                <div class="well">
                                    <h4>DataTables Usage Information</h4>
                                    <p>DataTables is a very flexible, advanced tables plugin for jQuery. In SB Admin, we are using a specialized version of DataTables built for Bootstrap 3. We have also customized the table headings to use Font Awesome icons
                                        in place of images. For complete documentation on DataTables, visit their website at <a target="_blank" href="https://datatables.net/">https://datatables.net/</a>.</p>
                                    <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">View DataTables Documentation</a>
                                </div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

            </div>


