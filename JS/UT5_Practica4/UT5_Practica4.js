window.addEventListener("load", iniciar);

function iniciar () {
    var mostrarDatos = document.getElementById('mostrarDatos');
    mostrarDatos.addEventListener('click',enseniarDatos,false);

    var tiposCategorias = document.getElementById('tiposCategorias');
    tiposCategorias.addEventListener('change',disableSelect,false);

    var optionsCategorias = document.getElementById('optionsCategorias');
    optionsCategorias.addEventListener('change',mostrarDatosSelect,false);
}


function enseniarDatos(){
    var nombre = document.getElementById("nombre").value;
    var fechaNac = document.getElementById("nacimiento").value;
    var email = document.getElementById("correo").value;
    var usoMovil = document.getElementById("rangoUsoMovil").value;

    var mostrarPantalla = document.getElementById("datosGuardados1");

    mostrarPantalla.innerHTML = "Tu nombre es: " + nombre + "<br>";
    mostrarPantalla.innerHTML += "Tu fecha de nacimiento es: " + fechaNac + "<br>";
    mostrarPantalla.innerHTML += "Tu email es: " + email + "<br>";
    mostrarPantalla.innerHTML += "Tu uso del movil es de: " + usoMovil + "<br>";
}

function mostrarDatosSelect(){
    var mensaje = document.getElementById("datosGuardados2");
    //Select
    var select = document.getElementById("optionsCategorias");
    for (var i = 0, iLen = select.options.length; i < iLen; i++) {
        if (select.options[i].selected) {
            var opcionSelectedSelect = select.options[i].value;
        }
    }
    mensaje.innerHTML = "Los datos del select: " + opcionSelectedSelect + ".<br>";
}

function disableSelect(){
    var optionsCategorias = document.getElementById("optionsCategorias");

    var grupoDisabled = recuperarSeleccionados();
    console.log(grupoDisabled);

    optionsCategorias.disabled = false;
    if (grupoDisabled.length == 0){
        optionsCategorias.disabled = true;
    }

    var inputs = optionsCategorias.getElementsByTagName("optgroup");
    for(var i = 0; i < inputs.length; i++) {
        inputs[i].disabled = false;
    }

    for (var i = 0; i < grupoDisabled.length; i++){
        document.getElementById(grupoDisabled[i]).disabled = true;
    }

}

function recuperarSeleccionados(){
    var tiposCategorias = document.getElementById("tiposCategorias");
    var grupoDisabled = new Array();
    for (var i = 0, iLen = tiposCategorias.options.length; i < iLen; i++) {
        if (tiposCategorias.options[i].selected) {
            grupoDisabled.push(tiposCategorias.options[i].value);
            console.log(grupoDisabled);
        }
    }
    return grupoDisabled;
}
//VALIDACION

function validaNombre(){
    var elemento = document.getElementById("nombre");
    if (!elemento.checkValidity()){
        error(elemento);
        return false;
    }
    return true;
}

function validar(e){
    if (validaNombre()){
        return true;
    }else{
        e.preventDefault();
        return false;
    }
}

function error(elemento){
    document.getElementById("mensajeError").innerHTML =
        elemento.validationMessage;
    elemento.className="error";
    elemento.focus();
}
