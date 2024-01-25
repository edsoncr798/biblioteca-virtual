function validarIngreso() {
    var expresion = /^[a-zA-Z0-9]*$/;

    if (!expresion.test($("#username").val())) {
        return false;
    } else if (!expresion.test($("#password").val())) {
        return false;
    }
    return true;
}