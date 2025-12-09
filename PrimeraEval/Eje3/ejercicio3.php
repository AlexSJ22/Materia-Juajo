<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL & ~E_WARNING);
require_once("funciones.php");
header("Content-Type: application/json");
JSON_filtrar_poblacion($_GET['poblacion']);
?>