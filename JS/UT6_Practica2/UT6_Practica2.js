window.addEventListener("load", iniciar);

var divPadre;


function iniciar(){
    divPadre = document.getElementById("divPadre");

    var creaParrafo = document.getElementById("creaParrafo");
    creaParrafo.addEventListener("click",crearParrafo);

    var creaImagen = document.getElementById("creaImagen");
    creaImagen.addEventListener("click",crearImagen);

    var borraUltimo = document.getElementById("borraUltimo");
    borraUltimo.addEventListener("click",borraUltimo);

    var borraPrimero = document.getElementById("borraPrimero");
    borraPrimero.addEventListener("click",borraPrimero);

   // var sustituyeParrafoVacio = document.getElementById("sustituyeParrafoVacio");
    //sustituyeParrafoVacio.addEventListener("click",sustituirParrafoVacio);

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
    imagen.setAttribute("src", ruta);

    divPadre.appendChild(imagen)
    //Falta validaciones


}

function quitarUltimo(){

    var ultimoHijo = div.lastChild;
    div.removeChild(ultimoHijo);
}

function quitarPrimero(){
    var primerHijo = div.firstChild;
    div.removeChild(primerHijo);
}