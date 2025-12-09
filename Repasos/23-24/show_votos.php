<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de los votos</title>
</head>
<body>
    <?php

        require_once 'datos.php';

        

        $revisados = [];
        $duplicados = [];
        $claveVotante;

        $printTabla = false;


        //print "<pre>".print_r($_GET['puntos'], true)."</pre>\n";

        //print "<pre>".print_r(array_map("ponerNombre", $_GET['puntos']), true)."</pre>";

        $votos = array_map("ponerNombre", $_GET['puntos']);

        //print "<p>".$_GET['votante']."</p>";

        foreach($pais as $clave => $valor) {
            if ($valor['nombre'] == $_GET['votante']) {
                $claveVotante = $clave;
            }
        }

        //print "<p>".$claveVotante."</p>";
        
        foreach($votos as $puntos => $pais) {
            if ($pais == '-1') {
                print "<h1 style=\"Color: red; text-align: center;\" >Seleccione pais/es</h1>";
                return;
            }

            if ($pais == $_GET['votante']) {
                print "<h1 style=\"Color: red; text-align: center;\" >No te puedes votar a ti mismo ".$_GET['votante']."</h1>";
                return;
            } else {
                $printTabla = true;
            }

            if (in_array($pais, $revisados)) {
                $duplicados[] = $pais;
            } else {
                $revisados[] = $pais;
            }

            if (!empty($duplicados)) {
                print "<h1 style=\"Color: red; text-align: center;\" >No puedes votar dos veces el mismo pais ".$duplicados[0]."</h1>";
                return;
            } else {
                $printTabla = true;
            }

            for ($i = 0; $i < count($voto); $i++) {
                if ($voto[$i]['votante'] == $claveVotante) {
                    print "<h1 style=\"Color: red; text-align: center;\" >No puedes volver a votar ".$_GET['votante']."</h1>";
                    return;
                } else {
                     $printTabla = true;
                }
            }
            
        }

        if ($printTabla == true) {
            print "\t<table>\n";
            print "\t\t<tr>\n";
            print "\t\t\t<th>Pais</th>\n";
            print "\t\t\t<th>Puntos</th>\n";
            print "\t\t</tr>\n";

            global $votos;

            foreach($votos as $puntos => $pais) {
                print "\t\t<tr>\n";

                print "\t\t\t<td>".$pais."</td>\n";
                print "\t\t\t<td>".$puntos."</td>\n";
    
                print "\t\t</tr>\n";
            }

            print "\t</table>\n";
        }

        function ponerNombre($a) {
            global $pais;

            foreach($pais as $clave => $valor) {
                if ($clave == $a) {
                    return $a = $valor['nombre'];
                }
            }
            return $a;
        }

      
        
    ?>
</body>
</html>
