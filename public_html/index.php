<?php

require_once __DIR__ . DIRECTORY_SEPARATOR .'..'. DIRECTORY_SEPARATOR .'config'. DIRECTORY_SEPARATOR . 'config.php';

$router = new Router(ROUTE_PATH, AUTH_PATH, FORM_PATH);
$router->getURL();
$router->getRoute();
