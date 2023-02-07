window.addEventListener("load", iniciar);

var texto;

function iniciar(){
    /*Creo que el for y la seleccion del h2 que hace el cliente debe estar en iniciar porque todavia no
    * se incia la funcion de recorrerAdelante hasta que pinche en algun h2*/
    var comunidadesAutonomas = new Array();
    comunidadesAutonomas = document.getElementsByTagName("h2");
    console.log(comunidadesAutonomas);

    for (i = 0; i < comunidadesAutonomas.length; i++){
        comunidadesAutonomas[i].addEventListener("click",recorrerAdelante);
    }
}

function recorrerAdelante(evento){
    //Consigo la posicion exacta con el parametro evento ( que ya esta predifinido con addevenlistener
    console.log("evento", evento);

    texto = "La comunidad que has elegido es: " + evento.target.innerHTML;
    //Inner html y text son practicamente iguales

    texto +=  " que está situada en el " + evento.target.parentElement.getAttribute("id") +".<br> ";

    texto += recorrerHermanos(evento.target);

    texto += recorrerHijos(evento.target.nextElementSibling);

    var resultado = document.getElementById("textoResultado")
    resultado.innerHTML = texto;

}

function recorrerHermanos(nodoH2){
    var hermano = nodoH2.nextElementSibling;
    console.log(hermano);
    var numProvincias = hermano.childElementCount;

    return "El número de provincias es: " + numProvincias + ".<br>";
}

function recorrerHijos(nodoH2){
    var hijos = nodoH2.children;
    console.log(hijos);
    var nombreProvincias = "Los nombres de las provincia son: <br>";

    for (var i = 0; i < hijos.length; i++) {
        if (hijos[i].innerHTML != null){
            nombreProvincias += hijos[i].innerHTML + "<br>";
        }
    }
    return nombreProvincias;
}
