<?php require_once('dbconnect.php')?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf8">
        <link rel="stylesheet" href="index.css">
        <title >second cervello</title>
    </head>
    <body>
        <header>
            <h3 class="app_name"><a href="top.php">- second cervello <span>"Read"</span>-</a></h3>
            <div class="brunk"></div>
        </header>
        <div class="index">
            <a href="input.html">作成画面へ</a> <!-- <a href="index.php">メモ一覧へ</a> -->
        </div>
      
        <!-- ここからページング処理 -->
        <?php
            if(isset($_REQUEST['page']) && is_numeric($_REQUEST['page'])){
                $page = $_REQUEST['page'];
            }else {
                $page = 1;
            }

            $start = 5 * ($page - 1);
            $memos = $db->prepare('SELECT * FROM memo ORDER BY id DESC LIMIT ?,5 ');
            $memos->bindParam(1, $start, PDO::PARAM_INT);
            $memos->execute();
        ?>
        <!-- ここまでページング処理 -->
        

        <div class="main">
            <article>
                <?php while($memo = $memos->fetch()): ?>

                    <?php if(empty($memo['title'])):?>
                    <p class="index-title"> <?php echo '無題'; ?> </p>
                    <?php endif ;?>

                    <p class="index-body"> 
                        <a href="details.php?id=<?php echo $memo['id']; ?>"> 
                            <?php echo (mb_substr($memo['title'],0,20)); ?>
                            <?php echo (mb_strlen($memo['title'])>20 ? '....':'')?>    
                        </a>
                    </p>

                    <p class="index-body">
                        <a href="details.php?id=<?php echo $memo['id']; ?>">
                            <?php echo (mb_substr($memo['body'], 0, 20)); ?>
                            <?php echo (mb_strlen($memo['body'] )> 20 ? '....':'');?>
                            <!-- 三項演算子：条件 ? '成立時の処理':'不成立時の処理' -->
                        </a>
                    </p>
                    <p class="created_at"><time>作成日：<?php echo $memo['created_at'] ?></time></p>
                    <hr>
                <?php endwhile; ?>
            </article>
        </div>

        <!-- ここから最大何ページあるのかを調べる -->
        <?php 
            $counts = $db->query('SELECT COUNT(*) AS cnt FROM memo');
            $count = $counts->fetch(); // メモの件数を$countに代入する
            $max_page = ceil($count['cnt'] / 5); // メモの件数を5で割り算。ceil=小数切り上げ。$max_pageにはブラウザ上のページ数を代入
        ?>
        <!-- ここまで -->

        <div class="page">
            <?php if($page >= 2): ?>
                <a href="index.php?page=<?php echo($page-1); ?>">前へ</a>
            <?php endif;?>
            ｜
            <?php
                for($i = 1; $i <= $max_page; $i++){ // 最大ページ数分リンクを作成
                    if ($i == $page) {
                        echo $page. ' ';
                    } else {
                        echo '<a href=\'index.php?page='. $i. '\')>'. $i . '</a>'. ' ';
                    }
                }
            ?> 
            ｜
            <?php if($page <= ($max_page-1)): ?>
                <a href="index.php?page=<?php echo($page+1); ?>">次へ</a>
            <?php endif;?>
        </div>
    </body>
</html>
