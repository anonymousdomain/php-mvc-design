<?php 

class Request {

    public function getPath(){

        $path=$_SERVER['REQUEST_URI']??'/';
        $pos=strpos($path,'?');

        if($pos===false){
            return $path;
        }
        return substr($path,0,$pos);
    }

    public function getMethod(){


    }

}