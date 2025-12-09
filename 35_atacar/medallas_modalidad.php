<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
require_once 'funciones_olimpiadas.php';
//MUY PELIGROSO SIN SANEAR
medallas_modalidad($_GET['codigo']);
?>