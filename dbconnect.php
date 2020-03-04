<?php
try{
    $DSN = 'mysql:dbname=second_cervello; host=localhost; charset=utf8';
    $db = new PDO($DSN,'root','root');
}   catch(PDOException $e){
    echo 'DB接続エラー:'.$e->getMessage();
}

// try{
//     $url = parse_url(getenv('DATABASE_URL'));
//     $dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'], 1));
//     $pdo = new PDO($dsn, $url['user'], $url['pass']);
// }catch(PDOException $e){
//     echo 'DB接続エラー:'.$e->getMessage();
// }

?>