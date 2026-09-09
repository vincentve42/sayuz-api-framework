<?php
namespace Sayuz\SayuzFramework\class;

use Exception;
use PDO;
use PDOException;
use PDOStatement;

abstract class Model{
    // default properties
    protected string $table;
    protected int $id = 0;
    protected PDO $database;
    //

    public function __construct(PDO $database)
    {
       $this->database = $database;
    }
    public function find($id){
        $stmt = $this->database->prepare("SELECT * FROM " . $this->table . "WHERE id=? LIMIT 1");
        $stmt->bindValue(1, $id, PDO::PARAM_INT);
        
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
    private function prepareUpdateQueryStr($objectKeys,$query) : string{
        $query = $query . " UPDATE " . $this->table . " SET ";
        $count = 0;
        foreach($objectKeys as $eachObj)
        {
            
            if($count == 3)
            {
                $query = $query . $eachObj . " = " . "?";
            }
            if($count > 3)
            {
                
               $query =  $query .  " , " . $eachObj . "= " . "?";
            }
            $count++;
        }
        $query = $query . " WHERE id=" . $this->id;
        
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
        if($this->id == 0)
        {
            $query = "";
            $objectAtr = get_object_vars($this);

            $query = $this->prepareInsertQueryStr(array_keys($objectAtr), $query);

            $stmt = $this->database->prepare($query);

            $this->bindValueToQuery($stmt, $objectAtr);
            try{

            
                $stmt->execute();
            }
            catch(PDOException $e){
                echo $e;
            }
        
            $stmt = $this->database->prepare("SELECT id FROM " . $this->table . " ORDER BY id DESC " . "LIMIT 1");
            try{
                $stmt->execute();
            }
            catch(PDOException $e){
                echo $e;
            }

            $this->id = $stmt->fetch()[0];

        }
        else
        {
            $query = "";
            $objectAtr = get_object_vars($this);
            $query = $this->prepareUpdateQueryStr(array_keys($objectAtr), $query);
            $stmt = $this->database->prepare($query);

            $this->bindValueToQuery($stmt, $objectAtr);
            try{
                $stmt->execute();
            }
            catch(PDOException $e){
                echo $e;
            }
        }
       
    }
}
