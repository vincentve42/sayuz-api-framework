<?php

require __DIR__ . "/../cli/execute.php";
require __DIR__ . "/classCreator.php";
function executeCommand(array $command)
{
    switch($command[0])
    {
        case "help":
        {
            displayHelpMsg();
            break;
        }
        case "create":
        {

        }
        case "create:model":
        {
            if(isset($command[1]))
            {
                if(strlen($command[1] == 0))
                {
                    printf("Please insert a name for the class\n");
                    return;
                }
                if(is_numeric($command[1]))
                {
                    printf("Model name must not a integer\n");
                    return;
                }
                createModel($command[1]);
                return;
            }    
            printf("Type the model name: ");
            $command[1] = readline();
            if(strlen($command[1] == 0))
            {
                printf("Please insert a name for the class\n");
                return;
            }
            if(is_numeric($command[1]))
            {
                printf("Model name must not a integer\n");
                return;
            }
           
            createModel($command[1]);
            break;
        }
        case "create:controller":
        {
            
        }
        case "run":
        {
            runServer();
            break;
        }
        
    }
}   