<?php
//require_once 'clases/Conexion.php';
require_once 'clases/Gato.php';
require_once 'clases/Lista.php';
require_once 'clases/Ciudadano.php';
require_once 'clases/Encargado.php';


//$conexiontest = new Conexion();
//$conexiontest->SetSelect("Refugio");

//?nombre=mudis&genero=macho&foto=FOTOpferfil&fecha_ingreso=2024-02-02&descripcion=amigable&estado=saludable&edad=1&color=vacaBv&id_personalidad=1&id_raza=1&id_refugio=1

/* $id_gato = $_GET['id_gato'];
$nombre = "nekotest";
$genero = "masculino";
$foto = "FotoBv";
$fecha_ingreso = "2025-01-01";
$descripcion = "jugueton";
$estado = "saludable";
$edad = 3;
$color = "calico"; */
//$fecha_adopcion = "";
//$id_cartilla = "";
//$id_ciudadano = null;
/* $id_personalidad = 1;
$id_raza = 1;
$id_refugio = 1; */

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
print_r($gato2->Get_Perfil_Gato());

$lista = new Lista();
$lista->Select_Gatos();
 */

/* $nombre = "kakakkaa";
$username = "Test";
$email = "test@gmail.com";
$password = "Kaooie";
$telefono = "457815";
$genero = "amsculino";
$foto_perfil = "httml asdf";

$ciudadano1 = new Ciudadano(
    [
        "nombre" => $nombre,
        "username" => $username,
        "email" => $email,
        "password" => $password,
        "telefono" => $telefono,
        "genero" => $genero,
        "foto_perfil" => $foto_perfil
    ]
);

$resultados = $ciudadano1->Get_Perfil_Ciudadano();
print_r($resultados);
echo "<br><br>";
echo json_encode($resultados);
$ciudadano1->Registrar_Ciudadano(); */

/* $username = $_GET['username'];
$password = $_GET['password']; */

//$conexion = new Conexion();
//$conexion->SetDelete("Ciudadano", "username = ",$username);
/* $ciudadano = new Ciudadano();
$ciudadano->Constructor_Iniciar_Sesion($username, $password);
$ciudadano->Iniciar_Sesion();
$resultado = $ciudadano->Get_Perfil_Ciudadano(); */


/* 
$lista = new Lista();
$resultados = $lista->Select_Refugios();
echo json_encode($resultados); */

//?nombre=encargado1&username=enc1&email=jasdf@gmail.com&password=Kazoa&telefono=0123456789&foto_perfil=FotoBv&id_refugio=1

/* $nombre = "encargado1";
$username = "enc1";
$email = "jasdf@gmail.com";
$password = "Kazoa";
$telefono = "1234567891";
$foto_perfil = "Bf";
//$fecha_ingreso = "";
$id_refugio = 1; */

/* $encargado = new Encargado();
$encargado->Constructor_Registro($_GET);
$encargado->Registrar_Encargado(); */

$id_ciudadano = $_GET['id_ciudadano'];
$id_gato = $_GET['id_gato'];
$tabla = $_GET['tabla'];
$columna = $_GET['columna'];
$condiciones = "id_gato =";

$conexion = new Conexion();
$conexion->SetActualizarRelacion($tabla, $id_gato,$id_ciudadano,$columna, $condiciones);


?>