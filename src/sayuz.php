<?php

require __DIR__ . "/../src/cli/parsing.php";

if(validateArgCount($argc))
{
    $command = parseCommand($argv, $argc);
}

