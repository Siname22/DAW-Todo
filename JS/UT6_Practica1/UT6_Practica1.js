window.addEventListener("load", iniciar);

function iniciar(){

    var cambiaTexto = document.getElementById("cambiaTextos");
    verCookie.addEventListener("click",cambiarTextos);

    var cambiaClase = document.getElementById("cambiaClases");
    crearCookie.addEventListener("click",cambiarClases);

    var quitaClase = document.getElementById("quitaClases");
    modificarCookie.addEventListener("click",quitarClases);

}




function cambiarTextos(){
    document.getElementById("parrafo1").innerHTML = "Primer parrafo cambiado"
    //Cojo el dom y lo guadro en var tipo array. cambia la pos2 texto
    document.getElementsByTagName("p")
}


function cambiarClases(){

}

function quitarClases(){

}