<?php

function validateArgCount($argc)
{
    if($argc < 2)
    {
        printf("Type --help to see all commands");
        return false;
    }
    if($argc > 3)
    {
        printf("Too many arguments! type --help to see all commands");
        return false;
    }
    return true;
}
function parseCommand($argv, $argc) : array
{
    $return = [];
    $isThereAnyArgument = false;
    if($argc == 3) $isThereAnyArgument = true;

    ($isThereAnyArgument ) ? $count = 3 : $count = 2;
    
    for($i = 1; $i < $count; $i++)
    {
        $return[] = $argv[$i];
        
    }
    return $return;
}