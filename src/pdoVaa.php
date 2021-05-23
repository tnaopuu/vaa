<?php
require '../vendor/autoload.php';
//demarrage session
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

function e404 () {
    require '../public/404.php';
    exit();
}

function dd(...$vars) {
    foreach($vars as $var) {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }
}

function get_pdo (): PDO {
    return new PDO('mysql:host=localhost;dbname=vaa;port=3307', 'eleveSIO', 'tehina', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
}


function render(string $view, $parameters = []) {
    extract($parameters);
    include "../views/{$view}.php";
}

