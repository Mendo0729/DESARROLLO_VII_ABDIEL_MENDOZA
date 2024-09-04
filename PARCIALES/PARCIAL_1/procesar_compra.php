<?php
include 'tienda.php';

// Array de productos con sus precios
$productos = [
    'camisa' => 50,
    'pantalon' => 70,
    'zapatos' => 80,
    'calcetines' => 10,
    'gorra' => 25
];

// Array que simula un carrito de compras
$carrito = [
    'camisa' => 2,
    'pantalon' => 1,
    'zapatos' => 1,
    'calcetines' => 3,
    'gorra' => 0
];

// Calcular el subtotal
$subtotal = 0;
foreach ($carrito as $producto => $cantidad) {
    if ($cantidad > 0) {
        $subtotal += $productos[$producto] * $cantidad;
    }
}

// Calcular el descuento, impuesto y total a pagar
$descuento = calcular_descuento($subtotal);
$impuesto = aplicar_impuesto($subtotal);
$total = calcular_total($subtotal, $descuento, $impuesto);

// Mostrar el resumen de la compra en formato HTML
echo "<h2>Resumen de la Compra</h2>";
echo "<table border='1'>";
echo "<tr>
        <th>Producto</th>
        <th>Cantidad</th>
        <th>Precio Unitario</th>
        <th>Subtotal</th>
      </tr>";

foreach ($carrito as $producto => $cantidad) {
    if ($cantidad > 0) {
        $precio_unitario = $productos[$producto];
        $subtotal_producto = $precio_unitario * $cantidad;
        echo "<tr>";
        echo "<td>$producto</td>";
        echo "<td>$cantidad</td>";
        echo "<td>$$precio_unitario</td>";
        echo "<td>$$subtotal_producto</td>";
        echo "</tr>";
    }
}

echo "</table>";

echo "<p><strong>Subtotal: </strong>$$subtotal</p>";
echo "<p><strong>Descuento aplicado: </strong>$$descuento</p>";
echo "<p><strong>Impuesto: </strong>$$impuesto</p>";
echo "<p><strong>Total a pagar: </strong>$$total</p>";
?>
