<!DOCTYPE html>
<html lang="es">
  <head>
    <?php
    ini_set('display_errors','On');
    error_reporting(E_ALL& ~E_WARNING);
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nivel de ERROR en PHP</title>
    <!--
    <link rel="stylesheet" href="style.css">
    -->
  </head>
  <body>
	<?php
	function binario($num) {
		return str_pad(decbin($num), 15, "0", STR_PAD_LEFT);
	}
	$valor = error_reporting();

	print "<pre>";
	print "error_reporting()   " . binario($valor) . " ($valor)\n\n";
	print str_pad("Constante", 20) . "Binario            Activo\n";
	print str_repeat("-", 45) . "\n";

	$check = "✅"; 
	$cross = "🚫"; 

	print str_pad("E_ERROR", 20)             . binario(E_ERROR)             . "     " . (($valor & E_ERROR) ? $check : $cross) . "\n";
	print str_pad("E_WARNING", 20)           . binario(E_WARNING)           . "     " . (($valor & E_WARNING) ? $check : $cross) . "\n";
	print str_pad("E_PARSE", 20)             . binario(E_PARSE)             . "     " . (($valor & E_PARSE) ? $check : $cross) . "\n";
	print str_pad("E_NOTICE", 20)            . binario(E_NOTICE)            . "     " . (($valor & E_NOTICE) ? $check : $cross) . "\n";
	print str_pad("E_CORE_ERROR", 20)        . binario(E_CORE_ERROR)        . "     " . (($valor & E_CORE_ERROR) ? $check : $cross) . "\n";
	print str_pad("E_CORE_WARNING", 20)      . binario(E_CORE_WARNING)      . "     " . (($valor & E_CORE_WARNING) ? $check : $cross) . "\n";
	print str_pad("E_COMPILE_ERROR", 20)     . binario(E_COMPILE_ERROR)     . "     " . (($valor & E_COMPILE_ERROR) ? $check : $cross) . "\n";
	print str_pad("E_COMPILE_WARNING", 20)   . binario(E_COMPILE_WARNING)   . "     " . (($valor & E_COMPILE_WARNING) ? $check : $cross) . "\n";
	print str_pad("E_USER_ERROR", 20)        . binario(E_USER_ERROR)        . "     " . (($valor & E_USER_ERROR) ? $check : $cross) . "\n";
	print str_pad("E_USER_WARNING", 20)      . binario(E_USER_WARNING)      . "     " . (($valor & E_USER_WARNING) ? $check : $cross) . "\n";
	print str_pad("E_USER_NOTICE", 20)       . binario(E_USER_NOTICE)       . "     " . (($valor & E_USER_NOTICE) ? $check : $cross) . "\n";
	print str_pad("E_STRICT", 20)            . binario(E_STRICT)            . "     " . (($valor & E_STRICT) ? $check : $cross) . "\n";
	print str_pad("E_RECOVERABLE_ERROR", 20) . binario(E_RECOVERABLE_ERROR) . "     " . (($valor & E_RECOVERABLE_ERROR) ? $check : $cross) . "\n";
	print str_pad("E_DEPRECATED", 20)        . binario(E_DEPRECATED)        . "     " . (($valor & E_DEPRECATED) ? $check : $cross) . "\n";
	print str_pad("E_USER_DEPRECATED", 20)   . binario(E_USER_DEPRECATED)   . "     " . (($valor & E_USER_DEPRECATED) ? $check : $cross) . "\n";

	print "</pre>";
    ?>
  </body>
</html>