<?php
namespace Sayuz\SayuzFramework\class;

use PDO;
use PDOStatement;

abstract class Model{
    protected string $table;
    public int $id = 0;
    protected PDO $database;

    public function __construct(PDO $database)
    {
       $this->database = $database;
    }
    private function prepareInsertQueryStr($objectKeys, $query) : string{
        $query = $query . "INSERT INTO " . $this->table . "(";
        $count = 0;
        foreach($objectKeys as $eachObj)
        {
            
            if($count == 3)
            {
                $query = $query . $eachObj;
            }
            if($count > 3)
            {
                
                $query = $query . "," . $eachObj;
            }
            $count++;
        }
        $query = $query . ")";
        $count = 0;
        $query = $query . " VALUES(";
        foreach($objectKeys as $eachObj)
        {
            
            if($count == 3)
            {
                $query = $query . "?";
            }
            if($count > 3)
            {
                
                $query = $query . "," . "?";
            }
            $count++;
        }
        $query = $query . ")";
        return $query;
    }
    
    private function bindValueToQuery(PDOStatement $stmt, $objectVar)
    {
        $count = 0;
        $paramCount = 1;
        foreach($objectVar as $eachObject){
            if($count > 2)
            {
                $stmt->bindValue($paramCount, $eachObject);
                
                $paramCount+= 1;
            }
            $count++;
        }
    }
    public function save()
    {
       
        $query = "";
        $objectAtr = get_object_vars($this);

        $query = $this->prepareInsertQueryStr(array_keys($objectAtr), $query);

        $stmt = $this->database->prepare($query);

        $this->bindValueToQuery($stmt, $objectAtr);

        $stmt->execute();
       
    }
}
