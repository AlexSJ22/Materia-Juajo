<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);
    require_once './provincias.php';
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Provincias formulario</title>
    <link rel="stylesheet" type="text/css" href="">
</head>

<body>
    <?php
    print ("<pre> Has recibido " . $_GET["prov"] . "</pre>");
    print ("<p>Corresponge a " . $provincia[$_GET["prov"]] . "</p>\n"); //Primera solucion*/
    /*print ("<p>Corresponge a  ${provincia[$_GET['prov']]}</p>\n");*/ //Segunda solucion - No funciona-
    print ("<p>Corresponge a  {$provincia[$_GET['prov']]}</p>\n"); //Tercera solucion
    ?>
</body>

</html>