<html>
    <head>
    <title> Головна </title>
    <link href="src/styles/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="content">
            <h2 align=center>Тест з математики</h2>
            <img align=right style="margin-right:10%;" width="640" height="480" src="src/images/ds_461390782.jpg"></img>
            <form  id="math-form" >
                <p><b>Ім'я</b></p>
                <input type="text" name="firstname" required pattern="[А-Я]{1}[а-я]{2,20}"> 
                <p><b>Прізвище</b></p>
                <input type="text" name="lastname" required pattern="[А-Я]{1}[а-я]{2,20}">
                <p><b>Електронна адреса</b></p>
                <input type="email" name="email" required placeholder="example@domen.com">

                <p><b>Розв'яжіть рівняння x<sup>2</sup>+5x-14=0</b></p>
                <p> <input type="radio" name="answer" value="a" required>7;2<Br>
                <input type="radio" name="answer" value="b">-7;-2<Br>
                <input type="radio" name="answer" value="c">7;-2<Br>
                <input type="radio" name="answer" value="d">-7;2</p>

                <b><p>Cпростіть вираз&nbsp;&nbsp;<sup><span class="fraction">
                    <span class="numerator">25x<sup>8</sup></span>
                    <span class="denominator">(5x<sup>3</sup>)<sup>4</sup></span>
                  </span></sup></b></p> 
                <p><input type="radio" name="answer2" value="a" required><sup><span class="fraction">
                    <span class="numerator">25</span>
                    <span class="denominator">x<sup>4</sup></span>
                  </span></sup><Br>
                <input type="radio" name="answer2" value="b"><sup><span class="fraction">
                    <span class="numerator"> 	&nbsp; 	&nbsp;1</span>
                    <span class="denominator">25x<sup>4</sup></span>
                  </span></sup><Br>
                <input type="radio" name="answer2" value="c"><sup><span class="fraction">
                    <span class="numerator">x<sup>4</sup></span>
                    <span class="denominator">25</span>
                  </span></sup><Br>
                <input type="radio" name="answer2" value="d"><sup><span class="fraction">
                    <span class="numerator">5</span>
                    <span class="denominator">x</span>
                  </span></sup></p>

                <p><b>Указати моду для вибірки: 3; 1; 7; 1; 3; 7; 4.</b></p>
                <p><input type="checkbox" name="answer3" value="a" >1<Br>
                    <input type="checkbox" name="answer3" value="b">2<Br>
                    <input type="checkbox" name="answer3" value="c">3<Br>
                    <input type="checkbox" name="answer3" value="d">7</p>

                <p><b>Коли в Токіо 5 годин ранку, в Києві – 10 годин вечора попереднього дня.<br> 
                    Коли в Києві полудень, в Нью-Йорку – 5 годин ранку. <br>
                    На скільки годин пізніше наступає Новий рік у Нью-Йорку порівняно з Токіо?</b></p>
                <p><input type="radio" name="answer4" value="a" required>На 24 години<Br>
                <input type="radio" name="answer4" value="b">На 12 годин<Br>
                <input type="radio" name="answer4" value="c">На 14 годин<Br>
                <input type="radio" name="answer4" value="d">На 10 годин</p>

                <p><b>І. Через точку A, що не належить площині α, можна провести лише одну пряму, паралельну площині α.<br>

                    ІІ. Через точку A, що не належить площині α, можна провести лише одну площину, паралельну площині α.<br>
                    
                    ІІІ. Через точку A, що не належить площині α , можна провести лише одну пряму, перпендикулярну до площини α.<br>
                    
                    ІV. Через точку A, що не належить площині α, можна провести лише одну площину, перпендикулярну до площини α. </b></p>
                <p><input type="checkbox" name="answer5" value="a" >І<Br>
                <input type="checkbox" name="answer5" value="b">ІІ<Br>
                <input type="checkbox" name="answer5" value="c">ІІІ<Br>
                <input type="checkbox" name="answer5" value="d">ІV</p>

                <p><b>Знайдіть похідну фунцкції y=5sinx-7x<sup>2</sup>+7</b></p>
                <p><input type="radio" name="answer6" value="a" required>5sinx-14x<Br>
                <input type="radio" name="answer6" value="b" >5cosx-7x<Br>
                <input type="radio" name="answer6" value="c">5cosx-14x<Br>
                <input type="radio" name="answer6" value="d">5cosx-14</p>

                
                <p><b>(a-b)(a<sup>2</sup>+ab+b<sup>2</sup>)=</b></p>
                <p><input type="radio" name="answer6" value="a" required>a<sup>3</sup>-b<sup>3</sup><Br>
                <input type="radio" name="answer6" value="b" >a<sup>2</sup>-b<sup>2</sup><Br>
                <input type="radio" name="answer6" value="c">a-b<Br>
                <input type="radio" name="answer6" value="d">a<sup>3</sup>+b<sup>3</sup></p>

                <input hidden id="id" type="text" name="id" >
                <p><input id="submit-form"  class="button" type="submit" onclick="e()" value="Перевірити" ></p>
                </form>
            <script>document.getElementById("id").value = Math.random().toString();
                var $form = $('form#math-form'),
                url = 'https://script.google.com/macros/s/AKfycbwc-q-x9J01x78hedvjXQL26Q3uT4skwkFmKSJhAme0lrlKmJt48v7H20TtORcGf6ui/exec'

                $('#submit-form').on('click', function(e) {
                e.preventDefault();
                var jqxhr = $.ajax({
                    url: url,
                    method: "GET",
                    dataType: "json",
                    data: $form.serializeObject()
                }).success(
                    // do something
                );
                })
        </script>
        </div>
    </body>
</html>
