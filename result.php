<?php
    // POSTされたデータの受け取り
    $name = $_POST['name'];
    if (isset($_POST['count'] )){
        $count = $_POST['count'];
        $count ++;
        $result = $_POST['result'];
    } else if($count > 9){
    }else{
        // $result = 0;
        $count = 0;
    } 
    // 正誤判定を行う
    if ($_POST['question'] == $_POST['answer'].'駅'){
        $result = $result + 1 ;
        $str = "正解です。";
    }else{
        if ( $count == 0 ){
            // $result = 0;
        }else{
            $result = $result;
        }
        
        $str = "不正解です。";
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
                <p class="hidden"></p>
                <h3>あなたの回答は<?php echo $_POST['question']?></h3>
                <h3>正解は<?php echo $_POST['answer']?>駅</h3>
                <h3></h3>
                <h3><?php echo $str ?></h3>
                <p></p>
                <p></p>
                <p></p>
                <p></p>
                <p></p>
                <input type="hidden"name="count"value="<?php echo $count ?>">
                <input type="hidden"name="result"value="<?php echo $result ?>">
                <input type="hidden"name="name"value="<?php echo $name ?>">

                <?php if ($count > 8 ): ?>
                    <input type="submit"class="btn"value="結果を見る">
                <?php else: ?>
                    <input type="submit"class="btn"value="次の問題へ">
                    
                <?php endif ?>

                    
                
            </form>
        </div>
    <?php @include('footer.php') ?>
    
</body>
</html>