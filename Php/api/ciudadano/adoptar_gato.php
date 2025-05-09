<?php

require_once '../../utils/debug.php';

require_once "../../utils/headers.php";
require_once "../../clases/Conexion.php";
require_once "../../clases/Ciudadano.php";

$id_ciudadano = $_GET['id_ciudadano'];
$id_gato = $_GET['id_gato'];

$ciudadano = new Ciudadano(['id_ciudadano' => $id_ciudadano]);
$resultado = $ciudadano->Adoptar( $id_gato);
echo json_encode( $resultado);
?>