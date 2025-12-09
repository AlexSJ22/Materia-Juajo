<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<!--
Escribe una tabla para indicar un mes en un calendario.
Se pide:
Una primera fila con un sola celda con el nombre del mes (opcionalmente año)
Una segunda fila con los nombres de los días de la semana en el idioma correspondiente (cada uno en una celda)
Varias filas de siete celdas que representen las distintas semanas del mes. La primera fila podría tener por 
ejemplo dos celdas vacías al principio si el mes comienza en miércoles.
La última fila podría tener por ejemplo seis celdas vacías al final si el mes acaba en lunes. 

Antes de empezar a escribir el mes deberías tener claro cuál es el día de la semana en que empieza el mes y 
posiblemente una variable "hueco" asociada a ese número (número de casillas vacías). 

Para el último recuerda aquella expresión de "last day of" 

Los casos que dan problemas siempre son los extremos. Deberías comprobar:

-Meses que empiezan o acaban en lunes y en domingo.
-Meses que empiezan o acaban en dias centrales

Puedes ayudarte de tu cuenta del "nemesio" 

 ncal -M -b 3 2222
 
      Marzo 2222
lu ma mi ju vi sá do
             1  2  3
 4  5  6  7  8  9 10
11 12 13 14 15 16 17
18 19 20 21 22 23 24
25 26 27 28 29 30 31

Para no generar errores al usar strftime que se ha quedado viejuno, puedes seguir el siguiente enlace https://es.stackoverflow.com/questions/395459/fecha-en-espa%C3%B1ol

O bien quitar el E_DEPRECATED del error
-->
<?php
// ini_set('display_errors','On');
// error_reporting(E_ALL);
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<title>Calendario</title>
<link rel="stylesheet" type="text/css" href="14_calendario.css">
</head>
<body>
<?php
$mes=10;$anho=2025;
//$mes=10;$anho=2022;/*Acaba en lunes*/
 // $mes=8;$anho=2022; /*Empieza en lunes*/
// $mes=1;$anho=2023; /*Empieza en domingo*/
// $mes=4;$anho=2023; /*Acaba en domingo*/
setlocale(LC_ALL,"es_ES.utf8","Spanish_Spain.utf8");
/*
Usando date hay dos representaciones numéricas del día de la semana:

N..... de 1(lunes) a 7(domingo)
w..... de 0 (domingo) a 6 (sábado)

Con la misma función podemos obtener el número de días del mes

t.......Número de días del mes 
*/

$fecha=mktime(0,0,0,$mes,1,$anho);

$ultimo=date('t',$fecha);

$dia_semana_inicio=date('w',$fecha);// 0 domingo .... 6 sábado

$huecos=($dia_semana_inicio-1+7)%7;

print "<p>El mes $mes del año $anho tiene $ultimo dias y empieza el día de la semana $dia_semana_inicio. Hay $huecos huecos</p>\n";

$dia=(1-$huecos);

print "<table class=\"mes\">\n";
/* Inicio de cabecera */
print "\t<thead>\n";
print "\t\t<tr>\n";
print "\t\t\t<th colspan=\"7\"> ";
print ucfirst(strftime("%B",$fecha));
print " $anho</th>\n";
print "\t\t</tr>\n";
print "\t\t<tr>\n";
/*
Usando como separador un guión, podemos usar la fecha en dia-mes-año
*/
$un_lunes=strtotime("31-10-2022");
for($i=0;$i<7;$i++){
    print "\t\t\t<th>".ucfirst(strftime('%a',$un_lunes+$i*24*60*60))."</th>\n";
}
print "\t\t</tr>\n";
print "\t</thead>\n";
/* Fin de cabecera */
print "\t<tbody>\n";
while($dia <= $ultimo){//Mientras me queden dias
    print "\t\t\t<tr>\n";
    for($i=0;$i<7;$i++){//Escribo una semana
        print "\t\t\t\t<td>";
        // print $dia;
        print (($dia>0)&&($dia<=$ultimo))?$dia:"";
        print "</td>\n";
        $dia++;
    }
    print "\t\t\t</tr>\n";
    
}
print "\t</tbody>\n";
print "</table>\n";
?>
</body>
</html>