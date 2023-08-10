<?php
use Core\Auth;
use Core\Session;
use Http\Form\LoginForm;
$form = LoginForm::checkLogin($atributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);
$singin = Auth::atempt($_POST['email'], $_POST['password']);
if ($singin) {
    $form->errorHand('email','No matching email and password')->throw();
}
redirect('/');
