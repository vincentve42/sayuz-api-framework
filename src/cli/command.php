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
            printf("Do you mean?\n");
            printf("php src/sayuz.php create:controller\nphp src/sayuz.php create:model\n");
            break;

        }
        case "create:":
        {
            printf("Do you mean?\n");
            printf("php src/sayuz.php create:controller\nphp src/sayuz.php create:model\n");
            break;

        }
        case "create:model":
        {
            if(isset($command[1]))
            {
                if(strlen($command[1] == 0))
                {
                    printf("Please insert a name for the model\n");
                    return;
                }
                if(is_numeric($command[1]))
                {
                    printf("Model name must not started with integer\n");
                    return;
                }
                createModel($command[1]);
                return;
            }    
            printf("Type the model name: ");
            $command[1] = readline();
            if(strlen($command[1] == 0))
            {
                printf("Please insert a name for the model\n");
                return;
            }
            if(is_numeric($command[1]))
            {
                printf("Model name must not started with integer\n");
                return;
            }
           
            createModel($command[1]);
            break;
        }
        case "create:controller":
        {
            if(isset($command[1]))
            {
                if(strlen($command[1] == 0))
                {
                    printf("Please insert a name for the controller\n");
                    return;
                }
                if(is_numeric($command[1]))
                {
                    printf("Controller name must not started with integer\n");
                    return;
                }
                createController($command[1]);
                return;
            }    
            printf("Type the Controller name: ");
            $command[1] = readline();
            if(strlen($command[1] == 0))
            {
                printf("Please insert a name for the controller\n");
                return;
            }
            if(is_numeric($command[1]))
            {
                printf("Controller name must not started with integer\n");
                return;
            }
           
            createController($command[1]);
            break;
        }
        case "run":
        {
            runServer();
            break;
        }
        
    }
}   