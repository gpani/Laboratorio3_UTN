<html>

<body>
<style>
                .center {

                        display: block;
                        margin-left: auto;
                        margin-right: auto;
                }

                table {
                    border: 1px solid black;
                }

                tbody {
                    background-color: pink;
                }
        </style>

        <img class="center" src="../../contenido/unnamed.jpg" width="450" height="98" />

<p><strong>Escrito fuera de las marcas PHP.</strong></p>
<hr>

<?php
//echo es la funcion que imprime lo queres mostrar en php
echo '<p><strong>Esta sentencia sale desde un <span style="color:violet"> echo </span>.</strong></p>';

echo '<hr>';

/* comentarios en PHP */
$variable = 'valor1';

echo "<p><strong>Muestro la variable <span style=\"color:violet\">\$variable</span>: $variable (sin concatenar).</strong></p>";
echo "<p><strong>Muestro la variable <span style=\"color:violet\">\$variable</span>: " . $variable . " (concatenando).</strong></p>";
echo '<hr>';

$booleano = true;

echo "<p><strong>Muestro la variable (verdadera)<span style=\"color:violet\">\$booleano</span>: $booleano</strong></p>";
$booleano = false;
echo "<p><strong>Muestro la variable (falso)<span style=\"color:violet\">\$booleano</span>: $booleano</strong></p>";
echo '<hr>';

define("VARCONSTANTE","Constante");

echo "<p><strong><span style=\"color:violet\">\$VARCONSTANTE</span>: " . VARCONSTANTE . "</strong></p>";
echo "<p><strong>Tipo de <span style=\"color:violet\">VARCONSTANTE</span>: " . gettype(VARCONSTANTE) . "</strong></p>";

echo '<hr>';
echo "<p><strong>Arreglos:</strong></p>";

$Arreglo = ["Hola", "Maitei"];
echo "<p><strong><span style=\"color:red\">\$Arreglo[0]</span>: $Arreglo[0]</strong></p>";
echo "<p><strong><span style=\"color:red\">\$Arreglo[1]</span>: $Arreglo[1]</strong></p>";

echo "<p><strong>Tipo de <span style=\"color:red\">\$Arreglo</span>: " . gettype($Arreglo) . "</strong></p>";
echo "<p><strong>Se agrega por programa dos elementos</strong></p>";
echo "<p><strong>Todos los elementos originales y agregados</strong></p>";
array_push($Arreglo, "Hello", "Ciao");
echo "<ul><li><strong><span style=\"color:red\"></span> $Arreglo[0]</strong></li>";
echo "<li><strong><span style=\"color:red\"></span> $Arreglo[1]</strong></li>";
echo "<li><strong><span style=\"color:red\"></span> $Arreglo[2]</strong></li>";
echo "<li><strong><span style=\"color:red\"></span> $Arreglo[3]</strong></li></ul>";

echo "<p><strong>Arreglo de dos dimensiones</strong></p>";

$tipos = ["PC","Web","SQL","Frameworks"];

$lenguajes = [
    0 => ["C", "Python", "Java"],
    1 => ["HTML", "Javascript", "PHP"],
    2 => ["MySQL", "PostreSQL", "SQLServer"],
    3 => ["React", "Numpy", "Bootstrap"]
];

//imprime los encabezados de la tabla
echo "<table><thead><tr>";
foreach ($tipos as $tipo) {
    echo "<th>$tipo</th>";
}
//imprime el cuerpo de la tabla
echo "</tr></thead><tbody>";

for ($i=0; $i<3; $i++){
    echo "<tr><td>" 
        . $lenguajes[0][$i] . "</td><td>" 
        . $lenguajes[1][$i] . "</td><td>" 
        . $lenguajes[2][$i] . "</td><td>" 
        . $lenguajes[3][$i] . "</td></tr>";
}

//termina de imprimir la tabla
echo "</tbody></table><br>";

echo "<p><strong>Valor de <span style=\"color:red\">\$lenguajes[1][2/]</span>: ". $lenguajes[1][2] . "</strong></p>";

echo "<p><strong>Cantidad de elementos de diccionario: ". count($lenguajes[0]) . "</strong></p>";

echo "<h1>Variables de tipo arreglo asociativo</h1>";

$lenguaje = [
    "nombre" => "C",
    "tipo" => "Compilado",
    "autor" => "Dennis Ritchie",
    "año"=>1969
];

echo "<p>Lenguaje: ". $lenguaje["nombre"] . "</p>";
echo "<p>Tipo de lenguaje: ". $lenguaje["tipo"] . "</p>";
echo "<p>Creado por: ". $lenguaje["autor"] . "</p>";
echo "<p>Año de creación: ". $lenguaje["año"] . "</p>";

echo '<hr>';
echo "<h1>Expresiones aritméticas</h1>";

$x = 3;
echo "<p><strong>La variable <span style=\"color:violet\">\$x </span>tiene el siguente valor : $x</strong></p>";


$y = 4;
echo "<p><strong>La variable <span style=\"color:violet\">\$y </span>tiene el siguente valor : $y</strong></p>";
echo "<p><strong>Tipo de <span style=\"color:blue\">\$x</span>: " . gettype($x) . "</strong></p>";
echo "<p><strong>Tipo de <span style=\"color:blue\">\$y</span>: " . gettype($y) . "</strong></p>";

$suma = $x + $y;
echo "<p><strong>La suma de <span style=\"color:violet\"></span> (\$x + \$y) es: $suma</strong></p>";

$multi = $x * $y;
echo "<p><strong>La multiplicación de <span style=\"color:violet\"></span> (\$x + \$y) es: $multi</strong></p>";
$divi = $x / $y;
echo "<p><strong>La división de <span style=\"color:violet\"></span> (\$x + \$y) es: $divi</strong></p>";
?>

        <br/>
        <br/>
        <br/>
        <footer>
                Gessica Paniagua
                <br />

                <a href="mailto:gessi.paniagua@gmail.com">gessi.paniagua@gmail.com</a>

                <br />

                <p>Copyright 2020 by <a target="_blank" href="https://github.com/gpani">@gpani</a></p>
        </footer>


</body>





</html>