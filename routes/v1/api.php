<?php

$servicio = null;

if (count($url) > 1) {
    $servicio = $url[2];

    if ($servicio == 'auth' && $metodoHttp == 'POST') {
        // iniciar sesión
        include __DIR__ . '/../../controllers/auth.controller.php';
    } elseif ($servicio != 'auth' && empty($headers['Authorization'])) {
        // no se proporciono token
        $respuestasError->unauthorized();
    } elseif ($servicio != 'auth' && !empty($headers['Authorization'])) {
        // validar autentificación con el token
        $respuestasOk->ok();
    } else {
        // no se encuentra el recurso
        $respuestasError->notFound('Recurso no encontrado');
    }
}