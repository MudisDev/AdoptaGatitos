<?php

$username = $_GET["username"];

// Credenciales de autentificacion del servidor 
$server = 'localhost';
$user = 'u826668871_root2';
$passwordb = 'Kazooie2518';
$bdname = 'u826668871_adoptagatitos';

$conn = mysqli_connect($server, $user, $passwordb, $bdname);
if (!$conn) {
    die("Error al conectarse a la base de datos");
}

$sql = "DELETE FROM Encargado WHERE username = '$username'";

if (mysqli_query($conn, $sql)) {
    if (mysqli_affected_rows($conn) > 0) {
        echo "Success, encargado eliminado correctamente";
    } else {
        echo "Error, no se encontró ningún encargado con ese username";
    }
} else {
    echo "Error, no se pudo ejecutar la consulta: " . mysqli_error($conn);
}
mysqli_close($conn);

?>