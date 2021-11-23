<?php

namespace app\models;

use app\core\DbModel;
use app\core\Model;

class RegisterModel extends DbModel
{

    public string $firstname='';
    public string $lastname='';
    public string $email='';
    public string $password='';
    public string $confirmPassword='';

    public function tableName(): string
    {
        return 'users';
    }
    public function register()
    {
       return $this->save();
    }

 public function rules(): array
 {
    return [
        'firstname' => [self::RULE_REQUIRED],
        'lastname' => [self::RULE_REQUIRED],
        'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [
            self::RULE_UNIQUE, 'class' => self::class
        ]],
        'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8],[self::RULE_MAX,'max'=>12]],
        'confirmPassword' => [self::RULE_REQUIRED,[self::RULE_MATCH, 'match' => 'password']],
    ];

 }

 public function attribute(): array
 {
     return['firstname','lastname','email','password'];
 }
}
