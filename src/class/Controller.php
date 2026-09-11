<?php
namespace Sayuz\SayuzFramework\class;

use PDO;

class Controller{
    protected PDO $database;
    public function __construct($database)
    {
       $this->database = $database;
    }
    public function index()
    {

    }
    public function store(array $request)
    {
        
    }
    public function show($toShow)
    {
        
    }
    public function update(array $request, $toShow)
    {
        
    }
    public function destroy($toDestroy){

    }
    public static function view($fileName){
        if(file_exists(__DIR__ . "/../public/views/$fileName.php"))
        {
            require __DIR__ . "/../public/views/$fileName.php";
        }
        else
        {
            echo "File not found";
        }
       
    }
}