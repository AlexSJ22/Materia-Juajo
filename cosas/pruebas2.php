<!--<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL && ~E_DEPRECATED);
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="14_calendario.css">
</head>

<body>-->
<?php
/**
 * Summary of calendarioMes
 * @param mixed $mes
 * @param mixed $anho
 * @param mixed $mostrarAnho
 * @return bool
 */
function calendarioMes($mes = null, $anho = null, $mostrarAnho = null)
{
    setlocale(LC_ALL, "es_ES.utf8", "Spanish_Spain.utf8");
    if (is_null($mes) && is_null($anho)) {
        $mes = strftime("%m");
        $anho = strftime("%Y");
    } elseif (is_null($mes)) {
        $mes = strftime("%m");
    } elseif (is_null($anho)) {
        $anho = strftime("%Y");
    }
    $fecha = mktime(0, 0, 0, $mes, 1, $anho);
    if (!$fecha) {
        print ("<p>La fecha es incorrecta</p>");
        return false;
    }
    $un_lunes = strtotime("31-10-2022");
    $ultimo = date('t', $fecha);
    $dia_semana_inicio = date('w', $fecha);// 0 domingo .... 6 sábado
    $huecos = ($dia_semana_inicio - 1 + 7) % 7;
    $dia = (1 - $huecos);

    print ($mes);
    print (" ");
    print ($anho);
    /*Comienzo de la tabla */
    print "<table class=\"mes\">\n";
    print ("<tr>");
    print "\t<thead>\n";
    print "\t\t<tr>\n";
    print "\t\t\t<th colspan=\"7\"> ";
    print ucfirst(strftime("%B", $fecha));
    if ($mostrarAnho) {
        print (" " . $anho);
    } else {
        print "</th>\n";
    }
    /*print " $anho</th>\n";*/
    print "</thead>";
    print "\t\t</tr>\n";
    print "<tbody>";
    print "\t\t</tr>\n";

    for ($i = 0; $i < 7; $i++) {
        print "\t\t\t<th>" . ucfirst(strftime('%a', $un_lunes + $i * 24 * 60 * 60)) . "</th>\n";
    }
    print "\t\t</tr>\n";
    print "\t</thead>\n";
    while ($dia <= $ultimo) {//Mientras me queden dias
        print "\t\t\t<tr>\n";
        for ($i = 0; $i < 7; $i++) {//Escribo una semana
            print "\t\t\t\t<td>";
            // print $dia;
            print (($dia > 0) && ($dia <= $ultimo)) ? $dia : "";
            print "</td>\n";
            $dia++;
        }
        print "\t\t\t</tr>\n";

    }
    print "\t</tbody>\n";

    print ("</tr>");
    print ("</table>");
}
function calendarioAnho($anho = null)
{
    if (!isset($anho)) {
        $anho = date("Y");
    }
    $mes = date("n");
    setlocale(LC_ALL, "es_ES.utf8", "Spanish_Spain.utf8");

    $fecha = mktime(0, 0, 0, $mes, 1, $anho);

    $ultimo = date('t', $fecha);

    $dia_semana_inicio = date('w', $fecha);// 0 domingo .... 6 sábado

    $huecos = ($dia_semana_inicio - 1 + 7) % 7;


    $dia = (1 - $huecos);

    print "<table class=\"mes\">\n";
    /* Inicio de cabecera */
    print "\t<thead>\n";
    print "\t\t<tr>\n";
    print "\t\t\t<th colspan=\"7\"> ";
    print ucfirst(strftime("%B", $fecha));
    print " $anho</th>\n";
    print "\t\t</tr>\n";
    print "\t\t<tr>\n";
    /*
    Usando como separador un guión, podemos usar la fecha en dia-mes-año
    */
    $un_lunes = strtotime("31-10-2022");
    for ($i = 0; $i < 7; $i++) {
        print "\t\t\t<th>" . ucfirst(strftime('%a', $un_lunes + $i * 24 * 60 * 60)) . "</th>\n";
    }
    print "\t\t</tr>\n";
    print "\t</thead>\n";
    /* Fin de cabecera */
    print "\t<tbody>\n";
    while ($dia <= $ultimo) {//Mientras me queden dias
        print "\t\t\t<tr>\n";
        for ($i = 0; $i < 7; $i++) {//Escribo una semana
            print "\t\t\t\t<td>";
            // print $dia;
            print (($dia > 0) && ($dia <= $ultimo)) ? $dia : "";
            print "</td>\n";
            $dia++;
        }
        print "\t\t\t</tr>\n";

    }
    print "\t</tbody>\n";
    print "</table>\n";
}
calendarioMes(10, 2025, true);
calendarioMes(10);
calendarioAnho();
?>
<!-- </body>

</html> -->