<!DOCTYPE html>
<?php
session_start();
/*
PHPSESSID:"ui8qckei7vhhcdv83lopcsvbl5"
PHPSESSID:"7q1b229fedhpevhcefv0320f41"
*/
?>
<!--
Hay dos formas de simular persistencia en la comunicación cliente servidor. Es decir, dos técnicas que hacen que en vez de una colección de peticiones de servicio y respuestas independientes entre sí (que es lo que realmente hay) parezca que hay una "conversación" en la que cada uno de los interlocutores recuerda cosas dichas por el otro en peticiones anteriores.

COOKIES
    Son información de cabecera en las respuestas del servidor: este pide alnavegador que defina una cookie con determinada clave y valor.
    Cuando el navegador realiza otra petición al mismo sitio, envía las cookies correspondientes.
    
    características de las cookies:
    
    El usuario las puede manipular.
    En el ejemplo del contador, el usuario lo puede poner a cero o a mil
    
    Es posible definirlas con una caducidad determinada y entonces podemos incluso apagar la máquina y al volver al mismo sitio otro día el valor de la cookie sigue ahí.
    
    Dependen de navegador, si abrimos otro no recuerda las cookies, si un navegador funciona con varios perfiles de usuario, son de cada usuario.
    
    Tienen ciertas limitaciones de capacidad y por eso surgen como competidoras las nuevas APIs de almacenamiento de HTML5
    
    A la hora de codificar, es información de cabecera, luego debe ir antes de cualquier sentencia de escritura. En general dedicamos a ello un bloque PHP inmediatamente posterior a la línea del DOCTYPE

SESIONES    

    Una sesión está formada por varias variables que en vez de andarlas mandando con cada petición de servicio, se almacenan en el servidor.
    
    Suponen un almacenamiento físico en el disco del servidor. Por ello es un recurso que caduca automáticamente. No es posible hacer como con las cookies, que caducan al de años. El mecanismo que se usa es el de refrescar sesión cada vez que se usa. Hay un temporizador que si detecta que lleva determinado periodo sin usarse borra las variables de sesión.
    
    la forma de que el servidor sepa de quién son esas variables es enviar una cookie que nos ha proporcionado el propio servidor. Se suele llamar cookie de sesión.
    
    La principal ventaja de las sesiones es que el usuario no las puede manipular.
-->
<html lang="es">

<head>
    <?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);
    ?>
    <meta charset="UTF-8">
    <title>Sesiones (contador)</title>
</head>

<body>
    <?php
    if (isset($_SESSION['visitas'])) {
        $_SESSION['visitas']++;
    } else {
        $_SESSION['visitas'] = 1;
    }
    print "<p>En esta sesión llevas $_SESSION[visitas] visitas</p>";
    ?>
</body>

</html>