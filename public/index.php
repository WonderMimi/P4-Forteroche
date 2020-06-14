<?php

require '../config/dev.php';
require '../vendor/autoload.php';

session_start();

$router = new \P4\config\Router();
$router->run();
