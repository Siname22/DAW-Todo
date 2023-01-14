window.addEventListener("load", iniciar);

function iniciar(){

    var cambiaTexto = document.getElementById("cambiaTextos");
    cambiaTexto.addEventListener("click",cambiarTextos);

    var cambiaClase = document.getElementById("cambiaClases");
    cambiaClase.addEventListener("click",cambiarClases);

    var quitaClase = document.getElementById("quitaClases");
    quitaClase.addEventListener("click",quitarClases);

}




function cambiarTextos(){
    var primerParrafo = document.getElementById("parrafo1");
    primerParrafo.innerHTML = "Primer parrafo cambiado";
    //Cojo el dom y lo guadro en var tipo array. cambia la pos2 texto
    var arrayParrafo = new Array();
    arrayParrafo = document.getElementsByTagName("p");
    console.log(arrayParrafo);

    arrayParrafo[1].innerHTML = "Texto cambiando por bytagName";

    var arrayParrafoClassName = new Array();
    arrayParrafoClassName = document.getElementsByClassName("miclase");
    console.log(arrayParrafoClassName);
    arrayParrafoClassName[0].innerHTML="Texto cambiado con color rojo y por byClassName";
}


function cambiarClases(){
    var primerParrafo = document.getElementById("parrafo1");
    primerParrafo.setAttribute("class", "miclase");

    //Segunda parte
    var segundoParrafo = document.getElementById("parrafo2");
    segundoParrafo.setAttribute("class", "miclase");

    var arrayParrafoClassName = new Array();
    arrayParrafoClassName = document.getElementsByClassName("miclase");

    console.log(arrayParrafoClassName);
}

function quitarClases(){
    /*
    //Quitar la clase de parrafo1
    var primerParrafo = document.getElementById("parrafo1");
    primerParrafo.setAttribute("class", "");

    //Segunda parte con ClassNAme
    var arrayParrafoClassName = new Array();
    arrayParrafoClassName = document.getElementsByClassName("miclase");

    console.log(arrayParrafoClassName);
    arrayParrafoClassName[0].setAttribute("class","");
    arrayParrafoClassName[0].setAttribute("class","");
    */

    var arrayParrafosTagName = document.getElementsByTagName("p");
    for (var i = 0; i < arrayParrafosTagName.length; i++) {
        arrayParrafosTagName[i].setAttribute("class", "");
    }
}