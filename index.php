<?php

include 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

include 'controllers/ruta.controller.php';
$ruta = new RutaController();
$ruta->index();