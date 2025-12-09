<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        require_once 'datos.php';

        print "<form action=\"procesar_voto.php\" method=\"GET\">\n";

        print "\t<label for=\"votar\">Selecciona un pais para votar</label><br>\n";
        print "\t<select id=\"votar\" name=\"votar\">\n";
        print "\t\t<option>--Seleccione Pais--</option>\n";
        foreach($pais as $p) {
            print "\t\t<option>".$p['nombre']."</option>\n";
        }
        print "\t</select>\n";
        print "\t<button type=\"submit\">Generar Formulario</button>\n";
        print "</form>";
        
    ?>
</body>
</html>