<!DOCTYPE html>
<html lang="es">
  <head>
    <?php
    ini_set('display_errors','On');
    error_reporting(E_ALL);
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Condiciones en PHP</title>
    <!--
    <link rel="stylesheet" href="style.css">
    -->
  </head>
  <body>
    <?php
    /*
    PHP es un lenguaje "débilmente tipado"
    A pesar de ello existen las constantes true y false
    Sin embargo, hace cosas que otros lenguajes no permiten
    */
    
    /*
    Una variable sin definir es falsa
    */
    
    if($nombre){
        print "<p>\$nombre:$nombre es cierto</p>\n";
    }else{
        print "<p>\$nombre:$nombre es falso</p>\n";
    }
/*
    Viene bien para chequear el input de formularios

    Recuerda. Si tenemos:

    <input type="texto" name="nombre">

    Si ponemos "Pepe" y enviamos, nos llegaría $_GET['nombre']="Pepe"

    Si no ponemos nada, tenemos $_GET['nombre']="" 
*/  

    if(!$_GET){
        print "<p>No hay datos en \$_GET</p>\n";
    }else{
        print "<p>Han llegado datosen \$_GET</p>\n";
    }
    
    $_GET['nombre']="Pepe";
    
    if(!$_GET){
        print "<p>No hay datos en \$_GET</p>\n";
    }else{
        print "<p>Han llegado datos en \$_GET</p>\n";
    }
    
    if($_GET['nombre']){
        print "<p>Hay valor de nombre en \$_GET</p>\n";
    }else{
        print "<p>No hay valor de nombre en \$_GET</p>\n";
    }
/*
    En los checkboxes, 
    <input type="checkbox" name="spam">

    Pueden llegar al servidor dos cosas

    1.-$_GET['spam']='on';
    2.-No aparece $_GET['spam']
*/  
    $_GET['spam']='on';
    if($_GET['spam']){
        print "<p>Has marcado el spam</p>\n";
    }else{
        print "<p>No has marcado la casilla del spam</p>\n";
    }   
    /*
    Para que no proteste por usar $_GET['spam'] cuando no está definido, usamos isset
    */
    if(isset($_GET['spam'])){
        print "<p>Has marcado el spam</p>\n";
    }else{
        print "<p>No has marcado la casilla del spam</p>\n";
    }   
    /*
    Una cadena no vacía es cierta, casi siempre
    */

    $valor="elefante";
    if($valor){
        print "<p>\"$valor\" es cierto</p>\n";
    }else{
        print "<p>\"$valor\" es falso</p>\n";
    }
    
    $valor="true";
    if($valor){
        print "<p>\"$valor\" es cierto</p>\n";
    }else{
        print "<p>\"$valor\" es falso</p>\n";
    }   
    $valor="false";
    if($valor){
        print "<p>\"$valor\" es cierto</p>\n";
    }else{
        print "<p>\"$valor\" es falso</p>\n";
    }
    $valor=true;
    if($valor){
        print "<p>\"$valor\" es cierto</p>\n";
    }else{
        print "<p>\"$valor\" es falso</p>\n";
    }   
    $valor=false;
    if($valor){
        print "<p>\"$valor\" es cierto</p>\n";
    }else{
        print "<p>\"$valor\" es falso</p>\n";
    }
    $valor="0";
    if($valor){
        print "<p>\"$valor\" es cierto</p>\n";
    }else{
        print "<p>\"$valor\" es falso</p>\n";
    }
    $valor="7";
    if($valor){
        print "<p>\"$valor\" es cierto</p>\n";
    }else{
        print "<p>\"$valor\" es falso</p>\n";
    }
    $valor=7;
    if($valor){
        print "<p>\"$valor\" es cierto</p>\n";
    }else{
        print "<p>\"$valor\" es falso</p>\n";
    }

    $valor=0;
    if($valor){
        print "<p>\"$valor\" es cierto</p>\n";
    }else{
        print "<p>\"$valor\" es falso</p>\n";
    }
    $valor="  ";
    if($valor){
        print "<p>\"$valor\" es cierto</p>\n";
    }else{
        print "<p>\"$valor\" es falso</p>\n";
    }
/*
Botones de radio.
Mismo nombre para ambos para que sepa que son del mismo grupo: al marcar uno se desmarcan lo demás
<input type="radio" name="sexo" value="H">Hombre
<input type="radio" name="sexo" value="M">Mujer

*/
if(isset($_GET['sexo'])&& $_GET['sexo']=='H'){
        print "<p>Has marcado hombre</p>\n";
    }
?>
  </body>
</html>