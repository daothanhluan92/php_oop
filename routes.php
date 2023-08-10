<?php

$router->get('/','index.php');
$router->get('/about','about.php')->only('guest');
$router->get('/contact','contact.php')->only('guest');


$router->get('/register','register/create.php')->only('guest');
$router->post('/register','register/store.php')->only('guest');

$router->get('/login','session/index.php')->only('guest');
$router->post('/login','session/store.php')->only('guest');
$router->post('/logout','session/destroy.php')->only('auth');


$router->get('/middleware','Core/Middleware/Middleware.php')->only('guest');

