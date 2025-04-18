<?php
// Habilitar CORS para permitir solicitudes de cualquier origen
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

require_once "../../clases/Lista.php";
require_once "../../clases/Gato.php";

$lista = new Lista();
$resultados = $lista->Select_Gatos();

echo json_encode($resultados);
?>