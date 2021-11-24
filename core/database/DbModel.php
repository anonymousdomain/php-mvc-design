<?php

namespace app\core\database;
use app\core\Model;
use app\core\Application;

abstract class DbModel extends Model
{
    abstract static public function tableName(): string;
    abstract public function attribute(): array;
    abstract  public static function primaryKey():string;
    public function save()
    {
        $tableName = $this->tableName();
        $attributes = $this->attribute();
        $params = array_map(fn ($attr) => ":$attr", $attributes);
        $statment = self::prepare("INSERT INTO $tableName(" . implode(',', $attributes) . ")
        VALUES(" . implode(',', $params) . ")");
        foreach ($attributes as $attribute) {
            $statment->bindValue(":$attribute", $this->{$attribute});
        }
        $statment->execute();
        return true;
    }

    public static function findOne($where)
    {
        $tableName = static::tableName();
        $attributes = array_keys($where);
        $sql = implode("AND", array_map(fn ($attr) => "$attr=:$attr", $attributes));
        $statment = self::prepare("SELECT * FROM $tableName WHERE $sql");
        foreach ($where as $key => $value) {
            $statment->bindValue(":$key", $value);
        }

        $statment->execute();
        //return the user class
        return $statment->fetchObject(static::class);
    }

    public static function prepare($sql)
    {
        return Application::$app->db->pdo->prepare($sql);
    }
}
