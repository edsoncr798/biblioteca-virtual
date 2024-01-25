$("#pdfLibro").change(function() {

    pdf = this.files[0];
    pdfSize = pdf.size;
    //validar tamaño

    if (Number(pdfSize) > 2000000000) {
        $("#pdf").before('<div class="alert alert-warning alerta text-center">El archivo execede el tamaño de 2MG</div>')

    } else {

        $(".alerta").remove();
    }

    //validar imagen 


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

                $("#pdf").before('<img src="views/images/status.gif" id="status">')

            },
            success: function(respuesta) {

                console.log('respuesta', respuesta);

                $("#status").remove();


                $("#pdf").html('<div id="pdfLibro"><iframe id="viewer" src="' + respuesta.slice(6) + '" frameborder="0" scrolling="no" width="200" height="150"></iframe></div>');



            }


        })
    }


})