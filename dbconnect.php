<?php
try{
    $DSN = 'mysql:dbname=dftv124odntdma; host=ec2-52-207-93-32.compute-1.amazonaws.com; charset=utf8';
    $db = new PDO($DSN,'onvpenrlfwvnpw','a88a99591112ba605b2b18629e8769fda7003c9f394e0ee185339fa1008909f2');
}   catch(PDOException $e){
    echo 'DB接続エラー:'.$e->getMessage();
}
?>