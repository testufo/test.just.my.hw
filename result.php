<?php

$link = pg_connect("host=ec2-54-216-185-51.eu-west-1.compute.amazonaws.com dbname=d7qvjv66dimcfg user=nbvnsbswyvclsh password=f47f163b6ecbddaf0f3835b045eb07b1d609c6200269be2bf2716b76ead2b130")
or die('Не удалось соединиться: ' . pg_last_error());
echo 'Успешно соединились';
exec('CREATE TABLE IF NOT EXISTS answers (
  id SERIAL PRIMARY KEY,
  token CHARACTER VARYING(255),
  firstname CHARACTER VARYING(100),
  lastname CHARACTER VARYING(100),
  email CHARACTER VARYING(100),
  answers CHARACTER VARYING(255)
);');
exec('INSERT INTO  answers(token, firstname, lastname, email, answers)
VALUES (value1, value2, value3, value4, value5);');

pg_close($link);
?>
