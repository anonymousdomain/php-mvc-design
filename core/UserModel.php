<?php 


namespace app\core;
use app\core\database\DbModel;
abstract class UserModel extends DbModel{

    abstract public function getName():string;
    
}