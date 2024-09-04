<?php
function contar_palabras($texto) {
    $texto = trim($texto);
    $contador = 0;
    $en_palabra = false;

    for ($i = 0; $i < strlen($texto); $i++) {
        if ($texto[$i] == ' ') {
            if ($en_palabra) {
                $contador++;
                $en_palabra = false;
            }
        } else {
            $en_palabra = true;
        }
    }

    if ($en_palabra) {
        $contador++;
    }

    return $contador;
}


function contar_vocales($texto) {
    $texto = strtolower($texto); // Convertir todo a minúsculas
    $contador = 0;
    $vocales = ['a', 'e', 'i', 'o', 'u']; // Array con las vocales

    // Recorrer cada carácter de la cadena
    for ($i = 0; $i < strlen($texto); $i++) {
        if (in_array($texto[$i], $vocales)) {
            $contador++; // Incrementar el contador si el carácter es una vocal
        }
    }

    return $contador;
}


function invertir_palabras($texto) {
    $palabras = explode(' ', $texto);
    $palabras_invertidas = array_reverse($palabras);
    $texto_invertido = implode(' ', $palabras_invertidas);
    return $texto_invertido;
}






?>