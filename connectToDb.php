<?php
$host = 'mysql.0hosting.me';
$user = 'u431955690_user';
$pass = 'ltvmzyjd';
$db = 'u431955690_tatoo';

$connection = mysql_connect($host, $user, $pass);
mysql_set_charset('utf8', $connection);

if(!$connection || !mysql_select_db($db, $connection)){
    exit(mysql_error());
}


?>