<?php

include __DIR__ . '/../utils/response.php';
include __DIR__ . '/../app.php';

$url = explode('/', $_SERVER['REQUEST_URI']);
$url = array_filter($url);
$metodoHttp = $_SERVER['REQUEST_METHOD'];
$headers = getallheaders();

$respuestasError = new RespuestasError();
$respuestasOk = new RespuestasOk();

if (count($url) == 0) {
    $respuestasOk->ok('Bienvenido a ' . NAME_APP, [
        'name' => NAME_APP,
        'version' => VERSION_APP
    ]);
} else {
    switch ($url[1]) {
        case 'v1':
            include __DIR__ . '/v1/api.php';
            break;
        default:
            $respuestasError->notFound();
            break;
    }
}