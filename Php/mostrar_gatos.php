<?php

// Habilitar CORS para permitir solicitudes de cualquier origen
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

// Credenciales de autentificacion del servidor 
$server = 'localhost';
$user = 'u826668871_root2';
$passwordb = 'Kazooie2518';
$bdname = 'u826668871_adoptagatitos';

$conn = mysqli_connect($server, $user, $passwordb, $bdname);
if (!$conn) {
    die('Error al conectarse a la bd');
}

$sql = "SELECT * FROM Gato";

$result = mysqli_query($conn, $sql);

$datos = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $datos[] = [
            'id_gato' => $row['id_gato'],
            'nombre' => $row['nombre'],
            'genero' => $row['genero'],
            'foto' => $row['foto'],
            
            'edad' => $row['edad'],
            
        ];
    }

    echo json_encode($datos);
} else
    echo json_encode(["error" => "No hay mininos registrados"]);

mysqli_close($conn);
?>