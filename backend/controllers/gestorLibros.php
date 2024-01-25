<?php

class GestorLibros{

    #Mostrar Portada del Libro
    public function mostrarPortadaLibro($datos){


            list($ancho, $alto) = getimagesize($datos);

            if($ancho <  100 || $alto < 200){
    
                echo 0;
            }
            else{
    
                $aleatorio = mt_rand(100, 999);
                $ruta = "../../views/images/portadas/temp/portada".$aleatorio.".jpg";
                $origen = imagecreatefromjpeg($datos);
                $destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>1000, "height"=>1500]);
                imagejpeg($destino, $ruta);
    
                echo $ruta;
    
            }
    }


    #Guardar Libros
    #=====================================================

    public function guardarLibrosController(){
        if (isset($_POST["tituloLibro"])){

            $portada = $_FILES["portadaLibro"]["tmp_name"];
            $borrarPortada = glob("views/images/portadas/temp/*");
            foreach($borrarPortada as $file){
                unlink($file);
            }

            $aleatorioPortada = mt_rand(100,999);
            $rutaPortada = "views/images/portadas/portada".$aleatorioPortada.".jpg";
            $origen = imagecreatefromjpeg($portada);
            $destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>1000, "height"=>1500]);
            imagejpeg($destino, $rutaPortada);


            $pdf = $_FILES["pdfLibro"]["tmp_name"];

            $borrarPdf = glob("views/images/pdf/temp/*");
            foreach($borrarPdf as $file){
                unlink($file);
            }

            $aleatorioPdf = mt_Rand(100,999);
            $rutaPdf = "views/images/pdf/libros".$aleatorioPdf.".pdf";
            move_uploaded_file($pdf,$rutaPdf);

            $datosController = array("codigo" => $_POST["idLibro"],
                                    "titulo" => $_POST["tituloLibro"],
                                    "portada" => $rutaPortada,
                                    "categoria" => $_POST["categoriaLibro"],
                                    "edicion" => $_POST["edicionLibro"],
                                    "editorial" => $_POST["editorialLibro"],
                                    "autor" => $_POST["autorLibro"],
                                    "fecha" => $_POST["fechaLibro"],
                                    "pdf" => $rutaPdf);
            
            $llamar = new GestorLibrosModel();
            $respuesta = $llamar -> guardarLibroModel($datosController,"libros");

            if($respuesta == "ok"){

                echo '<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script>
                swal({
                    title: "!Ok¡",
                    text: "se ha guardado correctamente!",
                    type: "success",
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                  },
                  function(){
                    window.location.href="libros";
                  });
                  </script>';

			}

			else{

                echo "error";

			}
        }
    }

    #Mostrar la lista de libros
    #========================================
    public function mostrarLibrosController(){
        $llamar = new GestorLibrosModel();
        $respuesta = $llamar -> mostrarLibrosModel("libros");

        foreach($respuesta as $row=>$item){
            echo '                                            
            <tr class="odd gradeX" id="'.$item["id_libro"].'">
                <td>'.$item["id_libro"].'</td>
                <td >'.$item["titulo"].'</td>
                <td><a href="#portada'.$item["id_libro"].'"  data-toggle="modal" ><button><img src="'.$item["portada"].'" alt="100" width="75" /></button></a></td>
                <td class="center">'.$item["tipo_categoria"].'</td>
                <td class="center">'.$item["edicion"].'</td>
                <td>'.$item["editorial"].'</td>
                <td id="autor">'.$item["autor"].'</td>
                <td>'.$item["fecha_publi"].'</td>
                <td id="'.$item["pdf"].'"><a href="#pdf'.$item["id_libro"].'"  data-toggle="modal" ><button>ver Pdf</button></a> </td>    
                <input type="hidden" value="'.$item["id_cat"].'">            
                <td><a href="index.php?action=libros&idBorrar='.$item["id_libro"].'&rutaPortada='.$item["portada"].'&rutaPdf='.$item["pdf"].'" ><i class="fa fa-times btn btn-danger" ></i></a> <a href="#editar'.$item["id_libro"].'" data-toggle="modal" ><i class="fa fa-pencil btn btn-primary editarLibro" ></i></a> </td>
            </tr>


            <div id="portada'.$item["id_libro"].'" class="modal fade">

                 <div class="modal-dialog modal-content">

                    <div class="modal-header" style="border:1px solid #eee">
                    
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title text-center">'.$item["titulo"].'</h3>
                
                    </div>

                    <div class="modal-body" style="border:1px solid #eee">
                
                        <img src="'.$item["portada"].'"  width="100%" style="margin-bottom:20px">
                
                    </div>

                    <div class="modal-footer" style="border:1px solid #eee">
                
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                
                    </div>

                 </div>

            </div>

            <div id="pdf'.$item["id_libro"].'" class="modal fade" ">

                 <div class="modal-dialog modal-content" >

                        <h3 class="modal-title text-center" >'.$item["titulo"].'</h3>
                        <iframe id="viewer" src="'.$item["pdf"].'" frameborder="0" scrolling="no" width="100%" height="500"></iframe>
                
                    <div class="modal-footer" style="border:1px solid #eee">
                
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                
                    </div>

                 </div>

            </div>


            <div id="editar'.$item["id_libro"].'" class="modal fade" >

                    <div class="modal-dialog modal-content" >

                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <fieldset>
                                
                                <legend class="text-center header"><h2>Actulizar datos del Libro</h2></legend>
                                
                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                    <div class="col-md-8">
                                        <input id="fname" name="editarTituloLibro"  value="'.$item["titulo"].'" type="text"  placeholder="Titulo del Libro" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                    <div class="col-md-8">
                                        <p>Tamaño recomendado: 800px * 400px, peso máximo 2MB</p>
                                        
                                        <div id="arrastreImagenArticulo">	

                                          <input style="display:none" type="file" class="btn btn-default" id="subirNuevaPortada" >

                                            <div id="nuevaPortada">

                                                <i class="fa fa-times btn btn-danger cambiarPortada" style="position:absolute;top:10;right:15;" ></i>
                                                <img src="'.$item["portada"].'" class="img-thumbnail" width="100" alt="200">
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                                    <div class="col-md-8">                                        
                                        <select class="form-control" name="editarCategoriaLibro" id="">';
                                           $cat = new GestorLibros();
                                       echo $cat ->cargarCategoriasEditarController($item["id_cat"]);
               echo '                  </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-users"></i></span>
                                    <div class="col-md-8">
                                        <input id="fname" name="editarEdicionLibro" value="'.$item["edicion"].'" type="text" placeholder="Edicion del Libro" class="form-control" required>
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-eye-slash"></i></span>
                                    <div class="col-md-8">
                                        <input id="phone" name="editarEditorialLibro" value="'.$item["editorial"].'" type="text" placeholder="Editorial del Libro" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-eye-slash"></i></span>
                                    <div class="col-md-8">
                                        <input id="phone" name="editarAutorLibro" value="'.$item["autor"].'" type="text" placeholder="Autor" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-eye-slash"></i></span>
                                    <div class="col-md-8">
                                        <input id="phone" name="editarFechaLibro" value="'.$item["fecha_publi"].'" type="number"  value=2021 placeholder="Fecha de publicacion" min="1950" max="2021" class="form-control" required>
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                    <div class="col-md-8">
                                            <p>Tamaño recomendado: máximo 2MB</p>

                                            <div id="pdf">	
  

                                                    <input style="display:none"  type="file" id="subirNuevoPdf"  class="btn btn-default"  accept="application/pdf" >
                                                    <div id="nuevoPdf">
                                                        <i class="fa fa-times btn btn-danger cambiarPdf " style="position:absolute;top:10;right:15;" ></i>
                                                        <iframe id="viewer" src="'.$item["pdf"].'" frameborder="0" scrolling="no" width="200" height="150">
                                                        </iframe>
                                                    </div>

                                             
                                            </div>
                                     </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-12 text-center">
                                        <input type="submit" name="editarLibro" class="btn btn-primary btn-lg" value="Actualizar Libro">
                                    </div>
                                </div>
                                <input type="hidden" value="'.$item["id_libro"].'"  name = "idEditar"><input type="hidden" value="'.$item["portada"].'" name="portadaAntigua"><input type="hidden" value="'.$item["pdf"].'" name = "pdfAntigua">
                            </fieldset>
                            
                        </form>


                    </div>

            </div>

            ';
        }



    }


    #BORRAR LIBRO
    #====================================
    public function borrarLibroControlller(){

        if(isset($_GET["idBorrar"])){

            unlink($_GET["rutaPortada"]);
            unlink($_GET["rutaPdf"]);

            $datosController=$_GET["idBorrar"];
            $llamar = new GestorLibrosModel();
            $respuesta = $llamar -> borrarLibrosModel($datosController,"libros");

            if($respuesta == "ok"){
                echo '<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script>
                swal({
                    title: "!Ok¡",
                    text: "El libro se ha borrado correctamente!",
                    type: "success",
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                  },
                  function(){
                    window.location.href="libros";
                  });
                  </script>';
            }
        }
    }



    #ACTUALIZAR LIBRO
    #===========================================================================

    public function editarLibroController(){

        $rutaPortada="";
        $rutaPdf="";

        if(isset($_POST["editarTituloLibro"])){

            if(isset($_FILES["editarPortada"]["tmp_name"])){

                $portada = $_FILES["editarPortada"]["tmp_name"];
                $aleatorio = mt_rand(100,999);
                $rutaPortada = "views/images/portadas/portada".$aleatorio.".jpg";
                $origen = imagecreatefromjpeg($portada);
                $destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>1000, "height"=>1500]);
                imagejpeg($destino, $rutaPortada);

                $borrarPortada = glob("views/images/portadas/temp/*");
                foreach($borrarPortada as $file){
                    unlink($file);
                }

            }
            if($rutaPortada == ""){
                $rutaPortada =$_POST["portadaAntigua"];    
            }else{

                unlink($_POST["portadaAntigua"]);
            }

#----------------------------------------------------------------------------------------------

            if(isset($_FILES["editarPdf"]["tmp_name"])){

                $pdf = $_FILES["editarPdf"]["tmp_name"];
                $aleatorioPdf = mt_Rand(100,999);
                $rutaPdf = "views/images/pdf/libros".$aleatorioPdf.".pdf";
                move_uploaded_file($pdf,$rutaPdf);

                $borrarPdf = glob("views/images/pdf/temp/*");
                foreach($borrarPdf as $file){
                    unlink($file);
                }
    


            }

            if($rutaPdf == ""){
                $rutaPdf =$_POST["pdfAntigua"];    
            }else{

                unlink($_POST["pdfAntigua"]);
            }

            $prueba=$_POST["idEditar"];
            echo $prueba;
            $datosController = array("codigo" => $_POST["idEditar"],
                                        "titulo" => $_POST["editarTituloLibro"],
                                        "portada" => $rutaPortada,
                                        "categoria" => $_POST["editarCategoriaLibro"],
                                        "edicion" => $_POST["editarEdicionLibro"],
                                        "editorial" => $_POST["editarEditorialLibro"],
                                        "autor" => $_POST["editarAutorLibro"],
                                        "fecha" => $_POST["editarFechaLibro"],
                                        "pdf" => $rutaPdf);

            $llamar = new GestorLibrosModel();
            $respuesta = $llamar -> editarLibroModel($datosController,"libros");

            if($respuesta == "ok"){
                echo '<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script>
                swal({
                    title: "!Ok¡",
                    text: "El libro ha sido actulizado correctamente!",
                    type: "success",
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                  },
                  function(){
                    window.location.href="libros";
                  });
                  </script>';
            }else{
                echo $respuesta;
            }

                                        

        }
    }

#=====================================================================================================
#CARGAR CATEGORIAS
#=================================================================================================

public function cargarCategoriasController(){
    $llamar = new GestorLibrosModel();
    $respuesta = $llamar-> cargarCategoriasModel("categoria_libros");

    foreach($respuesta as $row=>$item){
        echo '<option value="'.$item["id_categoria"].'" >'.$item["tipo_categoria"].'</option>';
    }



}

#===================================================================================================
    #Mostrar la lista de libros
    #========================================
    public function mostrarLibrosLectorController(){
        $llamar = new GestorLibrosModel();
        $respuesta = $llamar -> mostrarLibrosModel("libros");

        foreach($respuesta as $row=>$item){
            echo '                                            
            <tr class="odd gradeX" id="'.$item["id_libro"].'">
                <td>'.$item["id_libro"].'</td>
                <td >'.$item["titulo"].'</td>
                <td><a href="#portada'.$item["id_libro"].'"  data-toggle="modal" ><button><img src="'.$item["portada"].'" alt="100" width="75" /></button></a></td>
                <td class="center">'.$item["tipo_categoria"].'</td>
                <td class="center">'.$item["edicion"].'</td>
                <td>'.$item["editorial"].'</td>
                <td id="autor">'.$item["autor"].'</td>
                <td>'.$item["fecha_publi"].'</td>
                <td id="'.$item["pdf"].'"><a href="index.php?action=leer&idLeer='.$item["id_libro"].'&dni='.$_SESSION["dni"].'"><button>ver Pdf</button></a> </td>                
            </tr>
            
            <div id="portada'.$item["id_libro"].'" class="modal fade">

                <div class="modal-dialog modal-content">

                <div class="modal-header" style="border:1px solid #eee">
                
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title text-center">'.$item["titulo"].'</h3>
            
                </div>

                <div class="modal-body" style="border:1px solid #eee">
            
                    <img src="'.$item["portada"].'"  width="100%" style="margin-bottom:20px">
            
                </div>

                <div class="modal-footer" style="border:1px solid #eee">
            
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            
                </div>

                </div>

            </div>
            
            
            <div id="pdf'.$item["id_libro"].'" class="modal fade" ">

                <div class="modal-dialog modal-content" >

                    <h3 class="modal-title text-center" >'.$item["titulo"].'</h3>
                    <iframe id="viewer" src="'.$item["pdf"].'" frameborder="0" scrolling="no" width="100%" height="500"></iframe>
            
                <div class="modal-footer" style="border:1px solid #eee">
            
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            
                </div>

                </div>

             </div>
            ';
        }

    }
    #CARGAR CATEGORIAS en editar
#=================================================================================================

public function cargarCategoriasEditarController($cate){
    $llamar = new GestorLibrosModel();
    $respuesta = $llamar-> cargarCategoriasModel("categoria_libros");

    foreach($respuesta as $row=>$item){
        if($cate == $item["id_categoria"]){
            echo '<option value="'.$item["id_categoria"].'" selected>'.$item["tipo_categoria"].'</option>';
        }
        echo '<option value="'.$item["id_categoria"].'" >'.$item["tipo_categoria"].'</option>';
    }



}

#===================================================================================================

    #LEER PDF Y GUARDAR DESCARGA
#=================================================================================================

public function leerLibroLectorController(){
    if(isset($_GET["idLeer"])){


        $datosController=$_GET["idLeer"];
        $llamar = new GestorLibrosModel();
        $respuesta = $llamar -> leerLibroLectorModel($datosController,"libros");

        foreach($respuesta as $row=>$item){
            echo '<div align="center">
            <iframe src="'.$item["pdf"].'" width="100%" height="1000"></iframe>
                    </div>';
        }
    
    }

}

#===================================================================================================
    #GUARDAR ID DEL LIBRO Y DNI DEL USUARIO EN DESCARGAS
#=================================================================================================

public function guardarDescargaController(){
    if(isset($_GET["idLeer"])){
        $date= date("Y-m-d");

        $datosController=array("dni" => $_GET["dni"],
        "id_Libro" => $_GET["idLeer"],
        "fecha" => $date);
        $llamar = new GestorLibrosModel();
        $respuesta = $llamar -> guardarDescargaModel($datosController,"descargas");

        if($respuesta == "ok"){

        }

    }

}

#===================================================================================================

}
?>