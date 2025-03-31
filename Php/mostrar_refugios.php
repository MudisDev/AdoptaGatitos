<?php

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
$sql = "SELECT * FROM Refugio";

//ejecucion de la sentencia
$result = mysqli_query($conn, $sql);

//mostrar resultados
$datos = array();
$band = False;
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $datos[] = ['id_refugio' => $row['id_refugio'], 'direccion' => $row['direccion'], 'telefono' => $row['telefono'], 'email' => $row['email']];
    }
    echo json_encode($datos);
} else {
    echo json_encode(["error" => "No hay refugios registrados"]);
}

mysqli_close($conn);
?>