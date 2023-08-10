<?php
namespace Core;
use PDO;
#require base_path('config.php');
class Database{
    public $syn;
    public function __construct($config)
    {
        $dsn = 'mysql:'.http_build_query($config,'',';');
        $this->syn = new PDO($dsn,$config['user'],'',[
            PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC
        ]);

    }
   function query($query,$param=[]){
        $statement = $this->syn->prepare($query);
        $statement->execute($param);
        return $statement;
    }
}

