<?php
//require_once '../../utils/debug.php';
require_once '../../clases/Ciudadano.php';

$ciudadano = new Ciudadano($_GET);
$resultado = $ciudadano->Registrar_Ciudadano();

echo json_encode($resultado);



?>