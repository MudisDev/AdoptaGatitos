<?php

require_once "../../utils/headers.php";
require_once "../../clases/Encargado.php";

//nombre=EncargadoTest&username=enca21&email=encargado@gmail.com&password=Kazo&telefono=0123456789&foto_perfil=FotoBV&id_refugio=2

$encargado = new Encargado($_GET);
$resultado = $encargado->Registrar_Encargado();
echo json_encode($resultado);
?>