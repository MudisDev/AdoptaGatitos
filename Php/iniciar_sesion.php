<?php

// Habilitar CORS para permitir solicitudes de cualquier origen
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

// Recibir las variables
$username = $_GET["username"];
$password = $_GET["password"];

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
$sql = "SELECT * FROM Ciudadano WHERE (username='$username')";

//ejecucion de la sentencia
$result = mysqli_query($conn, $sql);

//mostrar resultados
$datos = array();
$band = False;
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        /*  if (password_verify($contrasenia, $row['contrasenia'])) { */
        if ($password === $row['password']) {
            $band = True;
            //$datos = array('id_usuario' => $row['id_usuario'], 'nombre' => $row['nombre'], /* 'contrasenia' => $row['contrasenia'], */ 'telefono' => $row['telefono'], 'email' => $row['email'], 'fecha_registro' => $row['fecha_registro'], 'imagen_perfil' => $row['imagen_perfil']);
            $datos = ['username' => $row['username'], 'nombre' => $row['nombre'], /* 'contrasenia' => $row['contrasenia'], */ 'telefono' => $row['telefono'], 'email' => $row['email'], 'fecha_registro' => $row['fecha_registro'], 'foto_perfil' => $row['foto_perfil'], 'genero' => $row['genero']];
        } else {
            $band = False;
            echo json_encode(["error" => "Password invalida"]);
        }
    }
    if ($band == True) {
        echo json_encode($datos);
    }
} else {
    echo json_encode(["error" => "Credenciales invalidas"]);
}

mysqli_close($conn);

?>