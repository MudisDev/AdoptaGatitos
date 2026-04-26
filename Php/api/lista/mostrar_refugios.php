<?php
require_once __DIR__ . '../../utils/debug.php';
require_once __DIR__ . '../../utils/headers.php';
require_once __DIR__ . '../../clases/Lista.php';

$lista = new Lista();
$resultados = $lista->Select_Refugios();
echo json_encode($resultados);

?>