<?php 

//Create a mapping between an url and a controller, IT'S URL (ADDRESSING) NOT PATH !!!!!!!!!!!!!!!!!

$suffix = __DIR__ . '/../controller/';
$routing = [
    $suffix . 'index.php' => ['/', ''],
    $suffix . 'register.php' => ['/register.php'],
    $suffix . 'login.php' => ['/login.php'],
    $suffix . 'logout.php' => ['/logout.php'],
    $suffix . 'random.php' => ['/random.php'],
    $suffix . 'createProject.php' => ['/createProject.php']
];

$url = $_SERVER['REQUEST_URI'];

if (substr($url, 0, strlen('/index.php')) == '/index.php') {
    $url = substr($url, strlen('/index.php'));
}

if (strpos($url, '?')) {
    $url = substr($url, 0, strpos($url, '?'));
}

//SELECT THE CONTROLLER ITSELF
$config = include __DIR__ . '/../config/config.php';

if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}

foreach ($routing as $controller => $urls){
    if (in_array($url, $urls)) {
        require_once $controller;
    }
}

session_write_close();