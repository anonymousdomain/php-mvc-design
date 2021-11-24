<?php 

namespace app\models;

use app\core\Model;

class ContactForm extends Model{

 public string $email='';
 public string $password='';
 public string $body='';
 
 public function rules(): array
 {
     return [
      'email'=>[self::RULE_REQUIRED,self::RULE_EMAIL],
      'password'=>[self::RULE_REQUIRED],
      'body'=>[self::RULE_REQUIRED]   
     ];
 }
 public function lables()
 {
     return [
         'email'=>'Enter Your Email',
         'password'=>'Enter Your Password',
         'body'=>'bdoy',

     ];
 }

 public function send(){
     return ;
 }
}