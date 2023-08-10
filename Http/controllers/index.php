<?php
use Core\Database;

//$id = $_GET['id'];
//$query = 'select usersName from sale where id = ?';
//$posts = $db->query($query,[$id])->fetchAll();
//foreach ($posts as $each){
//    echo "<li>".$each['usersName']."</li>";
//}
view('index.view.php',[
    'healing'=>'Home'
]);

