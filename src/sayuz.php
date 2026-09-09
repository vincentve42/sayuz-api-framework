<?php

require __DIR__ . "/../src/cli/parsing.php";
require __DIR__ . "/../src/cli/command.php";
if(validateArgCount($argc))
{
    $command = parseCommand($argv, $argc);
    executeCommand($command);
}

