<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL & ~E_WARNING & ~E_DEPRECATED);
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablas</title>
    <style>
        table {
            display: inline;
        }
    </style>
</head>

<body>
    <?php
    function generarCalendario($mes, $anho)
    {
        setlocale(LC_ALL, "Spanish_Spain.utf8", "es_ES.utf8");
        $primerDia = "$anho-$mes-01";
        $primerDiaSemana = date('N', strtotime($primerDia));
        if ($mes == 12) {
            $anhosiguiente = $anho + 1;
            $mesSiguiente = 1;
        } else {
            $anhosiguiente = $anho;
            $mesSiguiente = $mes + 1;
        }
        $primerDiaSiguienteMes = "$anhosiguiente-$mesSiguiente-01";

        // Calcular diferencia en segundos entre el primer día del siguiente mes y el primero del actual
        $diffSegundos = strtotime($primerDiaSiguienteMes) - strtotime($primerDia);
        // Convertir segundos a días
        $numDias = $diffSegundos / (60 * 60 * 24);
        $ultimoDia = date('Y-m-d', strtotime("$primerDia +" . ($numDias - 1) . " dias"));
        $ultimoDiaSemana = date('N', strtotime($ultimoDia));
        $huecosInicio = $primerDiaSemana - 1;
        $huecosFinal = 7 - $ultimoDiaSemana;
        $nombreMes = strftime('%B', strtotime($primerDia));
        $nombreMes = ucfirst($nombreMes);
        print "<table>";
        print "<tr><th colspan='7' style='padding:10px; background:#ddd;'>$nombreMes $anho</th></tr>";
        print "<tr>";
        print "<th style='padding:5px; background:#f0f0f0;'>Lun</th>";
        print "<th style='padding:5px; background:#f0f0f0;'>Mar</th>";
        print "<th style='padding:5px; background:#f0f0f0;'>Mié</th>";
        print "<th style='padding:5px; background:#f0f0f0;'>Jue</th>";
        print "<th style='padding:5px; background:#f0f0f0;'>Vie</th>";
        print "<th style='padding:5px; background:#f0f0f0;'>Sáb</th>";
        print "<th style='padding:5px; background:#f0f0f0;'>Dom</th>";
        print "</tr>";
        $diaContador = 1;
        print "<tr>";
        for ($i = 0; $i < $huecosInicio; $i++) {
            print "<td></td>";
        }
        for ($i = $huecosInicio; $i < 7; $i++) {
            print "<td>$diaContador</td>";
            $diaContador++;
        }
        print "</tr>";

        while ($diaContador <= $numDias) {
            print "<tr>";
            for ($i = 0; $i < 7; $i++) {
                if ($diaContador <= $numDias) {
                    print "<td>$diaContador</td>";
                    $diaContador++;
                } else {
                    print "<td></td>";
                }
            }
            print "</tr>";
        }
        print "</table>";
    }
    //for ($i = 1; $i < 13; $i++) {
    generarCalendario(2, 1999);
    //}
    ?>
</body>

</html>