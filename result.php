
<?php
// Соединение, выбор базы данных
$dbconn = pg_connect("host=ec2-54-216-185-51.eu-west-1.compute.amazonaws.com dbname=d7qvjv66dimcfg user=nbvnsbswyvclsh password=f47f163b6ecbddaf0f3835b045eb07b1d609c6200269be2bf2716b76ead2b130")
    or die('Не удалось соединиться: ' . pg_last_error());

// Выполнение SQL-запроса
$query = 'SELECT * FROM authors';
$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());

// Вывод результатов в HTML
echo "<table>\n";
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// Очистка результата
pg_free_result($result);

// Закрытие соединения
pg_close($dbconn);
?>

