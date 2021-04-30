<?php

$link = mysql_connect("ec2-54-216-185-51.eu-west-1.compute.amazonaws.com:5432","nbvnsbswyvclsh","f47f163b6ecbddaf0f3835b045eb07b1d609c6200269be2bf2716b76ead2b130");

if (!$link) {
  die('Ошибка соединения: ' . mysql_error());
}
echo 'Успешно соединились';
mysql_close($link);
?>
