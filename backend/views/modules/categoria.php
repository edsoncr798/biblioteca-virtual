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
<div id="page-wrapper">
    <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Categorias</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>                                  


                                        <!--==== AGREGAR CATEGORIA  ====-->
        <form class="form-horizontal" method="post" enctype="multipart/form-data" onsubmit="return validarEntrada()" >
            <fieldset>
                <legend class="text-center header"><h1>Nueva Categoria</h1></legend>
                                                        

                     <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-folder-o bigicon"></i></span>
                        <div class="col-md-8">
                            <input id="categoria" name="nombreCategoria" type="text" placeholder="Nombre de la categoria" class="form-control" required>
                        </div>
                    </div>

                <?php
                    $registrar = new GestorCategorias();
                    $registrar -> registrarCategoriaController();
                    
                ?>
                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <input type="submit" name="guardarCategoria" class="btn btn-primary btn-lg" value="Agregar Categoria">
                        
                        </div>
                    </div>
            </fieldset>
        </form> 
                                        <?php

                                        ?>
                                        <hr>


        <!--====  Fin de ARTÍCULOS ADMINISTRABLE  ====-->


                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Lista de las categorias disponibles
                            </div>

                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>id_Categoria</th>
                                                <th>Nombre de la categoria</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $listar = new GestorCategorias();
                                            $listar -> listarCategoriasController();
                                            $listar ->borrarCategoriaController();
                                            $listar -> editarCategoriaController();
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
            <!-- /.container-fluid -->
</div>



                                        
