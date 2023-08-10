<?php

namespace Core;

class Validate
{
    public static function string($long,$min=3,$max = INF){
        $long = trim($long);
        if (strlen($long) >= $min && strlen($long) < $max){
            return true;
        }else{
            return  false;
        }
    }
    public static function email($email){
        $email = trim($email);
        if (filter_var($email,FILTER_VALIDATE_EMAIL)){
            return true;
        }else{
            return false;
        }

    }

}