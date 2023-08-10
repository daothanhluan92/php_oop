<?php
use Core\App;
use Core\Session;
use Http\Form\LoginForm;
LoginForm::checkLogin($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);
$db = App::Container()->resolver('Core\Database');
$checkEmail = $db->query('select * from sale where usersMail = :email',[
    'email'=>$email
])->rowCount();
if($checkEmail){
    Session::oldValue($email);
 redirect('/register');
}else{
    $db->query('insert into sale(usersMail,usersPwd) values(:email, :password)',[
        'email'=> $email,
        'password'=> password_hash($password, PASSWORD_BCRYPT)

    ]);
    Session::put('user',[
        'email'=>$email
    ]);
    redirect('/');
}


