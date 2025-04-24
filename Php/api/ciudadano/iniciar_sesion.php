<?php

require_once "../../utils/headers.php";
require_once "../../clases/Ciudadano.php";

$ciudadano = new Ciudadano($_GET);
$resultado = $ciudadano->Iniciar_Sesion();
echo json_encode($resultado);
?>