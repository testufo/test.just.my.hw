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
        $jsonanswers = $details["jsonanswer"];
        $mark = $details["mark"];
        $firstname = $details["firstname"];
        $lastname = $details["lastname"];
        $answers = json_decode($jsonanswers);
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
</head>
<body>
<div align=center class="content">
  <h1>Результат</h1>
  <p><b>Ви відповіли правильно на </b> <?php echo($countright); ?> <b> з </b> <?php echo($countall); ?> <b> питань.</b></p>
  <p><b>Відсоток правильних відповідей: </b> <?php echo($percentage); ?><b>%.</b></p>
  <p><b>Ваша оцінка: </b> <?php echo($mark); ?><b>.</b></p>
</div>
<div align=center class="content">
  <h1>Результати інших учасників</h1>
  <h2>Перша группа</h2>
  <?php foreach($firstgoop as $arr1){
            if($arr1!=null){
                echo('<p>'.$arr1["firstname"].' '.$arr1["lastname"].' --- '.$arr1["mark"].' Б</p>');
            }
        }
    ?>
  <h2>Друга группа</h2>
  <?php foreach($secondgroop as $arr1){
            if($arr1!=null){
                echo('<p>'.$arr1["firstname"].' '.$arr1["lastname"].' --- '.$arr1["mark"].' Б</p>');
            }
        }
    ?>
</div>
</body>
</html>