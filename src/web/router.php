<?php

use Sayuz\SayuzFramework\class\Router;
use Sayuz\SayuzFramework\controller\TestController;

$app->bind("router", new Router());

$router = $app->resolve('router');

$router->add("/", "GET", TestController::class, 'test');
