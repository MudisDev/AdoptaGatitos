<?php

// Habilitar CORS para permitir solicitudes de cualquier origen
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

// Recibir las variables
$id_gato = $_GET["id_gato"];

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
$sql = "SELECT * FROM Gato WHERE (id_gato='$id_gato')";

//ejecucion de la sentencia
$result = mysqli_query($conn, $sql);

//mostrar resultados
$datos = array();
$band = False;
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        $datos = [
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

} else {
    echo json_encode(["error" => "El ID no corresponde a ningun gato registrado"]);
}

mysqli_close($conn);

?>