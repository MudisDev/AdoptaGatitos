<?php

// Habilitar CORS para permitir solicitudes de cualquier origen
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

require_once '../../clases/Gato.php';

$id_gato = $_GET['id_gato'];

$gato = new Gato();
$gato->Constructor_ID($id_gato);
$gato->Buscar_Gato();
//$gato->Get_Perfil_Gato();
$resultados = $gato->Get_Perfil_Gato();

echo json_encode($resultados);



?>