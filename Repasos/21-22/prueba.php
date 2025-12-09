<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<!--

Al final del enunciado dispones del array $area que contiene datos sobre  areas de esparcimiento. 
Son las que dependen de diputación de Bizkaia.

Se pide:

****************
ficha_sitio.php
****************
Empieza por codificar el fichero fichasitio.php que reciba el código de una de las áreas y muestre sus datos. 

No hay por qué mostrar todo. Por ejemplo no parece relevante el código y las coordenadas.

Debería indicar ayuntamiento, la comarca y las observaciones. El nombre del área debería ser un enlace a la URL que se proporciona. Se deben mostrar el número de mesas y asadores, así como indicar si se dispone o no de determinado equipamiento: sombra, fuente, cobijo... .Tanto para las mesas y asadores como para los que son booleanos, usa dos clases css para indicar si están o no. Ten en cuenta que en el dato de mesas y asadores puede aparecer un número o la palabra "NO". Si miras la URL de diputación verás que lo resuelve con iconos, que en el caso de mesas y asadores incluyen el número.

Para hacer pruebas, puedes tomar 18, 22 y 77. Además la 60 tiene de todo menos bar.

Te recomiendo hacerte una función ficha_sitio($codigo)

**********************
listado_paginado.php
**********************

Realiza un listado paginado en el que aparezcan nombre y ayuntamiento de cada área metiendo en cada página los que te parezca razonable. 

Debe ser una lista ordenada de enlaces del tipo "Artaza (Leioa)" que enlacen fichasitio.php con el código correspondiente. Utiliza el HTML para que la lista empiece numerando donde le corresponde.

Incluye al menos un botón anterior y otro siguiente. No debe incluir un siguiente si está en la última ni un anterior si está en la primera.

Deberías apoyarte en una función de tipo listar_pagina($pagina,$por_pagina).

Por ejemplo listar_pagina(3,15) pide mostrar la tercera página con 15 elementos por listado.

Utiliza isset para ver si han llegado una petición GET con un número de página y si no es así haz la primera.

********************
solo_accesibles.php
********************

Vamos a hacer otro listado en el que aparezcan solo las opciones que nos interesan. 

Tenemos pensado acudir a una de estas areas con una persona mayor a la que llevaremos en coche. Además  queremos usar una mesa y asar unas chuletillas. 

Haz un listado similar al anterior que incluya únicamente las áreas con accesibilidad, aparcamiento y aseos. Ordénalo de manera que vayan primero las que tengan más mesas, si hay empate, las que tengan más asadores y si vuelve a haber empate, por nombre. Para poder comprobar si te lo hace bien puedes hacer un listado en forma de tabla que incluya los datos que exigimos y los criterios de ordenación.

Deberías hacerte la función solo_accesibles()

*************************
ficha_sitio_con_mapa.php
*************************

Este ejercicio es para el que quiera un diez. 

Todos cometemos fallos o sea que aunque te lo supieras todo, es altamente improbable que lo anterior esté perfecto. Aquí tienes una oportunidad de poder sacar algún punto extra incorporando un mapa a la ficha del sitio.

Si te has fijado en las coordenadas, son un poco extrañas.

Están pensadas para usar con el visor geoeuskadi y el formato es  EPSG 25830 - UTM30N ETRS89.

Puedes consultar cómo usarlo en https://www.geo.euskadi.eus/api-geoeuskadi-ejemplos-del-visor/s69-geocont/es/

Deberías crear un nuevo mapa y centrarlo en las coordenadas correspondientes: puntos 2 y 3 del menú de ayuda.

****************************************************************************************************

Plantilla orientativa:

  ficha_sitio.php
    ->Se muestran correctamente los datos y el enlace a diputación funciona................1
    ->Los datos booleanos se organizan mediante clases CSS.................................1
  listado_paginado.php
    ->Se muestran los elementos pedidos en el listado y los enlaces funcionan..............1.5
    ->Se muestran solo parte de esos elementos.............................................0.5
    ->Los botones/enlaces anterior y siguiente permiten desplazarse por las páginas........0.5
    ->Los botones no funcionan cuando no deberían.........................................0.5
  solo_accesibles.php
    ->Los datos aparecen correctamente filtrados...........................................2
    ->Los datos aparecen correctamente ordenados...........................................2
    ->Se realiza una tabla mostrando los datos relevantes para comprobar los anteriores....1
  
-->

<head>
  <?php
  ini_set('display_errors', 'On');
  error_reporting(E_ALL && ~E_DEPRECATED);
  ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Array Map</title>
  <link rel="stylesheet" type="text/css" href="14_calendario.css">
</head>

<body>
  <?php
  require_once "./area.php";
  function fichasitio($codigo)
  {
    global $area;
    $a = $area[$codigo];
    $nombre = $a['ayto'];
    print ("<pre> $nombre </pre>");
  }
  fichasitio(5);
  ?>
</body>

</html>