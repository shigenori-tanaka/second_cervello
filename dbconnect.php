<?php
// try{
//     $url = parse_url(getenv('DATABASE_URL'));
//     $DSN = 'mysql:dbname=dftv124odntdma; host=ec2-52-207-93-32.compute-1.amazonaws.com; charset=utf8';
//     $db = new PDO($DSN,'onvpenrlfwvnpw','a88a99591112ba605b2b18629e8769fda7003c9f394e0ee185339fa1008909f2');
// }   catch(PDOException $e){
//     echo 'DB接続エラー:'.$e->getMessage();
// }

try{
$url = parse_url(getenv('DATABASE_URL'));
$dsn = sprintf('pgsql:host=%s;dbname=%s', $url['ec2-52-207-93-32.compute-1.amazonaws.com'], substr($url['dftv124odntdma'], 1));   
$pdo = new PDO($dsn, $url['onvpenrlfwvnpw'], $url['a88a99591112ba605b2b18629e8769fda7003c9f394e0ee185339fa1008909f2']);
} catch(PDOException $e){
    echo 'DB接続エラー:'.$e->getMessage();
}

// function dbConnect(){
//     $db = parse_url($_SERVER['DATABASE_URL']);
//     $db['dftv124odntdma'] = ltrim($db['dftv124odntdma'], '/');
//     $dsn = "mysql:host={$db['ec2-52-207-93-32.compute-1.amazonaws.com']};dbname={$db['dftv124odntdma']};charset=utf8";
//     $user = $db['onvpenrlfwvnpw'];
//     $password = $db['a88a99591112ba605b2b18629e8769fda7003c9f394e0ee185339fa1008909f2'];
//     $options = array(
//       PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//       PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//       PDO::MYSQL_ATTR_USE_BUFFERED_QUERY =>true,
//     );
//     $dbh = new PDO($dsn,$user,$password,$options);
//     return $dbh;
//   }

?>