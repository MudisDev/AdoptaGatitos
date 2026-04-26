<?php

session_start();
session_unset();
session_destroy();

setcookie(session_name(), '', time() - 3600, '/');

http_response_code(200);
echo json_encode([
    "success" => true,
    "message" => "Sesión cerrada"
]);
?>