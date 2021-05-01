
<?php
$get = $_GET;
if($get== null){
  echo('<html>
  <head>
  <title> Результати </title>
  <link href="src/styles/style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
  <div class="content">
  <h2 align=center>Спочатку пройдіть тест</h2>
  </div>
  </body>
</html>
  ');
  die();
}
$get["id"] = filter_var($get["id"], FILTER_SANITIZE_NUMBER_FLOAT);
$get["firstname"] = filter_var($get["firstname"], FILTER_SANITIZE_STRING);
$get["lastname"] = filter_var($get["lastname"], FILTER_SANITIZE_STRING);
$get["email"] =  filter_var($get["email"], FILTER_SANITIZE_EMAIL);
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
pg_query($query) or die('Ошибка запроса: ' . pg_last_error());

$query = "INSERT INTO answers(token, firstname, lastname, email, answer) VALUES
('$get[id]', '$get[firstname]', '$get[lastname]', '$get[email]', '$answerr')";
pg_query($query);
$an = [null,null];
$us = [null,null];
$query = "SELECT * FROM answers WHERE token="."'".$get["id"]."'";
$answersss = pg_query($query);
while ($line = pg_fetch_array($answersss , null, PGSQL_ASSOC)) {
   array_push($an, $line);
}
$query = "SELECT * FROM answers";
$users = pg_query($query);
while ($line = pg_fetch_array($users , null, PGSQL_ASSOC)) {
  array_push($us, $line);
}
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
           <h2 align=center>Результати тесту</h2>
           <b><p>Ім'я:</b> <?php foreach($an as $arr1){
                  if($arr1!=null){
                      print_r($arr1["firstname"]);
                  }
                }
                ?></p>
      <b><p>Прізвище:</b> <?php foreach($an as $arr1){
                  if($arr1!=null){
                      print_r($arr1["lastname"]);
                  }
                }
                ?></p>
       
        <p><b>Розв'яжіть рівняння x<sup>2</sup>+5x-14=0</b></p>
        <p id="11">7;2</p>
        <p id="12">-7;-2</p>
        <p id="13">7;-2</p>
        <p id="14">-7;2</p>

        <b><p>Cпростіть вираз&nbsp;&nbsp;<sup><span class="fraction">
                    <span class="numerator">25x<sup>8</sup></span>
                    <span class="denominator">(5x<sup>3</sup>)<sup>4</sup></span>
                  </span></sup></b></p> 
                  <p id="21"><sup><span class="fraction">
                    <span class="numerator">25</span>
                    <span class="denominator">x<sup>4</sup></span>
                  </span></sup></p>
                  <p id="22"><sup><span class="fraction">
                    <span class="numerator"> 	&nbsp; 	&nbsp;1</span>
                    <span class="denominator">25x<sup>4</sup></span>
                  </span></sup></p>
                  <p id="23"><sup><span class="fraction">
                    <span class="numerator">x<sup>4</sup></span>
                    <span class="denominator">25</span>
                  </span></sup></p>
                  <p id="24"><sup><span class="fraction">
                    <span class="numerator">5</span>
                    <span class="denominator">x</span>
                  </span></sup></p>
           
                <p><b>Указати моду для вибірки: 3; 1; 7; 1; 3; 7; 4.</b></p>
                <p id="31">1</p>
                <p id="32">2</p>
                <p id="33">3</p>
                <p id="34">7</p>     
                
                
                <p><b>Коли в Токіо 5 годин ранку, в Києві – 10 годин вечора попереднього дня.<br> 
                    Коли в Києві полудень, в Нью-Йорку – 5 годин ранку. <br>
                    На скільки годин пізніше наступає Новий рік у Нью-Йорку порівняно з Токіо?</b></p>
                <p id="41">На 24 години</p>
                <p id="42">На 12 годин</p>
                <p id="43">На 14 годин</p>
                <p id="44">На 10 годин</p>

                <p><b>І. Через точку A, що не належить площині α, можна провести лише одну пряму, паралельну площині α.<br>

                    ІІ. Через точку A, що не належить площині α, можна провести лише одну площину, паралельну площині α.<br>
                    
                    ІІІ. Через точку A, що не належить площині α , можна провести лише одну пряму, перпендикулярну до площини α.<br>
                    
                    ІV. Через точку A, що не належить площині α, можна провести лише одну площину, перпендикулярну до площини α. </b></p>
                <p id="51">І</p>
                <p id="52">ІІ</p>
                <p id="53">ІІІ</p>
                <p id="54">ІV</p>

                <p><b>Знайдіть похідну фунцкції y=5sinx-7x<sup>2</sup>+7</b></p>
                <p id="61">5sinx-14x</p>
                <p id="62">5cosx-7x</p>
                <p id="63">5cosx-14x</p>
                <p id="64">5cosx-14</p>

                
                <p><b>(a-b)(a<sup>2</sup>+ab+b<sup>2</sup>)=</b></p>
                <p id="61">a<sup>3</sup>-b<sup>3</sup></p>
                <p id="62">a<sup>2</sup>-b<sup>2</sup></p>
                <p id="63">a-b</p>
                <p id="64">a<sup>3</sup>+b<sup>3</sup></p>
                
                <h2 align=center>Результати інших учасників</h2>
                <?php foreach($us as $arr1){
                  if($arr1!=null){
                      print_r('<a href=/result.php?id="'.$arr1["token"].'"><p>'.$arr1["firstname"].'  '.$arr1["lastname"].'</p></a>');
                  }
                }
                ?>
                <script> 
                var answer=JSON.parse_str("<?php foreach($an as $arr1){ if($arr1!=null){print_r($arr1["answer"]); } }?>");
                alert(answer);
                </script>
        </div>
    </body>
</html>