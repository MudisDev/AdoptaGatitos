<?php

// Habilitar CORS para permitir solicitudes de cualquier origen
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

// Recibir las variables
$username = $_GET["username"];
$nombre = $_GET["nombre"];
$email = $_GET["email"];
$password = $_GET["password"];
#$fecha_registro = $_GET["fecha_registro"];
$telefono = $_GET['telefono'];
#$genero = $_GET['genero'];
$foto_perfil = $_GET['foto_perfil'];
$id_refugio = $_GET['id_refugio'];

// Credenciales de autentificacion del servidor 
$server = 'localhost';
$user = 'u826668871_root2';
$passwordb = 'Kazooie2518';
$bdname = 'u826668871_adoptagatitos';

// Conectar a la bd
$conn = mysqli_connect($server, $user, $passwordb, $bdname);
if (!$conn) {
    die('Error al conectarse a la bd');
}

echo 'nombre->', $nombre, 'username->', $username, 'email->', $email, 'password->', $password, 'telefono->', $telefono, 'fotoPerfil->', $foto_perfil, 'id_refugio->', $id_refugio;

// Inserción de datos
//$sql = "INSERT INTO Encargado (nombre, username, email, password, fecha_registro, telefono, foto_perfil, id_refugio)
//VALUES ('$nombre', '$username', '$email', '$password', CURDATE(), '$telefono', '$foto_perfil', '$id_refugio')";
$sql = "INSERT INTO Encargado (nombre, username, email, password, telefono, foto_perfil, fecha_ingreso, id_refugio)
    VALUES ('$nombre', '$username', '$email', '$password', '$telefono', '$foto_perfil', CURDATE(), '$id_refugio')";
/* $sql = "INSERT INTO Encargado (nombre, username, email, password, telefono, foto_perfil, fecha_ingreso, id_refugio) VALUES
('Carlos Ramírez', 'carlosr2', 'carlos2@gatos.com', 'admin123', '5555555555', 'carlos.jpg', CURDATE(), 2)";  */

if (mysqli_query($conn, $sql)) {
    echo json_encode(["success" => "Registro exitoso"]);

} else {
    echo json_encode(["error" => "Error al insertar" . mysqli_error($conn)]);
}

mysqli_close($conn);

?>