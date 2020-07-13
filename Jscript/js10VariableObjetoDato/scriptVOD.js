
var personas=[
    {nombre: "Gessica", apellido: "Paniagua", fecha:"12/12/12"},
    {nombre: "Pepe", apellido: "Mujica", fecha:"11/13/15"}
];

function listarPersonas() {
    var contenido = "<h2>Presentación</h2><table>";
    
    personas.forEach(per=>{
        contenido += "<tr><td>" + per['nombre'] + "</td><td>" + per['apellido'] + "</td><td>" + per['fecha'] + "</td></tr>";
    });

    contenido += "</table><p>Cantidad de elementos: " + personas.length + "</p>";


    /*innerHTML permite asiganar contenido html a un elemento en este caso un div*/    
    document.getElementById("resultado").innerHTML = contenido;

}

document.getElementById("cargarDatos").onclick = function () {

    var nombre = document.getElementById("nombre").value;
    if(nombre ==""){
        alert("falta completar el campo nombre");
        return;
    };
    var apellido = document.getElementById("apellido").value;
    if(apellido ==""){
        alert("falta completar el campo apellido");
        return;
    };
    var fecha = document.getElementById("fecha").value;
    if(fecha ==""){
        alert("falta completar el campo fecha");
        return;
    };
    personas.push({nombre: nombre,apellido: apellido,fecha: fecha});

    listarPersonas();
}


document.getElementById("lisPer").onclick = function () {
    
    document.getElementById("resultado").style = "display: unset";
    listarPersonas();

};


document.getElementById("oculta").onclick = function () {

    document.getElementById("resultado").style = "display: none";

}