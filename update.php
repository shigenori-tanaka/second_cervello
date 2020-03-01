<?php require_once('dbconnect.php')?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf8">
        <link rel="stylesheet" href="update.css">
        <title >second cervello</title>
    </head>

    <body>
        <?php 
            if(isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])){
                $id=$_REQUEST['id'];
            }
            $memos = $db->prepare('SELECT * FROM memo WHERE id=?');
            $memos->execute(array($id));
            $memo = $memos->fetch();

        ?>
        <header>
            <h3 class="app_name"><a href="top.php">- second cervello <span>"Update"</span>-</a></h3>
            <div class="brunk"></div>
        </header>
        
        <div class="index">
            <a href="index.php">メモ一覧へ</a>
        </div>


        <h3 class="title">メモの編集・更新</h3>
        <div class="form">
            <form action="update_do.php" method="post">
                <p>タイトル</p>
                <input class="title-filed" type="hidden" name="id" value="<?php echo $id ?> ">
                <input class="title-filed" type="text" name="title" value="<?php echo $memo['title'] ?>" >
                <p>内容</p>
                <textarea class="body-area" name="body" cols="30" rows="10" required><?php echo $memo['body']; ?></textarea>
                <div class="button-group">
                    <button type="submit">更新する</button>
                </div>
            </form>
        </div>
        
    </body>
</html>