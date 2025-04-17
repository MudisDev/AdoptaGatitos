<?php
//require_once 'clases/Conexion.php';
require_once 'clases/Gato.php';
require_once 'clases/Lista.php';

//$conexiontest = new Conexion();
//$conexiontest->SetSelect("Refugio");

//?nombre=mudis&genero=macho&foto=FOTOpferfil&fecha_ingreso=2024-02-02&descripcion=amigable&estado=saludable&edad=1&color=vacaBv&id_personalidad=1&id_raza=1&id_refugio=1

$id_gato = $_GET['id_gato'];
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

//$gato1 = new Gato($nombre, $genero, $foto, $fecha_ingreso, $descripcion, $estado, $edad, $color, $id_personalidad, $id_raza, $id_refugio);
//$gato1 = new Gato();
//$gato1->Constructor_Registro($_GET);
//$gato1->Registrar_Gato();
//$gato1->Perfil_Gato();
//$gato1->Registrar_Gato();

/* $gato2 = new Gato();
$gato2->Constructor_ID($id_gato);
$gato2->Buscar_Gato();

echo "<br><br><br>";
echo "Perfil gato";
echo "<br><br><br>";

echo json_encode($gato2->Get_Perfil_Gato());
echo "<br><br><br>";
print_r($gato2->Get_Perfil_Gato()); */

$lista = new Lista();
$lista->Select_Gatos();


?>