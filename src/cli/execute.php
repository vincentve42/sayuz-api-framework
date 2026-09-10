<?php

require __DIR__ . "/fileHandling.php";


function displayHelpMsg()
{
    printf("List Commands\n");
    printf("1. help\t\t\t| see all commands\n");
    printf("2. run\t\t\t| start the server\n");
    return;
}

function runServer()
{
    require __DIR__ . '/../config/config.php';
    shell_exec("php -S" .$serverRunConfig["hostname"].":".$serverRunConfig["port"] . " ". __DIR__ . "\..\index.php");
}
