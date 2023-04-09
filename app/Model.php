<?php

namespace app;

use app\Database;

abstract class Model{

    abstract function primaryKey(): string;
    abstract static public function tableName(): string;
    abstract static public function fields(): array;

    public static function prepare(string $sql){
        return Database::$instance->prepare($sql);
    }

    public static function getAll(int $limit = 10){
        $tableName = static::tableName();
        $state = self::prepare("
            SELECT * FROM $tableName 
            WHERE STATUS = 1
            ORDER BY DATE_CREATE desc 
            LIMIT :limit
        ");
        $state->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $state->execute();
        return $state->fetchAll();
    }

    public static function findOne(int $id){
        $tableName = static::tableName();
        $state = self::prepare("
            SELECT * FROM $tableName
            WHERE id = :id
        ");

        $state->bindValue(':id', $id, \PDO::PARAM_STR);
        $state->execute();
        return $state->fetchObject(static::class);
    }

    public function update(){
        $tableName = $this->tableName();
        $fields = $this->fields();
        $ID = $this->primaryKey();

        $params = array_map(fn($attr) => ":$attr", $fields);

        $sql = "";

        foreach($fields as $k => $v){
            $p  = $params[$k];
            $sql .= " $v = {$p},";
        }
        
        $sql = substr($sql,0, strlen($sql)-1);
        $state = $this->prepare("
            UPDATE $tableName SET 
            {$sql}
            WHERE ID = :ID
        ");


        foreach($fields as $field){
            $state->bindValue(":$field",$this->{$field});
        }
        
        $state->bindValue(':ID', $ID);
        $state->execute();
        return true;
    }

    public function save(){
        $tableName = $this->tableName();
        $fields = $this->fields();
        
        $params = array_map(fn($attr) => ":$attr", $fields);

        $state = $this->prepare("INSERT INTO $tableName (" . implode(",", $fields) . ") 
        VALUES (" . implode(",", $params) . ")");

        foreach ($fields as $field) {
            $state->bindValue(":$field", $this->{$field});
        }

        $state->execute();

        return true;
    }
}