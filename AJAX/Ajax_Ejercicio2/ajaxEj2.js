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
    var tblBody = document.createElement("tbody");
    var hileraHEADArtista = document.createElement("td");
    var txthileraArtista = document.createElement("h4");
    txthileraArtista.innerHTML = "ARTISTA";
    hileraHEADArtista.innerHTML = txthileraArtista.textContent

    var hileraHEADTitulo = document.createElement("td");
    var txthileraTitulo = document.createElement("h4");
    txthileraTitulo.innerHTML = "TITULO";
    hileraHEADTitulo.innerHTML =  txthileraTitulo.textContent;

    var hileraArtista = document.createElement("td");
    var hileraTitulo = document.createElement("td");

    for (var i = 0; i < cds.length; i ++){
        var artistas = cds[i].getElementsByTagName("ARTIST");
        var titulos = cds[i].getElementsByTagName("TITLE");
        var artista = document.createTextNode(artistas[0].textContent);
        var titulo = document.createTextNode(titulos[0].textContent);


        var celdaArtista= document.createElement("tr");
        var celdaTitulo= document.createElement("tr");
        celdaArtista.appendChild(artista);
        celdaTitulo.appendChild(titulo);

        hileraArtista.appendChild(celdaArtista);
        hileraTitulo.appendChild(celdaTitulo);
        hileraHEADArtista.appendChild(hileraArtista);
        hileraHEADTitulo.appendChild(hileraTitulo);
    }
    tblBody.appendChild(hileraHEADArtista);
    tblBody.appendChild(hileraHEADTitulo);
    tabla.appendChild(tblBody);
    console.log(tblBody);
    body.appendChild(tabla);
    hileraHEADTitulo.setAttribute("text-align", "center");
    tabla.setAttribute("border" ,"1px");
}