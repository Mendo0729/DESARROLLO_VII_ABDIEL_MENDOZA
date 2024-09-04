<?php
// Función para calcular el descuento basado en el total de la compra
function calcular_descuento($total_compra) {
    if ($total_compra < 100) {
        return 0; // No hay descuento
    } elseif ($total_compra >= 100 && $total_compra <= 500) {
        return $total_compra * 0.05; // 5% de descuento
    } elseif ($total_compra > 500 && $total_compra <= 1000) {
        return $total_compra * 0.10; // 10% de descuento
    } else {
        return $total_compra * 0.15; // 15% de descuento
    }
}

// Función para aplicar un impuesto del 7% al subtotal
function aplicar_impuesto($subtotal) {
    return $subtotal * 0.07; // 7% de impuesto
}

// Función para calcular el total a pagar
function calcular_total($subtotal, $descuento, $impuesto) {
    return $subtotal - $descuento + $impuesto; // Total = Subtotal - Descuento + Impuesto
}
?>
