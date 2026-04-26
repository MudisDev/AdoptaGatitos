<?php
require_once __DIR__ . '/../../utils/debug.php';
require_once __DIR__ . '/../../utils/headers.php';
require_once __DIR__ . '/../../clases/Conexion.php';
require_once __DIR__ . '/../../clases/Usuario.php';

$id_usuario = $_GET['id_usuario'];
$id_mascota = $_GET['id_mascota'];

$usuario = new Usuario(['id_usuario' => $id_usuario]);
$resultado = $usuario->Adoptar($id_mascota);
echo json_encode($resultado);
?>