<?php
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
            'fecha_ingreso' => $row['fecha_ingreso'],
            'descripcion' => $row['descripcion'],
            'estado' => $row['estado'],
            'edad' => $row['edad'],
            'color' => $row['color'],
            'fecha_adopcion' => $row['fecha_adopcion'],
            'id_cartilla' => $row['id_cartilla'],
            'id_ciudadano' => $row['id_ciudadano'],
            'id_personalidad' => $row['id_personalidad'],
            'id_raza' => $row['id_raza'],
            'id_refugio' => $row['id_refugio']
        ];
    }

    echo json_encode($datos);
} else
    echo json_encode(["error" => "No hay mininos registrados"]);

mysqli_close($conn);
?>