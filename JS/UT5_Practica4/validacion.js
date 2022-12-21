window.onload = iniciar;

function iniciar() {
    document.getElementById("mostrarDatos").addEventListener('click', validar, false);
}

function validaNombre() {
    var elemento = document.getElementById("nombre");
    if (!elemento.checkValidity()) {
        if (elemento.validity.valueMissing) {
            error2(elemento, "Debe introducir un nombre")
        }
        if (elemento.validity.patternMismatch) {
            error2(elemento, "El nombre debe tener entre 2 y 15 caracteres");
        }
        //error(elemento);
        return false;
    }
    return true;
}
function validaContrasenia() {
    var elemento = document.getElementById("contrasenia");
    if (!elemento.checkValidity()) {
        if (elemento.validity.valueMissing) {
            error2(elemento, "Debe introducir una contrasenia")
        }
        if (elemento.validity.patternMismatch) {
            error2(elemento, "La contraseña debe tener al menos 8 caracteres");
        }
        //error(elemento);
        return false;
    }
    return true;
}

function validafecha() {
    var elemento = document.getElementById("nacimiento");
    if (!elemento.checkValidity()) {
        if (elemento.validity.valueMissing) {
            error2(elemento, "Debe introducir una fecha")
        }
        if (elemento.validity.patternMismatch) {
            error2(elemento, "Introduce una fecha correcta");
        }
        //error(elemento);
        return false;
    }
    return true;
}
function validacorreo() {
    var elemento = document.getElementById("correo");
    if (!elemento.checkValidity()) {
        if (elemento.validity.valueMissing) {
            error2(elemento, "Debe introducir un correo")
        }
        if (elemento.validity.patternMismatch) {
            error2(elemento, "Introduce un correo correcto");
        }
        //error(elemento);
        return false;
    }
    return true;
}


function validar(e) {
    borrarError();
    if (validaNombre() && validaContrasenia() && validafecha() && validacorreo() && confirm("Pulsa aceptar si deseas enviar el formulario")) {
        enseniarDatos();
    } else {
        e.preventDefault();
        return false;
    }
}

function error2(elemento, mensaje) {
    document.getElementById("mensajeError").innerHTML = mensaje;
    elemento.className = "error";
    elemento.focus();
}

function borrarError() {
    var formulario = document.forms[0];
    for (var i = 0; i < formulario.elements.length; i++) {
        formulario.elements[i].className = "";
    }
}
