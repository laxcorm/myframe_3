<?php

namespace app\models;

use app\core\DbModel;
use PDO;

class Food extends DbModel
{

  public string $salad = '';
  public string $garnish = '';
  public string $sidedish = '';

  public function attributes(): array
  {
    return ['salad', 'garnish', 'sidedish'];
  }

  static public  function tableName(): string
  {
    return 'dishes';
  }

  static public function primaryKey(): string
  {
    return 'id';
  }

  public function fetchFood()
  {
    $tableName = static::tableName();
    $statement = self::prepare("SELECT * FROM $tableName");
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }
}
