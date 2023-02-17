window.addEventListener("load", iniciar);
//--------------------------------------------------FUNCIONES-----------------------------------------------------------
function iniciar () {
    cogerConcepto();
    document.getElementById("change").addEventListener("click", cogerDato);
}

function cogerDato(){
    let req = new XMLHttpRequest();
    req.onreadystatechange = function (){
        if (this.readyState === 4 && this.status === 200){
            let jsonTexto = JSON.parse(this.responseText);
            let movimientos = new Movimientos(jsonTexto);
            crearTabla(obtenerObjetosValidos(validaCheckbox(), jsonTexto));
        }
    }
    req.open("GET", "GastosObtenerTodos.php", true);
    req.send();
}
/*
Esta funcion retorna el valor del checkbox que selecciona el usuario
*/
function validaCheckbox(){
    let checkboxGasto = document.getElementById("gastos");
    let checkboxIngreso = document.getElementById("ingresos");
    let validacion = [];
    if (checkboxIngreso.checked){
        validacion.push(checkboxIngreso.value);
    }
    if (checkboxGasto.checked){
        validacion.push(checkboxGasto.value);
    }
    console.log("validacion", validacion);
    return validacion;
    /*
    if (checkboxGasto.checked && checkboxIngreso.checked){
        valGastos = checkboxGasto.value;
        valIngresos = checkboxIngreso.value;
        validacion.push(valGastos, valIngresos);
        console.log("validacion", validacion);
        return validacion;

    }
    if (checkboxIngreso.checked){
        valIngresos = checkboxIngreso.value;
        validacion.push(valIngresos);
        console.log("valIngreso ", validacion);
        return validacion;
    }
    if (checkboxGasto.checked){
        valGastos = checkboxGasto.value;
        validacion.push(valGastos);
        console.log("valGastos: ", validacion);
        return validacion;
    } else{
        return null;
    }
     */

}
/*
Coge el dato retornado de validaCheckBoc() y lo utiliza para saber que datos mostrar en la vista al usuario. Retorna los
datos que necesita enviar
*/
function obtenerObjetosValidos(tipo, movimientos){
    let error = document.getElementById("error");
    error.innerHTML = "";
    if(tipo.length == 0){
        error.innerHTML = "Error, selecciona algún checkbox";
    }else{
        let objetoJson;
        let objetoVal = [];
        for (let i = 0; i < arrayJson.length; i++) {
            objetoJson = arrayJson[i];
            if (tipo.indexOf(objetoJson.Ingreso_gasto) >= 0) {
                objetoVal.push(objetoJson);
                console.log("objetoVal", objetoVal);
            }
        }
        return objetoVal;
    }
}

/*
Coge el dato retornado de obtenerObjetosValidos() y crea una tabla con la longitud exacta de los datos que se mostrarán.
 */
function crearTabla(objJson) {
    let resultado = document.getElementById("resultado");
    resultado.innerHTML = "";
    console.log("objJson", objJson);
    let tabla = document.createElement("table");
    let hilera = document.createElement("tr");
    let columnas = ["ID","INGRESO_GASTO","VALOR","DESCRIPCIÓN","FECHA","ID_CONCEPTO"];
    //--------------------------------------------------sin optimizar---------------------------------------------------
    /*
    let celda = document.createElement("th");
    celda.innerHTML = "ID";
    hilera.appendChild(celda);

    celda = document.createElement("th");
    celda.innerHTML = "INGRESO_GASTO";
    hilera.appendChild(celda);

    celda = document.createElement("th");
    celda.innerHTML = "VALOR";
    hilera.appendChild(celda);

    celda = document.createElement("th");
    celda.innerHTML = "DESCRIPCION";
    hilera.appendChild(celda);

    celda = document.createElement("th");
    celda.innerHTML = "FECHA";
    hilera.appendChild(celda);

    celda = document.createElement("th");
    celda.innerHTML = "ID_CONCEPTO";
    hilera.appendChild(celda);
     */
    //-----------------------------------------------cabecera optimizada------------------------------------------------
    for (let i = 0; i < columnas.length; i++) {

        let celda = document.createElement("th");
        celda.innerHTML = columnas[i];
        hilera.appendChild(celda);
    }
    tabla.appendChild(hilera);
    //--------------------------------------------------sin optimizar---------------------------------------------------
    /*
      let ids = objJson[i].Id;
      let ingresoGastos= objJson[i].Ingreso_gasto;
      let valores = objJson[i].Valor;
      let descripciones = objJson[i].Descripcion;
      let fechas = objJson[i].Fecha;
      let idConceptos = objJson[i].Id_concepto;

      //Meto el texto de los datos
      let id = document.createTextNode(ids);
      let ingresoGasto = document.createTextNode(ingresoGastos);
      let valor = document.createTextNode(valores);
      let descripcion = document.createTextNode(descripciones);
      let fecha = document.createTextNode(fechas);
      let idConcepto = document.createTextNode(idConceptos);

      hilera = document.createElement("tr");

      celda = document.createElement("td");
      celda.appendChild(id);
      hilera.appendChild(celda);

      celda = document.createElement("td");
      celda.appendChild(ingresoGasto);
      hilera.appendChild(celda);

      celda = document.createElement("td");
      celda.appendChild(valor);
      hilera.appendChild(celda);

      celda = document.createElement("td");
      celda.appendChild(descripcion);
      hilera.appendChild(celda);

      celda = document.createElement("td");
      celda.appendChild(fecha);
      hilera.appendChild(celda);

      celda = document.createElement("td");
      celda.appendChild(idConcepto);
      hilera.appendChild(celda);

      tabla.appendChild(hilera);
       */
    //-----------------------------------------datos a mostrar optimizado-----------------------------------------------
    for (let i = 0; i < objJson.length; i ++){
        //Guardo los datos que contiene el objeto
        hilera = document.createElement("tr");
        let datosFila = [
            objJson[i].Id,
            objJson[i].Ingreso_gasto,
            objJson[i].Valor,
            objJson[i].Descripcion,
            objJson[i].Fecha,
            objJson[i].Id_concepto
        ];
        for (let j = 0; j < datosFila.length; j++) {
            let texto = document.createTextNode(datosFila[j]);
            let celda = document.createElement("td");
            celda.appendChild(texto);
            hilera.appendChild(celda);
        }
        // Se añade la fila a la tabla
        tabla.appendChild(hilera);
    }
    console.log(tabla);
    resultado.appendChild(tabla)
}

