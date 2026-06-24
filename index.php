<?php
// carga las variables de entorno
include 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// permite el acceso a la api desde cualquier origen
header("Access-Control-Allow-Origin: " . $_ENV['APP_URL']);
// permite los métodos http
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
// permite las cabeceras
header("Access-Control-Allow-Headers: Content-Type, Authorization");

include 'controllers/ruta.controller.php';
$ruta = new RutaController();
$ruta->index();