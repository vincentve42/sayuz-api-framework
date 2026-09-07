<?php
namespace Sayuz\SayuzFramework\class;

use PDO;

abstract class Controller{
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
}