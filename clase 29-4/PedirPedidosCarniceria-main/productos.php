<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos Disponibles</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h1>Productos Disponibles</h1>
    
    <div class="productos-container">
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
</body>
</html>
