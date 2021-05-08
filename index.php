<html>
    <head>
    <title> Головна </title>
    </head>
    <body background="src/images/metal.png">
         <link rel="stylesheet" href="src/styles/style.css">
        <div class="content">
            <h2 align=center>Тест з математики</h2>
            <img align=right style="margin-right:10%;" width="400" height="200" src="src/images/ds_461390782.jpg" loading="lazy"></img>
            <form  id="math-form" action="https://q1p.herokuapp.com/result.php" >
                <p><b>Ім'я</b></p>
                <input type="text" name="firstname" required pattern="[А-Я]{1}[а-я]{2,20}"> 
                <p><b>Прізвище</b></p>
                <input type="text" name="lastname" required pattern="[А-Я]{1}[а-я]{2,20}">
                <p><b>Електронна адреса</b></p>
                <input type="email" name="email" required placeholder="example@domen.com">

                <p><b>Розв'яжіть рівняння x<sup>2</sup>+5x-14=0</b></p>
                <p> <input type="radio" name="answer[]" value="1" required>7;2<Br>
                <input type="radio" name="answer[]" value="2">-7;-2<Br>
                <input type="radio" name="answer[]" value="3">7;-2<Br>
                <input type="radio" name="answer[]" value="4">-7;2</p>

                <b><p>Cпростіть вираз\(\LARGE{ \frac{25x^8}{(5x^2)^4}}\)</b></p> 
                <p><input type="radio" name="answer2[]" value="1" required>\(\LARGE{\frac{25}{x^4}}\)<Br><Br>
                <input type="radio" name="answer2[]" value="2">\(\LARGE{\frac{1}{25x^4}}\)<Br><Br>
                <input type="radio" name="answer2[]" value="3">\(\LARGE{ \frac{x^4}{25}}\)<Br><Br>
                <input type="radio" name="answer2[]" value="4">\(\LARGE{ \frac{5}{x}}\)</p>
                <p><b>Указати моду для вибірки: 3; 1; 7; 1; 3; 7; 4.</b></p>
                <p><input type="checkbox" name="answer3[]" value="1" >1<Br>
                    <input type="checkbox" name="answer3[]" value="2">2<Br>
                    <input type="checkbox" name="answer3[]" value="3">3<Br>
                    <input type="checkbox" name="answer3[]" value="4">7</p>

                <p><b>Коли в Токіо 5 годин ранку, в Києві – 10 годин вечора попереднього дня.<br> 
                    Коли в Києві полудень, в Нью-Йорку – 5 годин ранку. <br>
                    На скільки годин пізніше наступає Новий рік у Нью-Йорку порівняно з Токіо?</b></p>
                <p><input type="radio" name="answer4[]" value="1" required>На 24 години<Br>
                <input type="radio" name="answer4[]" value="2">На 12 годин<Br>
                <input type="radio" name="answer4[]" value="3">На 14 годин<Br>
                <input type="radio" name="answer4[]" value="4">На 10 годин</p>

                <p><b>І. Через точку A, що не належить площині α, можна провести лише одну пряму, паралельну площині α.<br>

                    ІІ. Через точку A, що не належить площині α, можна провести лише одну площину, паралельну площині α.<br>
                    
                    ІІІ. Через точку A, що не належить площині α , можна провести лише одну пряму, перпендикулярну до площини α.<br>
                    
                    ІV. Через точку A, що не належить площині α, можна провести лише одну площину, перпендикулярну до площини α. </b></p>
                <p><input type="checkbox" name="answer5[]" value="1" >І<Br>
                <input type="checkbox" name="answer5[]" value="2">ІІ<Br>
                <input type="checkbox" name="answer5[]" value="3">ІІІ<Br>
                <input type="checkbox" name="answer5[]" value="4">ІV</p>

                <p><b>Знайдіть похідну фунцкції y=5sinx-7x<sup>2</sup>+7</b></p>
                <p><input type="radio" name="answer6[]" value="1" required>5sinx-14x<Br>
                <input type="radio" name="answer6[]" value="2" >5cosx-7x<Br>
                <input type="radio" name="answer6[]" value="3">5cosx-14x<Br>
                <input type="radio" name="answer6[]" value="4">5cosx-14</p>
                
                <p><b>(a-b)(a<sup>2</sup>+ab+b<sup>2</sup>)=</b></p>
                <p><input type="radio" name="answer7[]" value="1" required>a<sup>3</sup>-b<sup>3</sup><Br>
                <input type="radio" name="answer7[]" value="2" >a<sup>2</sup>-b<sup>2</sup><Br>
                <input type="radio" name="answer7[]" value="3">a-b<Br>
                <input type="radio" name="answer7[]" value="4">a<sup>3</sup>+b<sup>3</sup></p>

                <input hidden id="id" type="text" name="id" >
            <script>document.getElementById("id").value = Math.random().toString();</script>
                <p><input id="submit-form"  class="button" type="submit" value="Перевірити"></p>
                 
                </form>
        </div>
      <script src="https://polyfill.io/v3/polyfill.min.js?features=es6" defer></script>
  <script id="MathJax-script" defer
          src="src/js/es5/tex-mml-chtml.js">
  </script>
    </body>
</html>
