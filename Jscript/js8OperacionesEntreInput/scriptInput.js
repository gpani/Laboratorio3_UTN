

document.getElementById("suma").onclick = function () {
    var sum = 
        parseInt(document.getElementById("e1").value) + 
        parseInt(document.getElementById("e2").value) + 
        parseInt(document.getElementById("e3").value);

        document.getElementById("resultado").value = sum;       
}



document.getElementById("promedio").onclick = function () {
    var prom = 
        parseInt(document.getElementById("e1").value) + 
        parseInt(document.getElementById("e2").value) + 
        parseInt(document.getElementById("e3").value);

        document.getElementById("resultado").value = prom/3;       
}


document.getElementById("mayor").onclick = function () {
    var e1 = parseInt(document.getElementById("e1").value);
    var e2 = parseInt(document.getElementById("e2").value);
    var e3 = parseInt(document.getElementById("e3").value);
    var elMayor=0;

    if(e1>e2){
        if(e1>e3){
            elMayor=e1;

        }
        else{
            elMayor=e3;
        }
    }
    else{
        if(e2>e3){
            elMayor=e2;

        }
        else{
            elMayor=e3;
        }
    }

    document.getElementById("resultado").value = elMayor; 


}