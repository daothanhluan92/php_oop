<?php
use Core\Container;
use Core\Database;
use Core\App;
$container = new Container();
$container->bind('Core\Database',function (){
    require base_path('config.php');
    return new Database($config['database']);
});
//$container->resolver('Core\Database');
App::setContainer($container);