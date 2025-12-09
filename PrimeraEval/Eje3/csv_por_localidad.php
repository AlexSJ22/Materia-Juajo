<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
require_once 'funciones.php';
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="empresas.csv";');
// print "RECIBIDO $_GET['poblacion']";
csv_filtrar_poblacion($_GET['localidad']);
?>