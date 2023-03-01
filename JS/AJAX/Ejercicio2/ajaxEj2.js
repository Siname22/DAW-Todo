window.addEventListener("load", iniciar);

function iniciar () {
    document.getElementById("change").addEventListener("click", cogerDato);
}

function cogerDato(){
    var req = new XMLHttpRequest();

    req.onreadystatechange = function (){
        if (this.readyState == 4 && this.status == 200){
            cargarXML(this);
        }
    }
    req.open("GET", "catalogo.xml", true);
    req.send();
}

function cargarXML(xml){
    var body = document.getElementsByTagName("body")[0];
    var coleccion =  xml.responseXML;
    console.log(coleccion);

    var cds = coleccion.getElementsByTagName("CD");
    console.log(cds);
    var tabla = document.createElement("table");
    var hilera = document.createElement("tr");

    var celda = document.createElement("th");
    celda.innerHTML = "ARTISTA";

    hilera.appendChild(celda);

    celda = document.createElement("th");
    celda.innerHTML = "TITULO";

    hilera.appendChild(celda);
    tabla.appendChild(hilera);

    for (var i = 0; i < cds.length; i ++){
        var artistas = cds[i].getElementsByTagName("ARTIST");
        var titulos = cds[i].getElementsByTagName("TITLE");
        var artista = document.createTextNode(artistas[0].textContent);
        var titulo = document.createTextNode(titulos[0].textContent);

        hilera = document.createElement("tr");

        celda = document.createElement("td");
        celda.appendChild(artista);

        hilera.appendChild(celda);

        celda = document.createElement("td");
        celda.appendChild(titulo);

        hilera.appendChild(celda);
        tabla.appendChild(hilera);
    }


    console.log(tabla);
    body.appendChild(tabla);
    tabla.setAttribute("border" ,"1px");
}