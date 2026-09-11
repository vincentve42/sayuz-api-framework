<?php

require __DIR__ . "/fileHandling.php";


function displayHelpMsg()
{
    printf("List Commands\n");
    printf("1. help\t\t\t\t\t| see all commands\n");
    printf("2. run\t\t\t\t\t| start the server\n");
    printf("3. create:model [modelname]\t\t| create a model\n");
    printf("3. create:controller [controllername]\t| create a controller\n");
    return;
}

function runServer()
{
    require __DIR__ . '/../config/config.php';
    shell_exec("php -S" .$serverRunConfig["hostname"].":".$serverRunConfig["port"] . " ". __DIR__ . "/../index.php");
}
