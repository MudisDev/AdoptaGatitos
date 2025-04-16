<?php
//require_once 'clases/Conexion.php';
require_once 'clases/Gato.php';

//$conexiontest = new Conexion();
//$conexiontest->SetSelect("Refugio");


//$id_gato = "";
$nombre = "nekotest";
$genero = "masculino";
$foto = "FotoBv";
$fecha_ingreso = "2025-01-01";
$descripcion = "jugueton";
$estado = "saludable";
$edad = 3;
$color = "calico";
//$fecha_adopcion = "";
//$id_cartilla = "";
//$id_ciudadano = null;
$id_personalidad = 1;
$id_raza = 1;
$id_refugio = 1;

$gato1 = new Gato($nombre, $genero, $foto, $fecha_ingreso, $descripcion, $estado, $edad, $color, $id_personalidad, $id_raza, $id_refugio);
//$gato1->Registrar_Gato();
$gato1->Perfil_Gato();
$gato1->Registrar_Gato();

?>