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
    $texto = strtolower($texto); 
    $vocales = preg_match_all('/[aeiou]/', $texto);
    return $vocales;
}

function invertir_palabras($texto) {
    $palabras = explode(' ', $texto);
    $palabras_invertidas = array_reverse($palabras);
    $texto_invertido = implode(' ', $palabras_invertidas);
    return $texto_invertido;
}






?>