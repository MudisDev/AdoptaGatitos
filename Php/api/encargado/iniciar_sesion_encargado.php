<?php

require_once "../../utils/headers.php";
require_once '../../clases/Encargado.php';

$encargado = new Encargado($_GET);
$resultado = $encargado->Iniciar_Sesion();
echo json_encode($resultado);


?>