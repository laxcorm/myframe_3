<?php

namespace app\core;

abstract class DbModel extends Model
{
    abstract static public function tableName(): string; //я добавил static 

    abstract public function attributes(): array;

    abstract static function primaryKey(): string;

    public static function prepare($sql)
    {
        return Application::$app->db->pdo->prepare($sql);
    }
    
    static public function findOne($where) //[email => fdkjfk@gamel.com, firstname => Name] 4:09:29
    {
        $tableName = static::tableName(); //4:09:50
        $attributes = array_keys($where);
        $sql = implode("AND ", (array_map(fn ($attr) => "$attr = :$attr", $attributes)));
        //SELECT*FROM $tableName WHERE $sql
        $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
        foreach ($where as $key => $item) {
            $statement->bindValue(":$key", $item);
        }
        $statement->execute();
        return $statement->fetchObject(static::class);
    }
}
