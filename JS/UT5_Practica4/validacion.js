window.onload = iniciar;

function iniciar() {
    document.getElementById("enviar").addEventListener('click', validar, false);
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

function validaApellido() {
    var elemento = document.getElementById("apellido");
    if (!elemento.checkValidity()) {
        if (elemento.validity.valueMissing) {
            error2(elemento, "Debe introducir un apellido")
        }
        if (elemento.validity.patternMismatch) {
            error2(elemento, "El nombre debe tener entre 2 y 50 caracteres");
        }
        //error(elemento);
        return false;
    }
    return true;
}

function validaEdad() {
    var elemento = document.getElementById("edad");
    if (!elemento.checkValidity()) {
        if (elemento.validity.valueMissing) {
            error2(elemento, "Debe introducir una edad")
        }
        if (elemento.validity.rangeOverflow) {
            error2(elemento, "El valor debe ser menor de 100")
        }
        if (elemento.validity.rangeUnderflow) {
            error2(elemento, "El valor debe ser mayor o igual que 18");
        }
        //error(elemento);
        return false;
    }
    return true;
}

function validaTelefono() {
    var elemento = document.getElementById("telefono");
    if (!elemento.checkValidity()) {
        if (elemento.validity.valueMissing) {
            error2(elemento, "Debe introducir un teléfono")
        }
        if (elemento.validity.patternMismatch) {
            error2(elemento, "El telefono debe tener 9 numeros");
        } //error(elemento);
        return false;
    }
    return true;
}

function validafecha() {
    var elemento = document.getElementById("fecha");
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
    if (validaNombre() && validaApellido() && validaEdad() && validaTelefono() && validafecha() && validacorreo() && confirm("Pulsa aceptar si deseas enviar el formulario")) {
        leer_datos();
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

function leer_datos(){

    var sistemasoperativos = document.getElementById("sistemas_operativos").value;
    var nombre = document.getElementById("nombre").value;
    var apellidos = document.getElementById("apellido").value;
    var telefono = document.getElementById("telefono").value;
    var edad = document.getElementById("edad").value;
    var fecha = document.getElementById("fecha").value;
    var correo = document.getElementById("correo").value;


    document.getElementById("mostrar_sistemas_operativos").innerHTML = "Sistema opertaivo es:" + sistemasoperativos;
    document.getElementById("mostrar_nombre").innerHTML = "El nombre es: " + nombre;
    document.getElementById("mostrar_apellido").innerHTML = "El apellido es: " + apellidos;
    document.getElementById("mostrar_tlfn").innerHTML =" El telefono es " + telefono;
    document.getElementById("mostrar_edad").innerHTML = " La edad es: " + edad ;
    document.getElementById("mostrar_fecha").innerHTML = "La fecha es: " + fecha;
    document.getElementById("mostrar_correo").innerHTML = "El correo es: " + correo;

}