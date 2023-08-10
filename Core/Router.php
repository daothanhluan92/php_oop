<?php
namespace Core;

use Core\Middleware\Auth;
use Core\Middleware\Guest;
use Core\Middleware\Middleware;

class Router{
    protected $routes = [];
    public function add($uri,$controller,$method){
        $this->routes[] = [
            'uri'=>$uri,
            'controller'=>$controller,
            'method'=>$method,
            'middleware'=>null
        ];
       return $this;

    }
    public function get($uri,$controller){
        return $this->add($uri,$controller,'GET');
    }
    public function post($uri,$controller){
       return $this->add($uri,$controller,'POST');
    }
    public function only($key){
        $this->routes[array_key_last($this->routes)]['middleware']=$key;
        return $this;
    }
    public function delete($uri,$controller){
        return $this->add($uri,$controller,'DELETE');
    }
    public function put($uri,$controller){
        return $this->add($uri,$controller,'PUT');
    }
    public function patch($uri,$controller){
        return $this->add($uri,$controller,'PATCH');
    }
    public function backUrl(){
        return $_SERVER['HTTP_REFERER'];
    }
    public function router($uri,$method){
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri and $route['method'] === strtoupper($method)) {
             if ($route['middleware']){
                Middleware::relsove($route['middleware']);
             }
                return require base_path('Http/controllers/'.$route['controller']);
            }
        }
        $this->abort();
        }
    protected function abort($error=404){
            http_response_code($error);
            require "../views/{$error}.php";
            die();
        }
}
