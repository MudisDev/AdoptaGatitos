<?php

// Recibir las variables
$username = $_GET["username"];
$nombre = $_GET["nombre"];
$email = $_GET["email"];
$password = $_GET["password"];
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
$sql = "UPDATE Ciudadano 
SET nombre='$nombre', email='$email', password='$password', telefono='$telefono', genero='$genero', foto_perfil='$foto_perfil'
WHERE username =  '$username'";

if (mysqli_query($conn, $sql)) {
    echo "Se actualizo el perfil con éxito";
} else {
    echo "Error al actualizar perfil: " . mysqli_error($conn);
}

mysqli_close($conn);

?>