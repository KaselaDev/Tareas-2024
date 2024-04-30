<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Pedidos</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

<h1>Productos Disponibles</h1>
    
<div class="productos-container">
    <?php
        $productos_json = file_get_contents("productos.json");
        $productos = json_decode($productos_json, true);
        
        foreach ($productos as $producto) {
            echo "<div class='producto'>";
            echo "<img src='img/".$producto['nombre'].".jpg'>";
            echo "<h2>" . $producto['nombre'] . "</h2>";
            echo "<p>Precio: $" . $producto['precio'] . "</p>";
            echo "<button onclick='agregarAlCarrito(\"" . $producto['nombre'] . "\", " . $producto['precio'] . ")'>Agregar al Carrito</button>";
            echo "</div>";
        }
    ?>
</div>

<div id="productos" style="display: none;">img
    <!-- Aquí se mostrarán los productos -->
    <?php
        // Código PHP para cargar los productos desde tu fuente de datos
        $productos_json = file_get_contents("productos.json");
        $productos = json_decode($productos_json, true);
        
        foreach ($productos as $producto) {
            echo "<div class='producto'>";
            echo "<h2>" . $producto['nombre'] . "</h2>";
            echo "<p>Precio: $" . $producto['precio'] . "</p>";
            echo "<button onclick='agregarAlCarrito(\"" . $producto['nombre'] . "\", " . $producto['precio'] . ")'>Agregar al Carrito</button>";
            echo "</div>";
        }
    ?>
</div>


<div id="carrito">
    <h2>Carrito de Compras</h2>
    <ul id="lista-carrito"></ul>
    <p>Total: $<span id="total"></span></p>
    <button onclick="realizarPedido()">Realizar Pedido</button>
</div>

<script src="scripts.js">
</script>
</body>
</html>