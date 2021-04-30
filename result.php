<?php

$link = mysqli_connect("ec2-54-216-185-51.eu-west-1.compute.amazonaws.com:5432","nbvnsbswyvclsh","f47f163b6ecbddaf0f3835b045eb07b1d609c6200269be2bf2716b76ead2b130","d7qvjv66dimcfg");

if (!$link) {
  die('Ошибка соединения: ' . mysqli_error());
}
echo 'Успешно соединились';
mysqli_close($link);
?>
