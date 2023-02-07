function iniciar () {
    document.getElementById('formularioEjercicio1').addEventListener('load',cogerDatosSelectDatalist, false);
}

function cogerDatosSelectDatalist() {
    //Mensaje
    var mensaje = document.getElementById("datosGuardados1");
    //Select
    var select = document.getElementById("ej1Select");
    for (var i = 0, iLen = select.options.length; i < iLen; i++) {
        if (select.options[i].selected) {
            var opcionSelectedSelect = select.options[i].value;
        }
    }
    mensaje.innerHTML = "Los datos del select: " + opcionSelectedSelect + ".<br>";
    console.log(mensaje);
    //Datalist
    var getInputValue = document.getElementById("getValueDatalist");

    mensaje.innerHTML+=  "El dato del adatalist es: " + getInputValue.value + ".<br> Las diferencias que hay son:"
    + " <br> En el datalist para coger el dato necesitas ya de por si un input de entrada, entonces con coger el valor " +
        "de lo que selecciones en el input, ya coges el valor. <br>Mientras que en el select no hace falta un input para " +
        "coger el dato seleccionado";
}


function disableSelect(){
    var selectDisabled = document.getElementById("selectDisabled");

    var grupoDisabled = recuperarSeleccionados();

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
    var selectChoseDisableGroup = document.getElementById("selectChoseDisableGroup");
    var grupoDisabled = new Array();
    for (var i = 0, iLen = selectChoseDisableGroup.options.length; i < iLen; i++) {
        if (selectChoseDisableGroup.options[i].selected) {
            grupoDisabled.push(selectChoseDisableGroup.options[i].value);
            console.log(grupoDisabled);
        }
    }
    return grupoDisabled;
}
