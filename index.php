<?php

session_start(); // Mulai sesi

$method = $_GET['m'] ?? 'index';

if (isset($_SESSION["username"]))
    $controller = $_GET['c'] ?? 'Character';
else
    $controller = $_GET['c'] ?? 'Auth';

include_once "controllers/Controller.class.php";
include_once "controllers/$controller.class.php";
(new $controller)->$method();