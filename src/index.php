<?php


require_once __DIR__ . "/container/boostrap.php";

require_once __DIR__ . "/web/router.php";




$app->resolve('router')->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

