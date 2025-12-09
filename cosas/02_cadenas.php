<!DOCTYPE html>
<html lang="es">
    <?php
    ini_set('display_errors','on');
    error_reporting(E_ALL);
    ?>
<head>
    <meta charset="UTF-8">
    <title>He olvidado el titulo</title>
</head>
<body>
	<?php
	// En php tenemos dos tipos de cadenas
	// 1.- Cadenas delimitadas por comillas simples
	// 2.- Cadenas delimitadas por comillas dobles
	// Las comillas simples quieren decir que lo que hay entre ellas es literal, es decir, no se cambia,
	// Por el contrario, entre comillas dobles se realizan una serie de conversiones:Las variables se sustituyen
	// y las secuencias de escape se expanden
	/*
	Cualquier cosa/simbolo en PHP que comience por dolar $ se considera una variable
	No le damos tipo
	No la declaramosl, directamente asignamos y comenzamos a usarla
	*/
	$alumno='Pepito';
	print "<p>Entre comillas dobles</p>";
	print "<p>El nombre del alumno es $alumno</p>";
	print '<p>Entre comillas simples</p>';
	print '<p>El nombre del alumno es $alumno</p>';
	
	// Cualquiera que haya programado conoce un par de scuencias de escape
	// \n ...................... Salto de linea
	// \r ...................... Retorno de carro
	// \t ...................... Tabulador
	
	print "<p>Entre comillas simples</p>";
	print '<p>La secuencia de escape \n es un salto de linea</p>';
	print "<p>Entre comillas dobles</p>";
	print "<p>La secuencia de escape \n es un salto de linea</p>";
	
	/*
    Hay caracteres que tienen un significado especial en determinados 
    contextos, le podemos quitar ese significado especial "escapándolo", 
    es decir, anteponiendo un \
    */
     print '<p>Esta cadena está delimitada por \' que es la comilla simple</p>';
    // Entre comillas dobles podemos usar secuencias de escape para referirnos 
    // a caracteres reservados. 

    print "<p>La comilla simple es \x27 y la doble \" es decir \x22  </p>";
    print "<p>La variable \$alumno vale $alumno</p>\n";
    print "<p>El separador \" ha servido para construir esta cadena</p>\n";

    /*
    Si en otro contexto no tienen un significado especial, 
    no se escapa
    */
    
    print '<p>La comilla " se llama comilla doble</p>';

    // Con las secuencias de escape ocurre algo parecido
    
    print '<p>Entre comillas simples</p>';
    print '<p>Un tabulador se obtiene con \t</p>';

    print '<p>Entre comillas dobles</p>';
    print "<p>Un tabulador se obtiene con \t</p>";

    print '<p>Entre comillas dobles escapando</p>';
    print "<p>Un tabulador se obtiene con \\t</p>";
    
    // El concatenador de cadenas es el punto
    
    print "<p>La variable ".'$alumno'." vale $alumno</p>\n";
    
    // No solo pega cadenas
    // Convierte las expresiones que le damos en cadenas y las pega

    $n1=2;
    $n2=5;
    
    print "<p> $n1 + $n2 </p>\n";
    print "<p> $n1 + $n2 =".($n1+$n2)."</p>\n";
    
    //Relación entre cadenas y funciones
    
    $cadena="palabreja";
    
    print "<p>La longitud de una cadena se mide con strlen</p>\n";
    
    print "<p>strlen($cadena)</p>\n";
    print "<p>strlen($cadena): ".strlen($cadena)."</p>\n";
    
    /*
    Supongamos que queremos escribir un formulario desde una cadena.
    Queremos que algunas variables se expandan.
    Por ejemplo, estamos editando un perfil en un foro
    */
    
    $clave="12345";
    $nombre="Ibai";
    $edad="18"; 
    //print '<for action="actualizaar_usuario-php" method="POST">'
	//"<input type=\"hidden\" name=\="clave\" value="$clave">
	
	//Podemos usar un metodo mejor: un HEREDOC
	/*
	Iniciamos el heredoct con print<<<nombre
	
	*/
    ?>
</body>
</html>