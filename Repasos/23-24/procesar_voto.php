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

        if ($_GET['votar'] == "--Seleccione Pais--") {
            print "<h1 style=\"Color: red; text-align: center;\" >Ese no es un pais</h1>";
            return;
        }

        print "<form action=\"show_votos.php\" method=\"GET\">";
        print "\t<fieldset>\n";
        print "\t<legend>Votos de ".$_GET['votar']."</legend>\n";
        print "\t<input type=\"hidden\" name=\"votante\" value=\"".$_GET['votar']."\">\n";

        print "\t\t<label for=\"12puntos\">12 puntos para </label>\n";
        print "\t\t<select id=\"12puntos\" name=\"puntos[12]\">\n";
        print "\t\t\t<option value=\"-1\">--Seleccione Pais--</option>\n";
        foreach($pais as $clave => $p) {
            print "\t\t\t<option value=\"".$clave."\">".$p['nombre']."</option>\n";
        }
        print "\t\t</select>\n";

        print "\t\t<br>\n";
        print "\t\t<br>\n";

        print "\t\t<label for=\"10puntos\">10 puntos para </label>\n";
        print "\t\t<select id=\"10puntos\" name=\"puntos[10]\">\n";
        print "\t\t\t<option value=\"-1\">--Seleccione Pais--</option>\n";
        foreach($pais as $clave => $p) {
            print "\t\t\t<option value=\"".$clave."\">".$p['nombre']."</option>\n";
        }
        print "\t\t</select>\n";

        print "\t\t<br>\n";
        print "\t\t<br>\n";

        print "\t\t<label for=\"8puntos\">8 puntos para </label>\n";
        print "\t\t<select id=\"8puntos\" name=\"puntos[8]\">\n";
        print "\t\t\t<option value=\"-1\">--Seleccione Pais--</option>\n";
        foreach($pais as $clave => $p) {
            print "\t\t\t<option value=\"".$clave."\">".$p['nombre']."</option>\n";
        }
        print "\t\t</select>\n";

        print "\t\t<br>\n";
        print "\t\t<br>\n";

        print "\t\t<label for=\"7puntos\">7 puntos para </label>\n";
        print "\t\t<select id=\"7puntos\" name=\"puntos[7]\">\n";
        print "\t\t\t<option value=\"-1\">--Seleccione Pais--</option>\n";
        foreach($pais as $clave => $p) {
            print "\t\t\t<option value=\"".$clave."\">".$p['nombre']."</option>\n";
        }
        print "\t\t</select>\n";

        print "\t\t<br>\n";
        print "\t\t<br>\n";

        print "\t\t<label for=\"6puntos\">6 puntos para </label>\n";
        print "\t\t<select id=\"6puntos\" name=\"puntos[6]\">\n";
        print "\t\t\t<option value=\"-1\">--Seleccione Pais--</option>\n";
        foreach($pais as $clave => $p) {
            print "\t\t\t<option value=\"".$clave."\">".$p['nombre']."</option>\n";
        }
        print "\t\t</select>\n";

        print "\t\t<br>\n";
        print "\t\t<br>\n";

        print "\t\t<label for=\"5puntos\">5 puntos para </label>\n";
        print "\t\t<select id=\"5puntos\" name=\"puntos[5]\">\n";
        print "\t\t\t<option value=\"-1\">--Seleccione Pais--</option>\n";
        foreach($pais as $clave => $p) {
            print "\t\t\t<option value=\"".$clave."\">".$p['nombre']."</option>\n";
        }
        print "\t\t</select>\n";

        print "\t\t<br>\n";
        print "\t\t<br>\n";

        print "\t\t<label for=\"4puntos\">4 puntos para </label>\n";
        print "\t\t<select id=\"4puntos\" name=\"puntos[4]\">\n";
        print "\t\t\t<option value=\"-1\">--Seleccione Pais--</option>\n";
        foreach($pais as $clave => $p) {
            print "\t\t\t<option value=\"".$clave."\">".$p['nombre']."</option>\n";
        }
        print "\t\t</select>\n";

        print "\t\t<br>\n";
        print "\t\t<br>\n";

        print "\t\t<label for=\"3puntos\">3 puntos para </label>\n";
        print "\t\t<select id=\"3puntos\" name=\"puntos[3]\">\n";
        print "\t\t\t<option value=\"-1\">--Seleccione Pais--</option>\n";
        foreach($pais as $clave => $p) {
            print "\t\t\t<option value=\"".$clave."\">".$p['nombre']."</option>\n";
        }
        print "\t\t</select>\n";

        print "\t\t<br>\n";
        print "\t\t<br>\n";
        
        print "\t\t<label for=\"2puntos\">2 puntos para </label>\n";
        print "\t\t<select id=\"2puntos\" name=\"puntos[2]\">\n";
        print "\t\t\t<option value=\"-1\">--Seleccione Pais--</option>\n";
        foreach($pais as $clave => $p) {
            print "\t\t\t<option value=\"".$clave."\">".$p['nombre']."</option>\n";
        }
        print "\t\t</select>\n";

        print "\t\t<br>\n";
        print "\t\t<br>\n";

        print "\t\t<label for=\"1puntos\">1 puntos para </label>\n";
        print "\t\t<select id=\"1puntos\" name=\"puntos[1]\">\n";
        print "\t\t\t<option value=\"-1\">--Seleccione Pais--</option>\n";
        foreach($pais as $clave => $p) {
            print "\t\t\t<option value=\"".$clave."\">".$p['nombre']."</option>\n";
        }
        print "\t\t</select>\n";

        print "\t</fieldset>\n";

        print "\t<button type=\"submit\">Enviar votos</button>\n";


    ?>

</body>
</html>