<?php
require_once __DIR__ . '/../../utils/debug.php';
require_once __DIR__ . '/../../utils/headers.php';
require_once __DIR__ . '/../../utils/auth.php';
require_once __DIR__ . '/../../clases/Usuario.php';

$id_usuario = requireLogin();

$usuario = new Usuario(['id_usuario' => $id_usuario]);
$usuario->Consultar_Perfil();
$resultado = $usuario->Get_Perfil_Usuario();
echo json_encode($resultado);

?>