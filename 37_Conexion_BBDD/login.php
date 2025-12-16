<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibir datos</title>
    <!--
    <link rel="stylesheet" href="style.css">
    -->
    <style>
        * {
            /*background-color: black;
            color: white;*/
            font-size: 25px;
        }
    </style>
</head>

<body>
    <?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);
    print ("<form action=\"\" method=\"post\"><br>");
    print ("<label for=\"nickname\">Introduzca su nickname</label><br>");
    print ("<input type=\"text\" name=\"nickname\" id=\"nickname\" autocomplete=\"off\" required><br>");
    print ("<label for=\"contra\">Introduzca su contraseña</label><br>");
    print ("<input type=\"password\" name=\"contra\" id=\"contra\" autocomplete=\"off\" required><br>");
    print ("<input type=\"submit\" value=\"Enviar datos\"><br>");
    print ("</form>");

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nickname = htmlspecialchars($_POST['nickname']);
        $contra = $_POST['contra'];
        $contra = password_verify($contra, PASSWORD_DEFAULT);
        print ("<p>$contra</p>");
        $hash = '$2y$10$t.AZ1DJWe9RtlHVOmBmFT.Ifntl/2JxV0RrGTNclqkAbx.LBEYorO';

        if (password_verify($contra, $hash)) {
            print ("<p>Bienvenido $nickname</p>");
        } else {
            print ("<p>Contraseña incorrecta</p>");
        }
    }

    ?>
</body>

</html>