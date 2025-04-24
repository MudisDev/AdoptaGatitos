<?php

require_once "../../utils/headers.php";
require_once "../../clases/Lista.php";

$lista = new Lista();
$resultados = $lista->Select_Refugios();
echo json_encode($resultados);

?>