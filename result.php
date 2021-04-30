
<?php
print_r($_GET);
/*// ?firstname=Валентин&lastname=Валентин&email=dd4dd5.yv%40gmail.com&answer=b&answer2=b&answer3=b&answer4=c&answer6=d&id=0.1980001810494053
$dbconn = pg_connect("host=ec2-54-216-185-51.eu-west-1.compute.amazonaws.com dbname=d7qvjv66dimcfg user=nbvnsbswyvclsh password=f47f163b6ecbddaf0f3835b045eb07b1d609c6200269be2bf2716b76ead2b130")
    or die('Не удалось соединиться: ' . pg_last_error());

// Выполнение SQL-запроса
$query = 'CREATE TABLE IF NOT EXISTS answers (
  id SERIAL PRIMARY KEY,
  token CHARACTER VARYING(255),
  firstname CHARACTER VARYING(100),
  lastname CHARACTER VARYING(100),
  email CHARACTER VARYING(100),
  answer CHARACTER VARYING(255))';
$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());

$query = "INSERT INTO answers(token, firstname, lastname, email, answer) VALUES
('Шнеляяяяя', 'АРБАЙТЕЕЕЕЕЕН', 'АААААРБААААААЙТЕЕЕЕЕЕНН', 'ШНЕЕЕЕЕЕЕЕЛЯЯАААААА', 'ШНЕЕЕЕЕЕЕЕЛЯЯАААААА')";

$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());


// Очистка результата
pg_free_result($result);

// Закрытие соединения
pg_close($dbconn);*/
?>

