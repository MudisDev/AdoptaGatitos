<?php

// Habilitar CORS para permitir solicitudes de cualquier origen
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

require_once "../../clases/Conexion.php";
require_once "../../clases/Ciudadano.php";

$id_ciudadano = $_GET['id_ciudadano'];
$id_gato = $_GET['id_gato'];
$columna_actualizar = $_GET['columna_actualizar'];
$condiciones = $_GET['condiciones'];
$tabla = $_GET['tabla'];

$ciudadano = new Ciudadano(['id_ciudadano' => $id_ciudadano]);
$ciudadano->Adoptar($tabla, $id_gato, $columna_actualizar, $condiciones);

?>