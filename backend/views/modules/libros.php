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
                        <h1 class="page-header">Seccion Libros</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

<!--=====================================
ARTÍCULOS ADMINISTRABLE          
======================================-->

                                        
                                     <button id="btnAgregarLibro" class="btn btn-info btn-lg">Nuevo Libro</button><br>
                                     <br>

                                        <!--==== AGREGAR ARTÍCULO  ====-->

                                        <div id="agregarLibro" style="display:none">
                                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                            <fieldset>
                                                <legend class="text-center header"><h1>Resgistrar un nuevo Libro</h1></legend>
                                                
                                                <div class="form-group">
                                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-keyboard-o bigicon"></i></span>
                                                    <div class="col-md-8">
                                                        <input id="fname" name="idLibro" type="text" placeholder="Codigo del Libro" class="form-control" maxlength="10" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-book bigicon"></i></span>
                                                    <div class="col-md-8">
                                                        <input id="tituloLibro"  name="tituloLibro" type="text" placeholder="Titulo del Libro" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <span class="col-md-1 col-md-offset-2 text-center"><i class=""></i></span>
                                                    <div class="col-md-8">
                                                        <input name="portadaLibro" type="file" class="btn btn-default" id="portadaLibro" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-picture-o bigicon"></i></span>
                                                    <div class="col-md-8">
                                                        <p>Tamaño de Portada: 800px * 400px, peso máximo 2MB</p>

                                                        <div id="arrastreImagenArticulo">	
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-folder-o bigicon"></i></span>
                                                    <div class="col-md-8">
                                                        
                                                        <select class="form-control" name="categoriaLibro" id="">
                                                            <?php $categoria = new GestorLibros();
                                                                $categoria ->cargarCategoriasController(); ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-list-ol"></i></span>
                                                    <div class="col-md-8">
                                                        <input id="edicion" name="edicionLibro" type="text" placeholder="Edicion del Libro" class="form-control" required>
                                                    </div>
                                                </div>
                                                    
                                                <div class="form-group">
                                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-stack-overflow"></i></span>
                                                    <div class="col-md-8">
                                                        <input id="editorial" name="editorialLibro" type="text" placeholder="Editorial del Libro" class="form-control" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user-plus"></i></span>
                                                    <div class="col-md-8">
                                                        <input id="autor" name="autorLibro" type="text" placeholder="Autor" class="form-control" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-calendar-check-o"></i></span>
                                                    <div class="col-md-8">
                                                        <input id="phone" name="fechaLibro" type="number"  value=2021 placeholder="Fecha de publicacion" min="1950" max="2021" class="form-control" required>
                                                    </div>
                                                </div>
                                                    
                                                <div class="form-group">
                                                    <span class="col-md-1 col-md-offset-2 text-center"><i class=""></i></span>
                                                    <div class="col-md-8">
                                                        <input name="pdfLibro" type="file" id="pdfLibro"  class="form-control" accept="application/pdf" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa  fa-file-pdf-o bigicon"></i></span>
                                                    <div class="col-md-8">
                                                        <p>Selecionar archivo pdf</p>

                                                        <div id="pdf">	
                                                            
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="col-md-12 text-center">
                                                        <input type="submit" name="guardarLibro" class="btn btn-primary btn-lg" value="Agregar">
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </form>

                                        </div>

                                        <?php
                                        $crearLibro = new GestorLibros();
                                        $crearLibro -> guardarLibrosController();
                                        ?>
                                        <hr>


<!--====  Fin de ARTÍCULOS ADMINISTRABLE  ====-->


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
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php

                                                $mostrarLibro = new GestorLibros();
                                                $mostrarLibro -> mostrarLibrosController();
                                                $mostrarLibro ->borrarLibroControlller();
                                                $mostrarLibro -> editarLibroController();
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->

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


