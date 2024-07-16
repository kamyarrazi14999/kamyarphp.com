<?php
$mysql = new mysqli('localhost','root','','baba');
if($mysql->connect_error){
die("connect error: " . $mysql->connect_error);

}
echo "Connected successfully";
?>