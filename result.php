
<?php
$get = $_GET;
$answerr = $get;
unset($answerr["id"]);
unset($answerr["firstname"]);
unset($answerr["lastname"]);
unset($answerr["email"]);
$dbconn = pg_connect("host=ec2-54-216-185-51.eu-west-1.compute.amazonaws.com dbname=d7qvjv66dimcfg user=nbvnsbswyvclsh password=f47f163b6ecbddaf0f3835b045eb07b1d609c6200269be2bf2716b76ead2b130")
    or die('Не удалось соединиться: ' . pg_last_error());
// Выполнение SQL-запроса
$query = "DROP TABLE answers";
$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
DROP TABLE answers
$query = 'CREATE TABLE IF NOT EXISTS answers (
  id SERIAL PRIMARY KEY,
  token CHARACTER VARYING(255),
  firstname CHARACTER VARYING(100),
  lastname CHARACTER VARYING(100),
  email CHARACTER VARYING(100),
  answer TEXT[][])';
$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());

$query = "INSERT INTO answers(token, firstname, lastname, email, answer) VALUES
("$get['id']", "$get['firstname']", "$get['lastname']", "$get['email']", "$answerr")";

$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());


// Очистка результата
pg_free_result($result);

// Закрытие соединения
pg_close($dbconn);*/
?>

