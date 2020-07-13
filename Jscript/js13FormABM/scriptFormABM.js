
function habilitarBlanqueo(){
    var inputObjA = document.getElementById("apellido");
    var inputObjN = document.getElementById("nombre");
    var inputObjS = document.getElementById("saldo");

    if (inputObjA.checkValidity() || 
        inputObjN.checkValidity() ||
        inputObjS.checkValidity() ) {
        document.getElementById("blanquear").disabled = false;
    } else {
        document.getElementById("blanquear").disabled = true;
    }

    if (inputObjA.checkValidity() && 
        inputObjN.checkValidity() &&
        inputObjS.checkValidity() ) {
        document.getElementById("alta").disabled=false;
        document.getElementById("modi").disabled=false;
        document.getElementById("baja").disabled=false;
    } else {
        document.getElementById("alta").disabled=true;
        document.getElementById("modi").disabled=true;
        document.getElementById("baja").disabled=true;
    }
}

document.getElementById("apellido").onkeyup = function(){
    habilitarBlanqueo();
}

document.getElementById("nombre").onkeyup = function(){
    habilitarBlanqueo();
}

document.getElementById("saldo").onkeyup = function(){
    habilitarBlanqueo();
}



document.getElementById("blanquear").onclick = function() {

    var objBtnB = document.getElementById("formulario");

    objBtnB.reset();

    document.getElementById("blanquear").disabled=true;
    document.getElementById("alta").disabled=true;
    document.getElementById("modi").disabled=true;
    document.getElementById("baja").disabled=true;
}


document.getElementById("alta").onclick = function() {
 
    var formu = document.getElementById("formulario");

    formu.method = "get";
    formu.action = "./respuestaAlta.html"
    formu.target = "_blank"
    formu.submit();
   
}

document.getElementById("modi").onclick = function() {
   
    var formu = document.getElementById("formulario");

    formu.method = "get";
    formu.action = "./respuestaModi.html"
    formu.target = "_blank"
    formu.submit();
   
   
}

document.getElementById("baja").onclick = function() {

    var formu = document.getElementById("formulario");

    formu.method = "get";
    formu.action = "./respuestaBaja.html"
    formu.target = "_blank"
    formu.submit();
   
}