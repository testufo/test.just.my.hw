<?php

$link = pg_connect("host=ec2-54-216-185-51.eu-west-1.compute.amazonaws.com dbname=d7qvjv66dimcfg usernbvnsbswyvclsh password=f47f163b6ecbddaf0f3835b045eb07b1d609c6200269be2bf2716b76ead2b130")
or die('Не удалось соединиться: ' . pg_last_error());
echo 'Успешно соединились';
pg_close($link);
?>
