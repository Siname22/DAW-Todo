window.addEventListener("load", iniciar);

//---------------------------------------------------CLASES-------------------------------------------------------------

//--------------------------------------------------CONCEPTOS-----------------------------------------------------------
/*
Las clases Conceptos y Concepto van orientadas al archivo ConceptosObtenerTodos.php.
La clase Conceptos se encarga de las funciones necesarias para la muestra de datos en la vista.
La clase Concepto es la que contiene la estructura que tiene la tabla conceptos en la base de datos.
 */
class Conceptos {
    constructor(jsonArray) {
        this.concepto = [];
        for (let i = 0; jsonArray != null && i < jsonArray.length; i++) {
            this.concepto.push(new Concepto(jsonArray[i]));
        }
    }
    /*
    Como queremos mostrar la tabla Gastos, esta contiene la FK de IdConcepto, lo que queremos es relacionar la id con el
    nombre que corresponda a ese dato de la FK.
     */
    getNombrePorId(id){
        for (let i = 0; i < this.concepto.length; i++) {
            if (id === this.concepto[i].id){
                return this.concepto[i].nombre;
            }
        }
    }

}

class Concepto{
    constructor(json) {
        this.id = json.id;
        this.nombre = json.nombre;
    }
}
//-------------------------------------------------MOVIMIENTOS----------------------------------------------------------
/*
Las clases Movimientos y Movimeinto van orientadas al archivo GastosObtenerTodos.php.
La clase Movimeintos es la que contiene las funciones necesarias para la muestra de datos en la vista.
La clase Movimiento es la que contiene la estructura que tiene la tabla gastos en la base de datos.
 */
class Movimientos {
    constructor(jsonArray) {
        this.movimientos = [];
        for (let i = 0; jsonArray != null && i < jsonArray.length; i++) {
            this.movimientos.push(new Movimiento(jsonArray[i]));
        }
    }
    size(){
        return this.movimientos.length;
    }
    getMovimiento(posicion){
        return this.movimientos[posicion];
    }
    add(movimiento){
        this.movimientos.push(movimiento);
    }
}

class Movimiento{
    constructor(json) {
        this.id = json.Id;
        this.ingreso_gasto = json.Ingreso_gasto;
        this.valor = json.Valor;
        this.descripcion = json.Descripcion;
        this.fecha = json.Fecha;
        this.id_concepto = json.Id_concepto;
    }
}
//--------------------------------------------------FUNCIONES-----------------------------------------------------------
function iniciar () {
    cogerConcepto();
    document.getElementById("change").addEventListener("click", cogerDato);
}
//--------------------------------------------------CONCEPTOS-----------------------------------------------------------
var conceptos;
function cogerConcepto() {
    let req = new XMLHttpRequest();
    req.onreadystatechange = function (){
        if (this.readyState === 4 && this.status === 200){
            let jsonTexto = JSON.parse(this.responseText);
            conceptos = new Conceptos(jsonTexto);
        }
    }
    req.open("GET", "ConceptosObtenerTodos.php", true);
    req.send();
}


//---------------------------------------------------GASTOS-------------------------------------------------------------
function cogerDato(){
    let req = new XMLHttpRequest();
    req.onreadystatechange = function (){
        if (this.readyState === 4 && this.status === 200){
            let jsonTexto = JSON.parse(this.responseText);
            let movimientos = new Movimientos(jsonTexto);
            crearTabla(obtenerObjetosValidos(validaCheckbox(), movimientos));
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

}
/*
Coge el dato retornado de validaCheckBoc() y lo utiliza para saber que datos mostrar en la vista al usuario. Retorna los
datos que necesita enviar
*/
function obtenerObjetosValidos(tipo, movimientos){
    let error = document.getElementById("error");
    error.innerHTML = "";
    if(tipo.length === 0){
        error.innerHTML = "Error, selecciona algún checkbox";
    }else{
        let movimientosVal = new Movimientos();
        for (let i = 0; i < movimientos.size(); i++) {
            if (tipo.indexOf(movimientos.getMovimiento(i).ingreso_gasto) >= 0) {
                movimientosVal.add(movimientos.getMovimiento(i));
                console.log("movimiento", movimientosVal);
            }
        }
        return movimientosVal;
    }
}

/*
Coge el dato retornado de obtenerObjetosValidos() y crea una tabla con la longitud exacta de los datos que se mostrarán.
 */
function crearTabla(movimientos) {
    let resultado = document.getElementById("resultado");
    resultado.innerHTML = "";
    console.log("movimientos", movimientos);
    let tabla = document.createElement("table");
    let hilera = document.createElement("tr");
    let columnas = ["ID","INGRESO_GASTO","VALOR","DESCRIPCIÓN","FECHA","NOMBRE_CONCEPTO"];
    for (let i = 0; i < columnas.length; i++) {
        let celda = document.createElement("th");
        celda.innerHTML = columnas[i];
        hilera.appendChild(celda);
    }
    tabla.appendChild(hilera);

    for (let i = 0; i < movimientos.size(); i ++){
        //Guardo los datos que contiene el objeto
        hilera = document.createElement("tr");
        let datosFila = [
            movimientos.getMovimiento(i).id,
            movimientos.getMovimiento(i).ingreso_gasto,
            movimientos.getMovimiento(i).valor,
            movimientos.getMovimiento(i).descripcion,
            movimientos.getMovimiento(i).fecha,
            //Cambio el id_concepto por el nombre
            conceptos.getNombrePorId(movimientos.getMovimiento(i).id_concepto)
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

    resultado.appendChild(tabla);
}

