<?php

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/config/bootstrap.php';

use app\controllers\UserController;
use app\core\Application;
use Symfony\Component\HttpFoundation\Request;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$request = Request::createFromGlobals();

$rootDir = $_SERVER['DOCUMENT_ROOT']."/ship-crew-notification";

$app = new Application($rootDir);

$app->router->get('/', [[UserController::class, 'users'], [$entityManager]]);
$app->router->get('/users', [[UserController::class, 'users'], [$entityManager]]);
$app->router->post('/saveUsers', [[UserController::class, 'saveUsers'], [$entityManager,$request]]);
$app->router->get('/ships', [[UserController::class, 'ships'], [$entityManager]]);
$app->router->get('/crewmembers', [[UserController::class, 'crewmembers'], [$entityManager]]);
$app->router->get('/ranks', [[UserController::class, 'ranks'], [$entityManager]]);
$app->router->get('/notifications', [[UserController::class, 'notifications'], [$entityManager]]);

$app->run();


?>