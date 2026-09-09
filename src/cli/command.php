<?php

require __DIR__ . "/../cli/execute.php";

function executeCommand(array $command)
{
    switch($command[0])
    {
        case "help":
        {
            displayHelpMsg();
            break;
        }
        
    }
}   