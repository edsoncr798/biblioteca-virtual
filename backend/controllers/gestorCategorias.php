<?php
class GestorCategorias extends CategoriasModels{
#REGITRAR UNA CATEGORIA NUEVA
#=======================================================================================
    public function registrarCategoriaController(){

        if(isset($_POST["nombreCategoria"])){

            $categoria = $_POST["nombreCategoria"];

            $validarCategoria = CategoriasModels :: validarCategoriaModel($categoria,"categoria_libros");

            echo $categoria;

            if($validarCategoria == 0){
                $respuesta = CategoriasModels :: registrarCategoriaModel($categoria,"categoria_libros");
                
                if($respuesta == "ok"){
                    echo '<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
                    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
                    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                    <script>
                    swal({
                        title: "!Ok¡",
                        text: "¡Se ha resgistrado una nueva Categoria!",
                        type: "success",
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                      },
                      function(){
                        window.location.href="categoria";
                      });
                      </script>';
                }else{
                    echo "error";
                }

            }else{
                echo '<div class="col-md-8 col-md-offset-3 text-center alerta" ><div class="alert alert-danger">¡Esta CATEGORIA ya existe !</div></div>';
            }

        }

    }
#===================================================================================================
#LISTAR LAS CATEGORIAS
#==============================================================================
    public function listarCategoriasController(){

        $respuesta = CategoriasModels :: listarCategoriasModel("categoria_libros");
        foreach($respuesta as $row=>$item){
            echo '
            <tr class="odd gradeX" >
                <td>'.$item["id_categoria"].'</td>
                <td >'.$item["tipo_categoria"].'</td>          
                <td><a href="index.php?action=categoria&idBorrar='.$item["id_categoria"].'" ><i class="fa fa-times btn btn-danger" ></i></a> <a href="#editar'.$item["id_categoria"].'" data-toggle="modal" ><i class="fa fa-pencil btn btn-primary editarLibro" ></i></a> </td>
            </tr>
            
            <div id="editar'.$item["id_categoria"].'" class="modal fade">

            <div class="modal-dialog modal-content">
                <form method="post" >
                    <div class="modal-header text-center" style="border:1px solid #eee">
                         <h4>Editar Categoria</h4>           
                     </div>

                    <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="categoria" name="categoria" type="text" value="'.$item["tipo_categoria"].'" placeholder="Nombre de la categoria" class="form-control" required>
                            </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <input type="submit" name="editarCategoria" class="btn btn-primary btn-lg" value="Actualizar Categoria">
                        </div>
                    </div>
                    <input type="hidden" name = "id"  value="'.$item["id_categoria"].'"  >

                    <div class="modal-footer" style="border:1px solid #eee">
                
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                
                    </div>
                            
                </form>
            </div>

       </div>';
        }
    }

#==============================================================================
#ELIMINAR CATEGORIA
#================================================================
    public function borrarCategoriaController(){
        if(isset($_GET["idBorrar"])){


            $datosController=$_GET["idBorrar"];
            $respuesta = CategoriasModels:: borrarCategoriaModel($datosController,"categoria_libros");

            if($respuesta == "ok"){
                echo '<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script>
                swal({
                    title: "!Ok¡",
                    text: "La categoria se ha borrado correctamente!",
                    type: "success",
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                  },
                  function(){
                    window.location.href="categoria";
                  });
                  </script>
                  ';
            }
        }
    }

#=================================================================================
#EDITAR CATEGORIA CONTROLLER
    public function editarCategoriaController(){

        if(isset($_POST["id"])){
            
            $datosController = array("id" => $_POST["id"],
            "categoria" => $_POST["categoria"]);

            $respuesta = CategoriasModels :: editarCategoriaModel($datosController,"categoria_libros");

            if($respuesta == "ok"){
                echo '<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script>
                swal({
                    title: "!Ok¡",
                    text: "La categoria ha sido actualizada correctamente!",
                    type: "success",
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                  },
                  function(){
                    window.location.href="categoria";
                  });
                  </script>';
            }else{
                echo $respuesta;
            }
        }

    }
#=================================================================================000

}