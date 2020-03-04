<?php
try{
    $DSN = 'mysql:dbname=second_cervello; host=localhost; charset=utf8';
    $db = new PDO($DSN,'root','root');
}   catch(PDOException $e){
    echo 'DB接続エラー:'.$e->getMessage();
}
?>