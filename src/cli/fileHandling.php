<?php

function isModelExist(string $name) : bool
{
    $targetFile = __DIR__ . "/../model/" . $name. ".php";
    if(file_exists($targetFile))
    {
        printf("Model already exist please delete or create a new one with different name\n");
        return false;
    }
    return true;
}
function isControllerExist(string $name) : bool
{
    $targetFile = __DIR__ . "/../controller/" . $name. ".php";
    if(file_exists($targetFile))
    {
        printf("Model already exist please delete or create a new one with different name\n");
        return false;
    }
    return true;
}