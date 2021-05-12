<?php
    include 'insert.php';
    include 'sendmail.php';

    $goodanswers=array("a","b","c","d");
    if(empty($_GET)){
        echo('<html>
        <head>
        <title> Результати </title>
        <link href="/src/styles/style.css" rel="stylesheet" type="text/css">
        </head>
        <body>
        <div class="content">
        <h2 align=center>Спочатку пройдіть тест :)</h2>
        </div>
        </body>
        </html>');
        die();
    }
    if(!empty($_GET['firstname'])&&!empty($_GET['lastname'])&&!empty($_GET['email'])){
        $get["firstname"] = filter_var($_GET["firstname"], FILTER_SANITIZE_STRING);
        $get["lastname"] = filter_var($_GET["lastname"], FILTER_SANITIZE_STRING);
        $get["email"] =  filter_var($_GET["email"], FILTER_SANITIZE_EMAIL);
        $get["groop"] = filter_var($_GET['groop'], FILTER_SANITIZE_NUMBER_INT);

        $usermail = $get["email"].'@ch-school33.ukr.education';
        $answers = $_GET;
        unset($answers["firstname"]);
        unset($answers["lastname"]);
        unset($answers["email"]);
        unset($answers["groop"]);
        $jsonanswers = json_encode($answers);
        $answers = array_values($answers);
        $c = 0;
        for ($i = 0; $i < count($goodanswers); $i++) {
            if($answers[$i]==$goodanswers[$i]) $c++;
        }
        $mark = round(($c/count($goodanswers))*12);
        $pass = randomPassword();
        $id = insert($pass, $usermail, $get["firstname"], $get["lastname"], $jsonanswers, $mark, $get["groop"]);
        if($id == false){
            echo('<html>
            <head>
            <title> Результати </title>
            <link href="/src/styles/style.css" rel="stylesheet" type="text/css">
            </head>
            <body>
            <div class="content">
            <h2 align=center>Тест можна пройти тільки один раз :(</h2>
            </div>
            </body>
            </html>');
            die();
        }
        sendmail($id, $pass, $usermail);
        header("LOCATION: /complete.php?id=$id&password=$pass");
    }
    else if(!empty($_GET['id'])&&!empty($_GET['password'])){
        $get["password"] = filter_var($_GET['password'], FILTER_SANITIZE_STRING);
        $get["id"] = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
        $details = getdetails($get["id"], $get["password"]);
        $jsonanswers = $details[2];
        $mark = $details[3];
        $firstname = $details[0];
        $lastname = $details[1];
        $answers = json_decode($jsonanswers, true);
        $answers = array_values($answers);
        $c = 0;
        for ($i = 0; $i < count($goodanswers); $i++) {
            if($answers[$i]==$goodanswers[$i]) $c++;
        }
        $countright = $c;
        $countall = count($goodanswers);
        $percentage = ($countright/$countall)*100;
    }
    else{
        echo('<html>
        <head>
        <title> Результати </title>
        <link href="/src/styles/style.css" rel="stylesheet" type="text/css">
        </head>
        <body>
        <div class="content">
        <h2 align=center>Які дивні у Вас запити О_о</h2>
        </div>
        </body>
        </html>');
        die();
    }
    $firstgoop = getothers(1);
    $secondgroop = getothers(2);
?>
<html>
    <head>
    <title>Результат</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    </head>
    <body>
        <div class="content">
            <div style="text-align: center;">
                <div style="display: inline-block; text-align: left;">
                <h1 align=center>Результат</h1>
                <p><b>Ім'я: </b> <?php echo($firstname); ?></p>
                <p><b>Прізвище: </b> <?php echo($lastname); ?></p>
                <p><b>Ви відповіли правильно на </b> <?php echo($countright); ?> <b> з </b> <?php echo($countall); ?> <b> питань.</b></p>
                <p><b>Відсоток правильних відповідей: </b> <?php echo($percentage); ?><b>%.</b></p>
                <p><b>Ваша оцінка: </b> <?php echo($mark); ?><b>.</b></p>
                </div>
            </div>
        </div>
        <div class="content">
            <div style="text-align: center;">
                <div style="display: inline-block; text-align: left;">
                    <h1 align=center>Результати інших учасників</h1>
                    <h2 align=center>Перша група</h2>
                    <?php 
                        $n0 = 0;
                        foreach($firstgoop as $arr1){
                            if($arr1!=null){
                                $n0++;
                                echo('<p>'.$n0.'. '.$arr1["firstname"].' '.$arr1["lastname"].' --- '.$arr1["mark"].' Б</p>');
                            }
                        }?>
        <h2 align=center>Друга група</h2>
        <?php 
                $n1=0;
                foreach($secondgroop as $arr1){
                    if($arr1!=null){
                        $n1++;
                        echo('<p>'.$n1.'. '.$arr1["firstname"].' '.$arr1["lastname"].' --- '.$arr1["mark"].' Б</p>');
                    }
                }?>
                </div>
            </div>
        </div>
    </body>
</html>