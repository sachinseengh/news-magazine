<?php


abstract class Common
{
    abstract function save();
    abstract function retrieve();
    abstract function edit();
    abstract function delete();
    

    public function set($key,$value){
        $this->$key=$value;
    }
}

?>