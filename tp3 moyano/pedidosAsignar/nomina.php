<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      form{
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        grid-template-rows: 1fr 1fr;
        grid-column-gap: 20px;
        grid-row-gap: 20px;
        justify-items: stretch;
        align-items: stretch;
      }
    </style>
</head>
<body>

    <code>
      <form action="nomina.php" method="post">
        <input type="text" name="apellido" placeholder="Ingresar Apellido" required>
        <input type=" text" name="nombre" placeholder="Ingresar Nombre" required>
        <input type="date" name="fechaNacimiento" placeholder="Fecha de nacimento" required>
        <input type="text" name="localidad" placeholder="Ingresar Localidad" required>
        <input type="text" name="provincia" placeholder="Ingresar Provincia" required>
        <input type="submit" name="enviar" value="Enviar">
      </form>
      <hr>
      <table border='1'>
    <?php
      $file = fopen ("nomina.csv","r+");
      $alumnoExistente = false;

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
        if (isset($_POST['enviar'])) {
          $agregarAlumno = "\n".$id.",".$_POST['apellido'].",".$_POST['nombre'].",".$_POST['fechaNacimiento'].",".$_POST['localidad'].",".$_POST['provincia'].",";
          
          if ($alumnoExistente) {
            echo "EL alumno fue agregado anteriormente";
          }
          else {
            fwrite($file,$agregarAlumno);
            echo "Alumno registrado correptamente ☺ \n Recarge la pagina para visualizar";
          }
        }
      
    ?>
    </table>
    </code>

</body>
</html>