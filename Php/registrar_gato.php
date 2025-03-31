<?php

$nombre = $_GET['nombre'];
$genero = $_GET['genero'];
$foto = $_GET['foto'];
$fecha_ingreso = $_GET['fecha_ingreso'];
$descripcion = $_GET['descripcion'];
//$estado = $_GET['estado'];
$edad = $_GET['edad'];
$color = $_GET['color'];
$id_personalidad = $_GET['id_personalidad'];
$id_raza = $_GET['id_raza'];
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
// Inserción de datos
$sql = "INSERT INTO Gato (nombre, genero, foto, fecha_ingreso, descripcion, estado, edad, color, fecha_adopcion, id_cartilla, id_ciudadano, id_personalidad, id_raza, id_refugio) VALUES
('$nombre', '$genero', '$foto', '$fecha_ingreso', '$descripcion', 'Sin adoptar', '$edad', '$color', NULL, NULL, NULL, '$id_personalidad', '$id_raza', '$id_refugio')";
#('Simba2', 'Macho', 'simba.jpg', '2025-02-10', 'Juguetón y enérgico', 'En adopción', 1, 'Naranja', NULL, NULL, NULL, 3, 2, 1)";

if (mysqli_query($conn, $sql)) {
    echo json_encode(["success" => "Registro de minimo exitoso"]);

} else {
    echo json_encode(["error" => "Error al registrar al minino" . mysqli_error($conn)]);
}

mysqli_close($conn);
?>
