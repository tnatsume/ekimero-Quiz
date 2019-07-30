<?php
    // POSTされたデータの受け取り
    $result = $_POST['result'];
    $name = $_POST['name'];
    
    // 結果をcsvに書き込む
    $score = $result . ',' . $name ;
    $a = fopen("csv/ranking.csv", "a");
    @fwrite($a, $score . "\n" );
    fclose($a);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>結果</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/responsible.css">
    <link rel="stylesheet" href="css/finish.css">
</head>
<body>
    <?php @include('header.php') ?>
    <div class="finish">
        <div class="container">
            <h2 class="top">お疲れ様でした</h2>
            <p>あなたの結果は9問中<?php echo $result?>問正解でした。</p>
            <a class="btn"href="/"><span >TOPに戻る</span></a>
            <a class="btn1"href="ranking.php"><span >ランキング</span></a>
        </div>
    </div>
    <?php @include('footer.php') ?>
    
</body>
</html>