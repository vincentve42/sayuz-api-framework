<?php

use Sayuz\SayuzFramework\class\Container;
use Sayuz\SayuzFramework\class\Database;

require __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ ."/../config/config.php";

$app = new Container();
$app->bind('database', new PDO("mysql:host=" .$databaseConfig['host'] . ";dbname=" . $databaseConfig['database'] . "", $databaseConfig['username'], $databaseConfig['password']));

