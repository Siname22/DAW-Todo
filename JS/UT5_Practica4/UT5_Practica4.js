window.addEventListener("load", iniciar);

function iniciar () {
    var mostrarDatos = document.getElementById('mostrarDatos');
    mostrarDatos.addEventListener('click',enseniarDatos,false);
    mostrarDatos.addEventListener("click", validar, false);

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

function validaFechaNac(){
    const DATE_REGEX = /^(0[1-9]|[1-2]\d|3[01])(\/)(0[1-9]|1[012])\2(\d{4})$/
    const CURRENT_YEAR = new Date().getFullYear();
    let fechaNac = document.getElementById("nacimiento");

    var validateDate = (fechaNac) => {
        //Comprueba que el numero de meses sea menor o igual a 12 y
        if (!fechaNac.match(DATE_REGEX)){
            return false;
        }

        //Comprobacion del dia del mes.
        var dia = parseInt(fechaNac.split("/")[0]);
        var mes = parseInt(fechaNac.split("/")[1]);
        var anio = parseInt(fechaNac.split("/")[2]);
        var mesesAnio = new Date(anio, mes, 0).getDate();
        if (dia > mesesAnio){
            return false;
        }
        //Comprobacion del año
        if (anio > CURRENT_YEAR){
            return false;
        }
        return true;
    }
}

function validarEmail(valor) {
    //Expresion regular que indica las tres partes del email (nombre + @ + dominio)
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3,4})+$/.test(valor)){
        return true;
    }
    return false;
}

function validarPaswd(){
    var password = document.getElementById("contrasenia").value;

    var espacios = false;
    var cont = 0;

    while (!espacios && (cont < p1.length)) {
        if (password.charAt(cont) == " ")
            espacios = true;
        cont++;
    }

    if (espacios) {
        alert ("La contraseña no puede contener espacios en blanco");
        return false;
    }
}

function validar(e){
    if (validaNombre() && validaFechaNac() && validarEmail() && validarPaswd()){
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
