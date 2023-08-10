<?php
function dd($value){
        echo '<pre>';
        var_dump($value);
        echo '</pre>';
        die();
    }
    function urlIs($url){
        return $_SERVER['REQUEST_URI']===$url;
    }
    function base_path($path){
        return BASE_PATH.$path;
    }
    function view($path,$attribution=[]){
        extract($attribution);
        require base_path('views/'.$path);
    }
    function find($result){
        return $result->fetch();
    }
    function createUserSession($email){
       return $_SESSION['user'] = [
           'email' => $email
       ];
    }
    function redirect($path){
        header('location:'.$path);
        exit();
    }
    function old($key){
       return \Core\Session::get($key);
    }