<?php
require_once __DIR__ . '../../utils/debug.php';
require_once __DIR__ . '../../utils/headers.php';
require_once __DIR__ . '../../clases/Mascota.php';

$mascota = new Mascota($_GET);
$mascota->Buscar_Mascota();
$resultados = $mascota->Get_Perfil_Mascota();
echo json_encode($resultados);
?>