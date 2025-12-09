<!DOCTYPE html>
<html lang="es">
  <head>
    <?php
    ini_set('display_errors','On');
    error_reporting(E_ALL& ~E_WARNING);
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablas</title>
    <style>
      table th{
        background-color:red;
      }
      table td{
        background-color:cyan;
      }
    </style>
    <!--
    <link rel="stylesheet" href="style.css">
    -->
  </head>
  <body>
    <?php
    header('Content-Type: text/html; charset=ISO-8859-1');
    print "<table>";
    print "<tr><th>";
    for ($j=0; $j < 10; $j++) { 
    print "<th>".$j."</th>";
    }
    print "</tr>";
    for ($i = 0; $i < 250; $i+=10) {
      print "<tr>";
            print "<th>".$i."</th>"; // Primera columna
            for ($col = 0; $col <= 9; $col++) {
                $value = $i + $col;
                if ($value >= 0 && $value <= 255) {
                    $char = chr($value);
                    print "<td>".$char."</td>";
                } else {
                    print "<td>?</td>";
                }
            }
            print "</tr>";

    /*
    print "<tr>";
    print "<th>" . $i . "</th>";
    print "</tr>";*/
}
    print "</tr></th>";
    print "</table>";
    ?>
  </body>
</html>