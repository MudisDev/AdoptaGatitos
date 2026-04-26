<?php
require_once '../../utils/debug.php';
require_once '../../clases/Ciudadano.php';

$ciudadano = new Ciudadano($_GET);
$resultado = $ciudadano->Borrar_Cuenta();
echo json_encode($resultado);
?>