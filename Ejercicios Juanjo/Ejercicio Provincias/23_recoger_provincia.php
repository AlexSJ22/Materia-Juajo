<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL && ~E_DEPRECATED);
    require_once './provincias.php';
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Recoger provincia</title>
    <link rel="stylesheet" type="text/css" href="">
</head>

<body>
    <?php
    $num = $_GET['capital'];
    if (!array_key_exists($num, $provincia)) {
        die('Codigo de provincia no valido');
    } else {
        print_r("<p>Has elegido $num que es $provincia[$num]</p>");
    }
    ?>
</body>

</html>