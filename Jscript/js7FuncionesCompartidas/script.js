


var acumulador=0;

/* el operador += "1" concatena un String a otro */
document.getElementById("numeral1").onclick = function () {
    document.getElementById("x").value += "1" 
}


document.getElementById("numeral2").onclick = function () {
    document.getElementById("x").value += "2" 
}

document.getElementById("numeral3").onclick = function () {
    document.getElementById("x").value += "3" 
}
document.getElementById("numeral4").onclick = function () {
    document.getElementById("x").value += "4" 
}
document.getElementById("numeral5").onclick = function () {
    document.getElementById("x").value += "5" 
}
document.getElementById("numeral6").onclick = function () {
    document.getElementById("x").value += "6" 
}
document.getElementById("numeral7").onclick = function () {
    document.getElementById("x").value += "7" 
}
document.getElementById("numeral8").onclick = function () {
    document.getElementById("x").value += "8" 
}
document.getElementById("numeral9").onclick = function () {
    document.getElementById("x").value += "9" 
}

/* borra el contenido del input poniendoles un string vacio  */
document.getElementById("borraDisplay").onclick = function () {
    document.getElementById("x").value = "";
}

/* suma lo ingresado en un acumulador */
document.getElementById("sumador").onclick = function () {
    acumulador = acumulador + parseInt(document.getElementById("x").value);
}

/* muestra el total acumulado */
document.getElementById("mostarAcumulador").onclick = function () {
    alert(acumulador);
}

/* le asigna 0 al acumulador  */
document.getElementById("borraAcumulador").onclick = function () {
    acumulador=0;
}


