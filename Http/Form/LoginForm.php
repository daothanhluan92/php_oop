<?php
namespace Http\Form;
use Core\Auth;
use Core\Middleware\ValidateException;
use Core\Validate;
class LoginForm
{
    public $error = [];
    public function __construct(public array $atributes){
        if(! Validate::string($this->atributes['password'])){
            $this->error['password'] = 'Password No Valid';
        }
        if (! Validate::email($this->atributes['email'])){
            $this->error['email'] = 'Email No Valid';
        }
    }
    public static function checkLogin($atributes){
        $instance =  new static($atributes);
        $instance->failed() ? $instance->throw() : $instance;
    }
    public function throw(){
        ValidateException::throw($this->error(),$this->atributes);
    }
    public function failed(){
        return count($this->error);
    }
    public function error(){
        return $this->error;
    }
    public function errorHand($key,$message){
        $this->error[$key]= $message;
        return $this;
    }
}
