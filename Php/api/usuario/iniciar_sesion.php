<?php
require_once __DIR__ . '/../../utils/debug.php';
require_once __DIR__ . '/../../utils/headers.php';
require_once __DIR__ . '/../../clases/Usuario.php';
require_once __DIR__ . '/../../utils/auth.php';

$usuario = new Usuario($_GET);
$resultado = $usuario->Iniciar_Sesion();

if (!isset($resultado['Error'])) {
    session_start();
    session_regenerate_id(true);
    $_SESSION['id_usuario'] = $resultado[0]["id_usuario"];
    //echo $resultado[0]["id_usuario"];
    echo json_encode($resultado);

} else
    echo "nel Bv";
?>