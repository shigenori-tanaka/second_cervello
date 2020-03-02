<?php require_once('dbconnect.php')?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf8">
        <link rel="stylesheet" href="delete.css">
        <title >second cervello</title>
    </head>

    <body>
        <header>
            <h3 class="app_name"><a href="top.php">- second cervello <span>"Delete"</span>-</a></h3>
            <div class="brunk"></div>
        </header>
        <div class="index" >
            <a href="input.html">作成画面へ</a>
            ｜
            <a href="index.php">メモ一覧に戻る</a>
        </div>
        <!-- ここから idがNULLのときエラーメッセージとして返す -->
        <?php
            if(isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])){
                //空欄や文字列をはじく。数字はOK
                $id = $_REQUEST['id'];

                $memos = $db->prepare('SELECT * FROM memo WHERE id=?');
                $memos->execute(array($id));
                $memo = $memos->fetch();
            }
        ?>
        <?php if(is_null($memo['id'])): ?>
            <p class="error_message"> <?php echo "メモが存在しません"; exit(); ?> </p>
        <?php endif ?>
        <!-- ここまで idがNULLのときエラーメッセージとして返す -->
        
        <!-- ここから メモの削除 -->
        <?php 
            if(isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])){
            $id = $_REQUEST['id'];
            $statement = $db->prepare('DELETE FROM memo WHERE id=?');
            $statement->execute(array($id));
        }
        ?>
        <p class="delete_message">メモを削除しました</p>
        <!-- ここまで メモの削除 -->
    </body>
</html>