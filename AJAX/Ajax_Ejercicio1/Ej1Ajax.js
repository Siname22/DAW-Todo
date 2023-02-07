window.addEventListener("load", iniciar);

function iniciar () {
    document.getElementById("change").addEventListener("click", cambiaContenido);
}

function cambiaContenido(){
    var req = new XMLHttpRequest();

    req.onreadystatechange = function (){
        if (this.readyState == 4 && this.status == 200){
            document.getElementById("changeText").innerHTML = this.responseText;
        }
    }
    req.open("GET", "holamundo.txt", true);
    req.send();
}