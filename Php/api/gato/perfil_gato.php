<?php

require_once "../../utils/headers.php";
require_once '../../clases/Gato.php';

$id_gato = $_GET['id_gato'];

$gato = new Gato($_GET);
//$gato->Constructor_ID($id_gato);
$gato->Buscar_Gato();

$resultados = $gato->Get_Perfil_Gato();

echo json_encode($resultados);



?>