<?php
require_once UTILS . 'router.php';
require_once CONTROLLERS . 'homeController.php';


$HomeController = new HomeController();


Router::get('/', function () use($HomeController) {
    $HomeController->Index();
});


Router::get('/profile', function () use ($HomeController){
    $HomeController->profile();
});


Router::get('/skills', function () use ($HomeController){
    $HomeController->skills();
});
