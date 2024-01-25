/*======================Agregar Libro===================================*/

$("#btnAgregarLibro").click(function() {

    $("#agregarLibro").toggle(400);
})


/*======================Subir Portada===================================*/

$("#portadaLibro").change(function() {
    imagen = this.files[0];
    imagenSize = imagen.size;
    //validar tamaño

    if (Number(imagenSize) > 2000000) {
        $("#arrastreImagenArticulo").before('<div class="alert alert-warning alerta text-center">El archivo execede el tamaño de 2MG</div>')

    } else {

        $(".alerta").remove();
    }

    //validar imagen 

    imagenType = imagen.type;
    console.log('imagen', imagen)
    if (imagenType == "image/jpeg" || imagenType == "image/png") {

        $(".alerta").remove();

    } else {

        $("#arrastreImagenArticulo").before('<div class="alert alert-warning alerta text-center">El formato tiene que ser PNG o JPG</div>')

    }


    /*==================Mostrar la portada============================*/

    if (Number(imagenSize) < 2000000 && imagenType == "image/jpeg" || imagenType == "image/png") {

        var datos = new FormData();

        datos.append('portadaLibro', imagen)

        $.ajax({
            url: "views/ajax/gestorLibros.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {

                $("#arrastreImagenArticulo").before('<img src="views/images/status.gif" id="status">')

            },
            success: function(respuesta) {

                $("#status").remove();

                if (respuesta == 0) {
                    $("#arrastreImagenArticulo").before('<div class="alert alert-warning alerta text-center">La imagen es inferior a 800px * 400px</div>')
                } else {

                    $("#arrastreImagenArticulo").html('<div id="imagenArticulo"><img src="' + respuesta.slice(6) + '" class="img-thumbnail"></div>')
                }


            }


        })
    }


})


/*=====================Editar Libro================000*/

$(".editarLibro").click(function() {

    idLibro = $(this).parent().parent().attr("id");
    titulo = $("#" + idLibro).find("td").eq(1).text();
    rutaPortada = $("#" + idLibro).find("td").eq(2).children("a").children("button").children("img").attr("src");
    categoria = $("#" + idLibro).find("td").eq(3).text();
    edicion = $("#" + idLibro).find("td").eq(4).text();
    editorial = $("#" + idLibro).find("td").eq(5).text();
    autor = $("#" + idLibro).find("td").eq(6).text();
    fecha = $("#" + idLibro).find("td").eq(7).text();
    rutaPdf = $("#" + idLibro).find("td").eq(8).attr("id");

    $(".cambiarPortada").click(function() {
        $(this).hide();

        $("#subirNuevaPortada").show();
        $("#nuevaPortada").html("");
        $("#subirNuevaPortada").attr("name", "editarPortada");
        $("#subirNuevaPortada").attr("required", true);

        $("#subirNuevaPortada").change(function() {
            imagen = this.files[0];
            imagenSize = imagen.size;
            //validar tamaño

            if (Number(imagenSize) > 2000000) {
                $("#nuevaPortada").before('<div class="alert alert-warning alerta text-center">El archivo execede el tamaño de 2MG</div>')

            } else {

                $(".alerta").remove();
            }

            //validar imagen 

            imagenType = imagen.type;

            if (imagenType == "image/jpeg" || imagenType == "image/png") {

                $(".alerta").remove();

            } else {

                $("#nuevaPortada").before('<div class="alert alert-warning alerta text-center">El formato tiene que ser PNG o JPG</div>')

            }

            /*==================Mostrar la portada============================*/

            if (Number(imagenSize) < 2000000 && imagenType == "image/jpeg" || imagenType == "image/png") {

                var datos = new FormData();

                datos.append('portadaLibro', imagen)

                $.ajax({
                    url: "views/ajax/gestorLibros.php",
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {

                        $("#nuevaPortada").before('<img src="views/images/status.gif" id="status">')

                    },
                    success: function(respuesta) {

                        $("#status").remove();

                        if (respuesta == 0) {
                            $("#nuevaPortada").before('<div class="alert alert-warning alerta text-center">La imagen es inferior a 800px * 400px</div>')
                        } else {

                            $("#nuevaPortada").html('<div id="imagenArticulo"><img src="' + respuesta.slice(6) + '" class="img-thumbnail"></div>')
                        }


                    }


                })
            }


        })

    })

    $(".cambiarPdf").click(function() {
        $(this).hide();

        $("#subirNuevoPdf").show();
        $("#nuevoPdf").html("");
        $("#subirNuevoPdf").attr("name", "editarPdf");
        $("#subirNuevoPdf").attr("required", true);

        $("#subirNuevoPdf").change(function() {

            pdf = this.files[0];
            pdfSize = pdf.size;

            console.log('pdfEditar', pdf);
            //validar tamaño

            if (Number(pdfSize) > 2000000000) {
                $("#nuevoPdf").before('<div class="alert alert-warning alerta text-center">El archivo execede el tamaño de 2MG</div>')

            } else {

                $(".alerta").remove();
            }
            /*==================Mostrar la pdf============================*/

            if (Number(pdfSize) < 2000000000) {

                var datos = new FormData();

                datos.append('pdfLibro', pdf)

                $.ajax({
                    url: "views/ajax/gestorPdf.php",
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {

                        $("#nuevoPdf").before('<img src="views/images/status.gif" id="status">')

                    },
                    success: function(respuesta) {

                        console.log('respuesta', respuesta);

                        $("#status").remove();


                        $("#nuevoPdf").html('<div id="pdfLibro"><iframe id="viewer" src="' + respuesta.slice(6) + '" frameborder="0" scrolling="no" width="150" height="100"></iframe></div>');



                    }


                })
            }



        })


    })

})