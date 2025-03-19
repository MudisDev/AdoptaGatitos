<?php

// Recibir las variables
$username = $_GET["username"];

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
$sql = "DELETE FROM Ciudadano WHERE username =  '$username'";

if (mysqli_query($conn, $sql)) {
    echo "Se elimino con éxito";
} else {
    echo "Error al eliminar usuario: " . mysqli_error($conn);
}

mysqli_close($conn);

?>