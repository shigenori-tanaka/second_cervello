<?php require_once('dbconnect.php')?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf8">
        <link rel="stylesheet" href="update_do.css">
        <title >second cervello</title>
    </head>

    <body>
        <?php 
            $statement = $db -> prepare('UPDATE memo SET title=?, body=? WHERE id =? ');
            $statement -> execute(array($_POST['title'],$_POST['body'],$_POST['id']));

        ?>

        <header>
            <h3 class="app_name"><a href="top.php">- second cervello <span>"Update"</span>-</a></h3>
            <div class="brunk"></div>
        </header>
        <div class="index">
            <a href="index.php">一覧へ戻る</a>
        </diV>
        <p class="title">内容を変更しました</p>
        
        <div class="form">
            <p class="main_title">タイトル</p>  
            <p> <?php echo $_POST['title'];?> </p> 
            <p class="main_body"> 内容</p>
            <p>
                <?php echo nl2br($_POST['body']); ?>
            </p>
        </div>
    </body>
</html>