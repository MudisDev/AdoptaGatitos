<?php

// Habilitar CORS para permitir solicitudes de cualquier origen
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: GET, OPTIONS");

// Recibir las variables
$username = $_GET["username"];
$nombre = $_GET["nombre"];
$email = $_GET["email"];
$password = $_GET["password"];
$fecha_registro = $_GET["fecha_registro"];
$telefono = $_GET['telefono'];
$genero = $_GET['genero'];
$foto_perfil = $_GET['foto_perfil'];


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

// Inserción de datos
$sql = "INSERT INTO Ciudadano (nombre, username, email, password, fecha_registro, telefono, genero, foto_perfil)
    VALUES ('$nombre', '$username', '$email', '$password', CURDATE(), '$telefono', '$genero', '$foto_perfil')";

if (mysqli_query($conn, $sql)) {
    echo "Se insertó con éxito";
} else {
    echo "Error al insertar: " . mysqli_error($conn);
}

mysqli_close($conn);

?>