<?php

require_once "../../utils/headers.php";
require_once "../../clases/Encargado.php";

//?nombre=michi&genero=hembra&foto=FotoBv&fecha_ingreso=2024-02-02&descripcion=amable&estado=saludableBv&edad=2&color=vacaBv&id_personalidad=2&id_raza=2&id_refugio=2

$nombre = $_GET['nombre'];
$genero = $_GET['genero'];
$foto = $_GET['foto'];
$fecha_ingreso = $_GET['fecha_ingreso'];
$descripcion = $_GET['descripcion'];
$estado = $_GET['estado'];
$edad = $_GET['edad'];
$color = $_GET['color'];
$fecha_adopcion = null;
$id_cartilla = null;
$id_ciudadano = null;
$id_personalidad = $_GET['id_personalidad'];
$id_raza = $_GET['id_raza'];
$id_refugio = $_GET['id_refugio'];

$datos_gato = [
    $nombre,
    $genero,
    $foto,
    $fecha_ingreso,
    $descripcion,
    $estado,
    $edad,
    $color,
    $fecha_adopcion,
    $id_cartilla,
    $id_ciudadano,
    $id_personalidad,
    $id_raza,
    $id_refugio
];


$username = $_GET['username'];

$encargado = new Encargado(['username' => $username]);
$resultado = $encargado->RegistrarGato($datos_gato);
echo json_encode($resultado);
?>