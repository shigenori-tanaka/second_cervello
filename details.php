<?php require_once('dbconnect.php')?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf8">
        <link rel="stylesheet" href="details.css">
        <title >second cervello</title>
    </head>

    <body>
        <header>
            <h3 class="app_name"><a href="top.php">- second cervello <span>"Read"</span>-</a></h3>
            <div class="brunk"></div>
        </header>
        <div class="index">
            <a href="input.html">作成画面へ</a>|<a href="index.php">メモ一覧へ</a>
        </div>
        <?php
            $details = $db->prepare('SELECT * FROM memo WHERE id=? ');
            $details->execute(array($_REQUEST['id']));
            $detail = $details->fetch();
        ?>

        <div class="main">
            <p>タイトル</p>
            <p class="input_title"> <?php echo $detail['title']; echo "<br>"; ?> </p>
            <p>内容</p>
            <p class="input_body">    
            <?php echo nl2br($detail['body']); ?>
            </p>
        </div>

        <!-- 削除アラート ここから-->
        <script>
            function confirm_test() {
            var select = confirm("本当に削除しますか？\n「OK」で削除\n「キャンセル」で中止");
            return select;
            }
        </script>
        <!-- 削除アラート ここまで-->


        <div class="button_gruop">
            <input type="submit" value="編集する" onclick="location.href='update.php?id=<?php echo($detail['id']); ?>'">
            <form class="aa" method="post" action="delete.php?id=<?php echo $detail['id']; ?>" onsubmit="return confirm_test()">
                <input type="submit" value="削除する" onsubmit="location.href='delete.php?id=<?php echo $detail['id']; ?>'">    
            </form>
        </div>





    </body>
</html>