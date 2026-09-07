<?php

namespace Sayuz\SayuzFramework\class;

use Exception;

class Container{
    private $list = [];
    public function bind(string $name,object $className)
    {
        if(isset($this->list[$name]))
        {
            throw new Exception("The path already binded");
        }
        $this->list[$name] = $className;
    }
    public function resolve(string $name){
        if(!isset($this->list[$name]))
        {
            throw new Exception("Path or class not exist");
        }
        return $this->list[$name];
    }

}