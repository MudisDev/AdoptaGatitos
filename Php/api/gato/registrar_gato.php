<?php

require_once "../../utils/headers.php";
require_once "../../clases/Gato.php";

//?nombre=michi&genero=hembra&foto=FotoBv&fecha_ingreso=2024-02-02&descripcion=amable&estado=saludableBv&edad=2&color=vacaBv&id_personalidad=2&id_raza=2&id_refugio=2

$gato = new Gato($_GET);
//$gato->Constructor_Registro($_GET);
$resultado = $gato->Get_Perfil_Gato();
echo json_encode($resultado);
$gato->Registrar_Gato();

?>