<?php
    $row = 1;
    $problem = array();
    $index = 0;
    $prob = 0;
    $result = 0;
    $name = $_POST['name'];
    if (isset($_POST['count'] )){
        $count = $_POST['count'];
        $result = $_POST['result'];
    } else{
        $count = 0;
    }
    // ファイルが存在しているかチェックする
    if (($handle = fopen("csv/problem.csv", "r")) !== FALSE) {
        // 1行ずつfgetcsv()関数を使って読み込む
        while (($data = fgetcsv($handle))) {
            $row++;
            foreach ($data as $value) {
                $problem[$prob][$index] = $value;
                $index ++ ;
            }
            $index = 0;
            $prob ++;
            
        }
        fclose($handle);
    }
    
    // $index = 0;
    // foreach ($problem as $sprob){
    //     $choise = $sprob[$index][0].','.$sprob[$index][1].','.$sprob[$index][2].','.$sprob[$index][3];
    //     $index ++;
    // }
    // shuffle($choise);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $problem [$count][0] ?>問目</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/responsible.css">
    <link rel="stylesheet" href="css/problem.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <script src="js/main.js"></script>
    <link rel="shortcut icon" href="img/yamanote.jpg" type="image/x-icon">
</head>
<body>
    <?php @include('header.php') ?>
    <div class="problem">
    
        <div class="container">
            <!-- <a href="javascript:void(0);"class="repeat btn"id="stop" onclick="StopSound();">一時停止</a><br/> -->
            <!-- <a href="javascript:void(0);"class="repeat btn"id="repeat" onclick="PlaySound();">🔁もう一度聞く</a><br/> -->
            <form action="result.php"method="POST">
                <input class="count"name="count"value="<?php echo $count+1 ?>">
                <input type="text"class="title"value="この駅メロが流れている駅はどこ？"readonly>
                <input type="hidden"id="music"value="<?php echo $problem [$count][6]?>"?>
                <input type="submit"name="question"class="select btn"value="<?php echo $problem [$count][1]?>駅">
                <input type="submit"name="question"class="select btn"value="<?php echo $problem [$count][2]?>駅">
                <input type="submit"name="question"class="select btn"value="<?php echo $problem [$count][3]?>駅">
                <input type="submit"name="question"class="select btn"value="<?php echo $problem [$count][4]?>駅">
                <input type="hidden"name="answer"value="<?php echo $problem[$count][5]?>">
                <input type="hidden"name="result"value="<?php echo $result ?>">
                <input type="hidden"name="name"value="<?php echo $name ?>">
                
                <!-- <input type="submit"class="btn submit"value="解答"> -->
            </form>
        </div>
    </div>
    <?php @include('footer.php') ?>
    <script>
        var repeat = document.getElementById('music');
        var audioElem;
        audioElem = new Audio();
        audioElem.src = "music/" + repeat.value;

        // もう一度再生するが謳歌された時の処理
        function PlaySound() {
            // audioElem = new Audio();
            // audioElem.src = "music/" + repeat.value;
            StopSound();
            audioElem.play();

        }
        function StopSound(){
            // audioElem = new Audio();
            // audioElem.src = "music/" + repeat.value;
            audioElem.pause();
        }
        // ページが読み込まれた時の処理
        (window.onload = function(){
            // audioElem = new Audio();
            // audioElem.src = "music/" + repeat.value;
            StopSound();
            audioElem.play();
        })();
    </script>
</body>
</html>