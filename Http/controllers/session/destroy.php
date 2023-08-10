<?php
$_SESSION = [];
session_destroy();
setcookie('cookieid','',time() - 3600);
redirect('/');