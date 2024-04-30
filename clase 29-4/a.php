<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        
$csv_file = 'nomina.csv';


$ventas_por_producto = array();


if (($handle = fopen($csv_file, 'r')) !== false) {
    
    while (($data = fgetcsv($handle, 1000, ',')) !== false) {
        
        if ($data[0] == 'idPedido') {
            continue;
        }

        
        $producto = $data[3];
        $cantidad = intval($data[5]);

        
        if (isset($ventas_por_producto[$producto])) {
            $ventas_por_producto[$producto] += $cantidad;
        } else { 
            $ventas_por_producto[$producto] = $cantidad;
        }
    }
    fclose($handle);
}

foreach ($ventas_por_producto as $producto => $cantidad) {
    echo "Producto: $producto, Cantidad vendida: $cantidad\n";

}
?>

</body>
</html>