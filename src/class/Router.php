<?php

namespace Sayuz\SayuzFramework\class;

use Exception;
use PDO;

class Router{
    private $listRouter = [];

    private PDO $database;
    public function __construct(PDO $database)
    {
        $this->database = $database;
    }
    public function add(string $url, string $method,$class, $controller)
    {
        foreach($this->listRouter as $eachRouter){
            if(isset($eachRouter['url']) && $eachRouter['url'] == $url && $eachRouter['method'] = $method)
            {
                throw new Exception("Url with the same method already exist!");
            }
        }
        $this->listRouter[] = ["url" => $url, "method" => $method, "class" => $class, "controller" => $controller];
    }
    public function resolve(string $url, string $method)
    {
        $url = parse_url($url);
       
        foreach($this->listRouter as $eachRouter)
        {
            if((isset($eachRouter)) && $eachRouter['url'] == $url['path'] && $eachRouter['method'] == $method)
            {
                $controllerMethod = $eachRouter['controller'];
                $controllerObj = new $eachRouter['class']($this->database);
                $controllerObj->$controllerMethod();
                return;
            }
        }
        echo "404";
    }
}