<?php
    // POSTされたデータの受け取り
    $name = $_POST['name'];
    $flg = 0;
    if (isset($_POST['count'] )){
        $count = $_POST['count'];
        $result = $_POST['result'];
    } else if($count > 9){
    }else{
        // $result = 0;
        $count = 1;
    } 
    // 正誤判定を行う
    if ($_POST['question'] == $_POST['answer'].'駅'){
        $result = $result + 1 ;
        $str = "正解";
        
    }else{
        if ( $count == 0 ){
            // $result = 0;
        }else{
            $result = $result;
        }
        $flg =1;
        $str = "不正解";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>結果表示</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/responsible.css">
    <link rel="stylesheet" href="css/ranking.css">
    <link rel="stylesheet" href="css/result.css">
    <link rel="shortcut icon" href="img/yamanote.jpg" type="image/x-icon">
</head>
<body>
    <?php @include('header.php') ?>
    <div class="result">
        <div class="container">
        <?php if ($count > 8 ): ?>
            <form action="finish.php"method="POST">
        <?php else: ?>
            <form action="problem.php"method="POST">
            
        <?php endif ?>
                <h3>あなたの回答は<?php echo $_POST['question']?></h3>
                <h3>正解は<?php echo $_POST['answer']?>駅</h3>
                <h3></h3>
                <h3><span  class="corrent"><?php echo $str ?></span>です。</h3>
                <?php if($flg==0):?>
                    <img src="img/current.png" width="20%"alt="">
                <?php else:?>
                    <img src="img/incurrent.png" width="20%"alt="">
                <?php endif ?>
                <p></p>
                <p></p>
                <p></p>
                <p></p>
                <p></p>
                <input type="hidden"name="count"value="<?php echo $count ?>">
                <input type="hidden"name="result"value="<?php echo $result ?>">
                <input type="hidden"name="name"value="<?php echo $name ?>">

                <!-- 問題数によって条件分岐でページ遷移を行う -->
                <?php if ($count > 8 ): ?>
                    <input type="submit"class="btn"value="結果を見る">
                <?php else: ?>
                    <input type="submit"class="btn"value="次の問題へ">
                    
                <?php endif ?>

                    
                
            </form>
        </div>
    <?php @include('footer.php') ?>
    <script>
        var audioElem;
        audioElem = new Audio();
        var flg = <?php echo $flg ?>
        // 正解の時の音を出す
        function currentSound(){
            audioElem.src = "music/current.mp3" ;
            StopSound();
            audioElem.play();
        }
        // 不正解の時の音を出す
        function incurrentSound(){
            audioElem.src = "music/incurrent.mp3" ;
            StopSound();
            audioElem.play();
        }
        // もう一度再生するが押下された時の処理
        function PlaySound() {
            StopSound();
            audioElem.play();

        }
        // 音楽を止める処理
        function StopSound(){
            audioElem.pause();
        }
        // ページが読み込まれた時の処理
        (window.onload = function(){
            if(flg==0){
                audioElem.src = "music/current.mp3" ;
            }else{
                audioElem.src = "music/incurrent.mp3" ;
            }
            StopSound();
            audioElem.play();
        })();
    </script>
</body>
</html>