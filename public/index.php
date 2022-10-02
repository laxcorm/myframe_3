<?php

use app\controllers\DisplayController;
use app\controllers\FoodController;
use app\core\Application;
// use app\controllers\AuthController;


require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
  'userClass'=>\app\models\User::class,
  'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']
    ],
];

$app  = new Application(__DIR__,$config);



// $app->router->get('/register', [AuthController::class, 'register']);
// $app->router->get('/register', [AuthController::class, 'register']);
//////////
$app->router->get('/', 'home');
$app->router->get('/contact', 'contact');
$app->router->get('/display', [DisplayController::class,'display']);
$app->router->get('/food',[FoodController::class, 'food']);



$app->run();
