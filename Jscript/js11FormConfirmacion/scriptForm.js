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