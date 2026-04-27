<?php

require_once __DIR__ . '/../../utils/logout.php';

Cerrar_Sesion();

http_response_code(200);
echo json_encode([
    "Success" => true,
    "message" => "Sesión cerrada"
]);