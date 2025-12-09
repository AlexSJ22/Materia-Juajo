<!DOCTYPE html>
<html lang="es">

<head>
  <?php
  ini_set('display_errors', 'On');
  error_reporting(E_ALL & ~E_WARNING);
  ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tablas</title>
  <style>
    table {
      margin: auto;
    }

    table th {
      background-color: red;
      padding: 5px;
    }

    table td {
      background-color: lightgray;
      padding: 5px;
    }
  </style>
  <!--
    <link rel="stylesheet" href="style.css">
    -->
</head>

<body>
  <?php
  header('Content-Type: text/html; charset=ISO-8859-1');
  print ("<div>");
  print "<table>";
  print "<tr>";
  print "<th></th>";
  for ($j = 0; $j < 10; $j++) {
    print "<th>" . $j . "</th>";
  }
  print "</tr>";
  for ($i = 0; $i < 26; $i++) {
    print "<tr>";
    print "<th>" . (10 * $i) . "</th>";
    for ($col = 0; $col < 10; $col++) {
      $dato = 10 * $i + $col;
      $dato = (($dato < 32) || ($dato > 255)) ? "0" : $dato;
      $dato = ($dato > 127 && $dato < 161) ? "0" : $dato;
      $dato = ($dato < 128) ? htmlentities(chr($dato)) : chr($dato);
      print "<td>" . chr($dato) . "</td>";
    }
    print "</tr>";
  }
  print "</tr>";
  print "</table>";
  print ("</div>");
  ?>
</body>

</html>