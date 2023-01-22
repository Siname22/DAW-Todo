window.addEventListener("load", iniciar);

var div;


function iniciar(){
    div = document.getElementById("div2");
    var creaParrafo = document.getElementById("creaParrafo");
    creaParrafo.addEventListener("click",crearParrafo);

}




function crearParrafo(){
    var p = document.createElement("p");
    p.setAttribute("class", "miclase");

    var texto = document.getElementById("texto");
    var textoP = document.createTextNode(texto.value);

    p.appendChild(textoP); //añade texto al div creado.

    // añade el elemento creado y su contenido al DOM
    div.appendChild(p);

}


function crearImagen(){
    var ruta = prompt("Desde donde quieres coger la imagen: Pon la ruta completa");

    var imagen = document.createElement("img");
    imagen.setAttribute("src", ruta);

    div.appendChild(imagen)
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