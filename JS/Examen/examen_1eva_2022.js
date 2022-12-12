var datosContenido = new Array();
var indice = 1;

//al iniciar se carga la funcion para poder leer el archivo
function iniciar () {
    document.getElementById('file-input').addEventListener('change', leerArchivo, false);
    document.getElementById('nombre').innerHTML = "Contenido del archivo";
}

//leo el arhcivo y guardo el dato
function leerArchivo(e){
    var archivo = e.target.files[0];
    if (!archivo) {
        return;
    }
    var lector = new FileReader();
    lector.readAsText(archivo,"iso-8859-1");
    lector.onload = function(e) {
        var contenido_fichero = e.target.result;
        var contenido = String(contenido_fichero);


        var lineasDatosContenido = contenido.split('\n');
        for (let i = 0; i < lineasDatosContenido.length; i++) {
            datosContenido.push(lineasDatosContenido[i].split("|"));
        }
        console.log(lineasDatosContenido);
        console.log(datosContenido);
        mostrarContenido(datosContenido);

    };

    var procesar = document.getElementById('file-input');
    procesar.style.display="block";
}

//Muestro el contenido
function mostrarContenido(contenido) {
    var nombre = document.getElementById("nombre");
    nombre.value = contenido[indice][0];
    var apellidos = document.getElementById("apellidos");
    apellidos.value = contenido[indice][1];
    var expediente = document.getElementById("expediente");
    expediente.value = contenido[indice][2];
    var faltas = document.getElementById("faltas");
    faltas.value = contenido[indice][3];
    var porcentaje = document.getElementById("porcentaje");
    var resulPorcentaje = (contenido[indice][3] / 115) * 100
    porcentaje.value = resulPorcentaje.toFixed(0);
    var resta = document.getElementById("resta");

    var resultado = (115 * 0.15) -contenido[indice][3];
    resta.value = resultado.toFixed(0);
    //Si el resultado es negativo
    if( resultado < 0){
        resta.value = "Pierde evaluacion continua.";
    }


}


//Al dar siguiente cambia los datos
function cargar_datos_input(){
    indice++;
    if (indice < datosContenido.length){
        mostrarContenido(datosContenido);
    }else{
        alert("Ya no tienes mas alumnos");
    }
}




