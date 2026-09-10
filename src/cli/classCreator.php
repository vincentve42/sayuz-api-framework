<?php
function modelContent(string $modelName) : string
{
    $content = "<?php\nnamespace Sayuz\SayuzFramework\model;\nuse Sayuz\SayuzFramework\class\Model;\nclass $modelName extends Model{\n\n}";

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

?>