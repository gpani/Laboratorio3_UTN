document.getElementById("crear").onclick = function () {
    /* se crea un elemento div nuevo */
    var objDiv = document.createElement("div");
    /* creo el contenido para el div */
    var textoHtml = "<h1>Elemento creado: "
    /* uso childNodes.length para ponerle numero al elemento */
    textoHtml = textoHtml + document.getElementById("contenedor").childNodes.length;

    textoHtml = textoHtml + "</H1>";

    /* asigno el contenido al div creado */
    objDiv.innerHTML = textoHtml;

    // le asigno un estilo 
    objDiv.className = "claseObjetoDinamico";

    // agrego el div creado al contenedor
    document.getElementById("contenedor").appendChild(objDiv);

}

document.getElementById("info").onclick = function () {

    alert("Cantidad de nodos: " +
        document.getElementById("contenedor").childNodes.length
    );

    /* recorro el vector de elementos en el contenedor y muestro su contenido */
    document.getElementById("contenedor").childNodes.forEach((element, index) => {
        alert("index: " + index + " innerHTML: " + element.innerHTML);

    });

}

document.getElementById("limpiar").onclick = function () {

    var nodo = document.getElementById("contenedor");

    // mientras exista un elemento hijo en el contenedor, elimino el ultimo
    while (nodo.firstChild) {
        nodo.removeChild(nodo.lastChild);
    }
}