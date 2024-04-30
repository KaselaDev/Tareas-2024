<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js" integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
    <style>
      form{
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-column-gap: 20px;
        grid-row-gap: 20px;
        justify-items: stretch;
        align-items: stretch;
        background-color: slategray;
        padding: 20px;
        
      }
      form input{
        height: 35px;
      }
      a{
        display: block;
        padding: 10px;
        background-color: gold;
      }
      .a{
        font-size: 30px;
      }
    </style>
</head>
<body>

    <code>
      <form action="nomina.php">
        <input type="text" name="apellido" placeholder="Ingresar Apellido del cliente" required>
        <input type=" text" name="nombre" placeholder="Ingresar Nombre del cliente" required>
        <input type="text" name="fechaNacimiento" placeholder="Producto" required>
        <input type="text" name="localidad" placeholder="Ingresar Localidad" required>
        <input type="text" name="provincia" placeholder="Cantidad" required>
        <input type="submit" name="enviar" value="Enviar">
        <p></p>
        <a href="nomina.php">Recargar</a>
      </form>
      <hr>
      <main>
        <table border='1'>
          <?php
            $file = fopen ("nomina.csv","r+");
            $alumnoExistente = false;
            $cont = -1;
              while(!feof($file)){
                      $row = fgets($file);
                      $aRow = explode (",",$row);
                      
                      echo "<tr>
                      <td>".$aRow[0]."</td>
                      <td>".$aRow[1]."</td>
                      <td>".$aRow[2]."</td>
                      <td>".$aRow[3]."</td>
                      <td>".$aRow[4]."</td>
                      <td>".$aRow[5]."</td>
                    </tr>";
                    
                    $id = 1 + intval($aRow[0]);
                    
              }
              if (isset($_GET['enviar'])) {
                $agregarAlumno = "\n".$id.",".$_GET['apellido'].",".$_GET['nombre'].",".$_GET['fechaNacimiento'].",".$_GET['localidad'].",".$_GET['provincia'].",";
                
                if ($alumnoExistente) {
                  echo "EL alumno fue agregado anteriormente";
                }
                else {
                  fwrite($file,$agregarAlumno);
                  echo "Alumno registrado correptamente ☺ \n Recarge la pagina para visualizar";
                }
              }
              fclose($file);
              
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

              
              ?>

          </table>
          
      </main>
      <hr>
      <div class="a">
        <?php
          foreach ($ventas_por_producto as $producto => $cantidad) {
            echo "-$producto, Cantidad vendida: $cantidad <br>";
        
        }
        ?>
      </div>
    </code>

</body>
</html>