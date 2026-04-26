<?php

function requireLogin()
{
    session_start();

    if (!isset($_SESSION['id_ciudadano'])) {
        http_response_code(401);
        echo json_encode(["Error" => "No autenticado"]);
        exit;
    }

    return $_SESSION['id_ciudadano'];
}

?>