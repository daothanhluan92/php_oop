<?php

namespace Core;

class Container
{
    protected $binding = [];
    public function bind($key,$func){
        $this->binding[$key] = $func;
    }
    public function resolver($key){
        if (!array_key_exists($key,$this->binding)){
            throw new \Exception('No key accepted');
        }
        $func = $this->binding[$key];
        return call_user_func($func);
    }
}