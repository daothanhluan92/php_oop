<?php

namespace Core;

class Session
{
    public static function put($key,$value){
        $_SESSION[$key] = $value;
    }
    public static function get($key){
        return $_SESSION['_flash'][$key] ?? $_SESSION[$key] ?? '';
    }
    public static function flash($key,$value)
    {
        $_SESSION['_flash'][$key] = $value;
    }
    public static function unflash($key){
        unset($_SESSION['_flash'][$key]);
    }

}