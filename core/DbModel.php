<?php

namespace app\core;

abstract class DbModel extends Model
{
    abstract public function tableName(): string;
    abstract public function attribute(): array;
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

    public static function prepare($sql)
    {
        return Application::$app->db->pdo->prepare($sql);
    }
}
