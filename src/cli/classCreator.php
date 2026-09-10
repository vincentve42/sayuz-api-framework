<?php
function modelContent(string $modelName) : string
{
    $content = "<?php\nnamespace Sayuz\SayuzFramework\model;\nuse Sayuz\SayuzFramework\class\Model;\nclass $modelName extends Model{\n\n}";

    return $content;

}
function controllerContent(string $controllerName) : string
{
    $content = "<?php\nnamespace Sayuz\SayuzFramework\controller;\nuse Sayuz\SayuzFramework\class\Controller;\nclass $controllerName extends Controller{\n\n}";

    return $content;

}
function createModel(string $modelName)
{
    if(!isModelExist($modelName))
    {
        return;
    }
    $file = fopen(__DIR__ . "/../model/$modelName.php", "w");
    fwrite($file, modelContent($modelName));
    return;
}
function createController(string $controllerName)
{
    if(!isControllerExist($controllerName))
    {
        return;
    }
    $file = fopen(__DIR__ . "/../controller/$controllerName.php", "w");
    fwrite($file, controllerContent($controllerName));
    return;
}
?>