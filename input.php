<?php require_once('dbconnect.php')?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf8">
        <link rel="stylesheet" href="input_php.css">
        <title >second cervello</title>
    </head>

    <body>
        <header>
            <h3 class="app_name"><a href="top.php">- second cervello <span>"Update"</span>-</a></h3>
            <div class="brunk"></div>
        </header>

        <div class="index">
            <a href="input.html">作成画面へ</a>
            |
            <a href="index.php">メモ一覧へ</a>
        </div>

        <div class="update_message">
            <h4>登録完了が完了しました</h4>
        </div>

        <?php
            $statement = $db->prepare('INSERT INTO memo SET title=?, body=?, created_at = NOW()');
            $statement->execute(array($_POST['title'], $_POST['body']));
        ?>

        <div class="main">
            <p class="main_title">タイトル</p>
            <p class="input-title">
                <?php $title=$_POST['title'];
                if(empty($title)){
                    echo "無題";
                }   echo $_POST['title']; ?> 
            </p>
            <p class="main_body">内容</p>
            <p class="input-body"><?php echo nl2br($_POST['body']); ?></p>
        </div>
        
    </body>
</html>