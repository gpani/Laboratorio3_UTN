document.getElementById("enviar").onclick = function() {

    var confirma = confirm("Seguro que desea enviar?");

    if (!confirma) {
        return;
    }

    var formu = document.getElementById("formulario");

    formu.method = "get";
    formu.action = "./respuesta.html"
    formu.submit();

}

document.getElementById("blanquear").onclick = function() {

    var formu = document.getElementById("formulario");

    formu.reset();

}


/* onkeyup me permite detectar cuando cambia el valor de un campo al soltar la tecla */
document.getElementById("dia").onkeyup = function(){
    var inputObjD =document.getElementById("dia");

    if (!inputObjD.checkValidity()) {
        alert ("El valor ingresado debe ser de 1 a 31");
        inputObjD.value = "";

    }
 
}


document.getElementById("mes").onkeyup = function(){
    var inputObjM =document.getElementById("mes");

    if (!inputObjM.checkValidity()) {
        alert ("El valor ingresado debe ser de 1 a 12");
        inputObjM.value = "";

    }
 
}