window.addEventListener("load", iniciar);

var divPadre;

function iniciar(){
    divPadre = document.getElementById("divPadre");

    var creaParrafo = document.getElementById("creaParrafo");
    creaParrafo.addEventListener("click",crearParrafo);

    var creaImagen = document.getElementById("creaImagen");
    creaImagen.addEventListener("click",crearImagen);

    var borraUltimo = document.getElementById("borraUltimo");
    borraUltimo.addEventListener("click",quitarUltimo);

    var borraPrimero = document.getElementById("borraPrimero");
    borraPrimero.addEventListener("click",quitarPrimero);

    var sustituyePrimeroVacio = document.getElementById("sustituyePrimeroVacio");
    sustituyePrimeroVacio.addEventListener("click",sustituirParrafoVacio);

}

function crearParrafo(){
    var parrafo = document.createElement("p");
    parrafo.setAttribute("class", "miclase");

    var texto = document.getElementById("texto");
    texto.setAttribute("required", "true");
    var textoP = document.createTextNode(texto.value);

    parrafo.appendChild(textoP); //añade texto al div creado.
    // añade el elemento creado y su contenido al DOM
    divPadre.appendChild(parrafo);

}


function crearImagen(){
    var ruta = prompt("Desde donde quieres coger la imagen: Pon la ruta completa");

    var imagen = document.createElement("img");
    imagen.setAttribute("width", "200px");
    imagen.setAttribute("src", ruta);

    divPadre.appendChild(imagen)
    //Falta validaciones

}

function quitarUltimo(){
    var ultimoHijo = divPadre.lastChild;
    divPadre.removeChild(ultimoHijo);
}

function quitarPrimero(){
    var primerHijo = divPadre.firstChild;
    divPadre.removeChild(primerHijo);
}

function sustituirParrafoVacio() {
    var primerHijo = divPadre.firstChild;

    var parrafo = document.createElement("p");
    parrafo.setAttribute("id","Vacio");
    parrafo.innerHTML = "vacio";

    divPadre.replaceChild(parrafo, primerHijo);
}