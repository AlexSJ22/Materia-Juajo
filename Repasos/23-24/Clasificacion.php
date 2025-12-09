<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="freakflags.css">
</head>
<body>
    <?php   
        require_once "datos.php";

        $claves = array_keys($pais);

        $totalVotos = 0;

        //print "<pre>".print_r($claves, true)."</pre>";
        //print "<pre>".print_r($voto, true)."</pre>";

        for ($k = 0; $k < count($pais); $k++) {
            for ($j = 0; $j < count($voto); $j++) {
                if ($voto[$j]['votado'] == $claves[$k]) {
                    $totalVotos += $voto[$j]['valor'];
                }
            } 
            $pais[$claves[$k]] += ['totalVotos' => $totalVotos];
            $pais[$claves[$k]] += ['clave' => $claves[$k]];
            $totalVotos = 0;
        }
        //print "<p>".$totalVotos."</p>";

        function ordenarVotos($a, $b) {
           return ($b['totalVotos']<=>$a['totalVotos']);
        }
        
        usort($pais, "ordenarVotos");

        //print "<pre>".print_r($pais, true)."</pre>";

        print "<table>\n";

        print "\t<caption>Clasificación del festival de Eurovision</caption>\n";

        $i = 0;
        $posicion = 1;
        
        foreach($pais as $p) {
            if ($p['clasificado'] == "SI") {
                print "\t<tr>\n";
                print "\t\t<th>$posicion</th>\n";
                print "\t\t<td><img class=\"fflag fflag-".$p['clave']." ff-lg\"></td>\n";
                print "\t\t<td>".$p['nombre']."</td>\n";
                print "\t\t<td>".$p['totalVotos']."</td>\n";
                $posicion++;
            } 
            $i++;
        }          
 
    ?>  
</body>
</html>