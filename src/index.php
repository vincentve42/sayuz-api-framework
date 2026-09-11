<?php

use Sayuz\SayuzFramework\model\s5;

require_once __DIR__ . "/container/boostrap.php";

require_once __DIR__ . "/web/router.php";

$url = parse_url($_SERVER['REQUEST_URI']);
$file = __DIR__ . $url['path'];

    
$app->resolve('router')->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);


