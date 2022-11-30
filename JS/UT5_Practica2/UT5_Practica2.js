function iniciar () {
    document.getElementById('formularioEjercicio1').addEventListener('load',cogerDatosSelectDatalist, false);
}

function cogerDatosSelectDatalist() {
    //Mensaje
    var mensaje = document.getElementById("datosGuardados");
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
    var selectChoseDisableGroup = document.getElementById("selectChoseDisableGroup");
    var selectDisabled = document.getElementById("selectDiabled");
}
