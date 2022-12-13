document.addEventListener("load", iniciar,false);

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
    var selectDisabled = document.getElementById("tiposCategorias");

    var grupoDisabled = recuperarSeleccionados();
    console.log(grupoDisabled);

    selectDisabled.disabled = false;
    if (grupoDisabled.length == 0){
        selectDisabled.disabled = true;
    }

    var inputs = selectDisabled.getElementsByTagName("optgroup");
    for(var i = 0; i < inputs.length; i++) {
        inputs[i].disabled = false;
    }

    for (var i = 0; i < grupoDisabled.length; i++){
        document.getElementById(grupoDisabled[i]).disabled = true;
    }

}

function recuperarSeleccionados(){
    var selectChoseDisableGroup = document.getElementById("optionsCategorias");
    var grupoDisabled = new Array();
    for (var i = 0, iLen = selectChoseDisableGroup.options.length; i < iLen; i++) {
        if (selectChoseDisableGroup.options[i].selected) {
            grupoDisabled.push(selectChoseDisableGroup.options[i].value);
            console.log(grupoDisabled);
        }
    }
    return grupoDisabled;
}
