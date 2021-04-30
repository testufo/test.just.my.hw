<?php

$link = $conn = pg_connect(getenv("postgres://nbvnsbswyvclsh:f47f163b6ecbddaf0f3835b045eb07b1d609c6200269be2bf2716b76ead2b130@ec2-54-216-185-51.eu-west-1.compute.amazonaws.com:5432/d7qvjv66dimcfg"))
or die('Не удалось соединиться: ' . pg_last_error());
echo 'Успешно соединились';
pg_close($link);
?>
