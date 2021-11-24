<?php

namespace app\models;

use app\core\Application;
use app\core\Model;

class LoginModel extends Model{

    public string $email;
    public string $password;


    public function rules(): array
    {
        return [
            'email'=>[self::RULE_REQUIRED,self::RULE_EMAIL],
            'password'=>[self::RULE_REQUIRED]
        ];
    }

    public function login(){
        $user=RegisterModel::findOne(['email'=>$this->email]);
        if(!$user){
            $this->addError('email','user does not exist with this email');
            return false;
        }
        if(!password_verify($this->password,$user->password)){
            $this->addError('email','user does not exist with this email');
            return false;
        }

        //auth user
       return Application::$app->login($user);
    }
}