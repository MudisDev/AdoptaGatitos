<?php

require_once "../../utils/headers.php";
require_once "../../clases/Lista.php";
require_once "../../clases/Gato.php";

$lista = new Lista();
$resultados = $lista->Select_Gatos();

echo json_encode($resultados);
?>