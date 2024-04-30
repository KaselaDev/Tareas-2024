<?php
// Procesar pedido del usuario
$productos = $_POST['productos'];
$total = $_POST['total'];

// Aquí puedes agregar el código para almacenar los datos del pedido en la base de datos o en un archivo, etc.
// Por simplicidad, no se incluye esa parte en este ejemplo.

echo "<h1>Pedido Realizado</h1>";
echo "<p>Gracias por su pedido. Total a pagar: $total</p>";
?>
