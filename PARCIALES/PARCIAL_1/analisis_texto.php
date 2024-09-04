<?php
include 'utilidades_texto.php';

$frases = [
    "Hola mundo este es un ejemplo",
    "Jugar al futbol es divertido",
    "Leer ayuda a tu mente a aprender cosas nuevas"
];

echo "<table border='1'>";
echo "<tr>
        <th>Frase</th>
        <th>Contar Palabras</th>
        <th>Contar Vocales</th>
        <th>Invertir Palabras</th>
      </tr>";

foreach ($frases as $frase) {
    $num_palabras = contar_palabras($frase);
    $num_vocales = contar_vocales($frase);
    $frase_invertida = invertir_palabras($frase);

    echo "<tr>";
    echo "<td>$frase</td>";
    echo "<td>$num_palabras</td>";
    echo "<td>$num_vocales</td>";
    echo "<td>$frase_invertida</td>";
    echo "</tr>";
}

echo "</table>";
?>
