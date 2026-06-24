<?php

include __DIR__ . '/../utils/response.php';
include __DIR__ . '/../app.php';

// se encarga de obtener la url, el método http y las cabeceras
$url = explode('/', $_SERVER['REQUEST_URI']);
$url = array_filter($url);
$metodoHttp = $_SERVER['REQUEST_METHOD'];
$headers = getallheaders();

// se encarga de crear las respuestas
$respuestasError = new RespuestasError();
$respuestasOk = new RespuestasOk();

if (count($url) == 0) {
    // se encarga de mostrar la bienvenida a la api
    $respuestasOk->ok('Bienvenido a ' . NAME_APP, [
        'name' => NAME_APP,
        'version' => VERSION_APP
    ]);
} else {
    // se encarga de redirigir a la version de la api
    switch ($url[1]) {
        case 'v1':
            include __DIR__ . '/v1/api.php';
            break;
        default:
            $respuestasError->notFound();
            break;
    }
}