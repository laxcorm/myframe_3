<?php

namespace app\models;

use app\core\DbModel;

class User extends DbModel
{
    static public function tableName(): string
    {
        return '';
    } 

    public function attributes(): array
    {
        return [];
    }

    static function primaryKey(): string
    {
        return '';
    }
}
