window.addEventListener("load", iniciar);

function iniciar(){


    var verCookie = document.getElementById("verTodas");
    verCookie.addEventListener("click",verCookies);

    var crearCookie = document.getElementById("crearCookie");
    crearCookie.addEventListener("click",crearModifCookie);

    var modificarCookie = document.getElementById("modificarCookie");
    modificarCookie.addEventListener("click",crearModifCookie);

    var leerCookie = document.getElementById("leerCookie");
    leerCookie.addEventListener("click",leerCookie);

    var borrarCookie = document.getElementById("borrarCookie");
    borrarCookie.addEventListener("click",borrarCookie);
}

function verCookies(){
    alert("Cookies actuales:\n" + document.cookie)
}

function crearModifCookie(){
    var nombre = prompt("Introduzca el nombre de la cookie:");
    var valor = prompt("Introduzca su valor:");
    var expiracion = parseInt(prompt("Introduzca el número de días para que expire:"));
    setCookie(nombre,valor,expiracion);
    verCookies();
}

function leerCookie(){
    var nombre = prompt("Introduzca el nombre de la cookie a consultar:");
    var resultado = getCookie(nombre);
    alert(resultado)
}

function borrarCookie(){
    var nombre = prompt("Introduzca el nombre de la cookie a borrar:");
    deleteCookie(nombre);

}


function setCookie(nombre, valor, expiracion){
    var d = new Date();
    d.setTime(d.getTime()+expiracion*24*60*60*1000);
    var expiracion = "expires="+d.toUTCString();
    document.cookie = nombre + "=" +valor + ";" + expiracion + ";path=/";
}

function getCookie(nombre){
    var nom = nombre+"=";
    var array = document.cookie.split(";");
    for (var i = 0; i<array.length; i++){
        var c = array[i];
        while (c.charAt(0) = " "){
            c = c.substring(1);
        }
        if (c.indexOf(nombre)==0){
            return c.substring(nombre.length, c.length);
        }
    }
    return "";
}

function deleteCookie(nombre){
    setCookie(nombre,"",0);
}
