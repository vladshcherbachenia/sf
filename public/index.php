<?php

require __DIR__ . '/../vendor/autoload.php';
$config = require __DIR__ . '/../config/web.php';
$request  = $_REQUEST;
$router = new \app\engine\Router($request);
$router->run();














