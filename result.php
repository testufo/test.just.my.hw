
<?php
$get = $_GET;
$get["id"] = filter_var($get["id"], FILTER_SANITIZE_NUMBER_FLOAT);
$get["firstname"] = filter_var($get["firstname"], FILTER_SANITIZE_STRING);
$get["lastname"] = filter_var($get["lastname"], FILTER_SANITIZE_STRING);
$get["email"] =  filter_var($get["id"], FILTER_SANITIZE_EMAIL);
$answerr = $get;
unset($answerr["id"]);
unset($answerr["firstname"]);
unset($answerr["lastname"]);
unset($answerr["email"]);
$answerr = json_encode($answerr);
$dbconn = pg_connect("host=ec2-54-216-185-51.eu-west-1.compute.amazonaws.com dbname=d7qvjv66dimcfg user=nbvnsbswyvclsh password=f47f163b6ecbddaf0f3835b045eb07b1d609c6200269be2bf2716b76ead2b130")
    or die('Не удалось соединиться: ' . pg_last_error());
// Выполнение SQL-запрос
$query = 'CREATE TABLE IF NOT EXISTS answers (
  id SERIAL PRIMARY KEY,
  token TEXT UNIQUE,
  firstname TEXT,
  lastname TEXT,
  email TEXT,
  answer TEXT)';
$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());

$query = "INSERT INTO answers(token, firstname, lastname, email, answer) VALUES
('$get[id]', '$get[firstname]', '$get[lastname]', '$get[email]', '$answerr')";

$result = pg_query($query);


// Очистка результата
pg_free_result($result);

// Закрытие соединения
pg_close($dbconn);
?>
<html>
    <head>
    <title> Результати </title>
    <link href="src/styles/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="content">
        </div>
    </body>
</html>

