<?php 


namespace app\core;

abstract class UserModel extends DbModel{

    abstract public function getName():string;
    
}