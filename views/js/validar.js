/*===============VALIDAR REGISTRO DE USUARIOS===============*/
var input = document.getElementById('dni');
input.addEventListener('input', function() {
    if (this.value.length > 8)
        this.value = this.value.slice(0, 8);
})

function validarUsuario() {
    $(".alerta").remove();

    dni = $("#dni").val();
    nombres = $("#nombres").val();
    apellidos = $("#apellidos").val();
    usuario = $("#usuario").val();


    var caracteresnon = nombres.length;
    var expresion = /^[a-zA-Z\s]*$/;

    var caracteresape = apellidos.length;
    var expresion = /^[a-zA-Z\s]*$/;

    var caracteresusu = usuario.length;
    var expresionusu = /^[a-zA-Z0-9\s\.,]*$/;


    if (dni.length < 8) {

        $("#dni").after('<div class="alert alert-warning alerta">Los caracteres del dni esta incompleto</div>')

        return false;
    } else if (!expresion.test(nombres)) {

        $("#nombres").after('<div class="alert alert-warning alerta">no se permiten números ni caracteres especiales</div>')

        return false;

    } else if (!expresion.test(apellidos)) {

        $("#apellidos").after('<div class="alert alert-warning alerta">no se permiten números ni caracteres especiales</div>')
        return false;
    } else if (!expresionusu.test(usuario)) {
        $("#usuario").after('<div class="alert alert-warning alerta">no se permiten caracteres especiales</div>')
        return false
    } else {
        $(".alerta").remove();
    }

    return true;
}
/*============================================================*/

function mostrar(){
    var cambio = document.getElementById('contrasena');
    if(cambio.type == 'password'){
        cambio.type = 'text';
        $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
        cambio.type = "password";
        $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }
} 

$(document).ready(function () {
//CheckBox mostrar contraseña
$('#ShowPassword').click(function () {
    $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
});
});



