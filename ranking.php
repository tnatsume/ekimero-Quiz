<?php
    $row = 0;
    $html = array();
    $j = 0;
    $i = 0;

    // ファイルが存在しているかチェックする
    if (($handle = fopen("csv/ranking.csv", "r")) !== FALSE) {
        // 1行ずつfgetcsv()関数を使って読み込む
        while (($data = fgetcsv($handle))) {
            $row++;
            foreach ($data as $value) {
                $html[$i][$j] = $value;
                $j ++;
            }
            $j = 0;
            $i ++ ;
        }
        fclose($handle);
    }
   rsort($html)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ランキング</title>
    <link rel="stylesheet" href="css/responsible.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/ranking.css">
</head>
<body>
    <?php @include('header.php') ?>
    <div class="ranking">
        <div class="container">
        <?php
            for ( $i = 0 ; $i < 10 ; $i ++ ){
                $j = $i + 1;
                if (isset($html[$i][0])){
                    echo '<p>第'. $j . '位：    <u>' . $html[$i][1] . 'さん</u>      9問中' . $html[$i][0] . '問正解</p>';
                }else{
                    if (!isset($html[0][0])){
                        echo '<p>まだランキングはありません</p>';
                    }
                    break;
                
                }
            }
         ?>
         <?php if(isset($html[0][0])):?>
            <!-- <center>
                <a href='ranking.php?del=true'class="btn" >ランキングを初期化</a>
            </center> -->
        <?php else: ?>
            
        <?php endif; ?>
        </div>
    </div>
    <?php  ?>
    <?php @include('footer.php') ?>
    
</body>
<?php

    function delRanking(){
        $fp = 'csv/ranking.csv';
        // ファイルオープン
        $fp = fopen('csv/ranking.csv', 'a');
        flock($fp, LOCK_EX);
        
        //2番目の引数のファイルサイズを0にして空にする
        ftruncate($fp,0); 
        
        flock($fp, LOCK_UN);
    fclose($fp);
    }
    if (isset($_GET['del'])) {
        delRanking();
    }
?>
</html>