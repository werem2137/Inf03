<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Sklep meblowy</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Sklep meblowy</h1>
    </header>

    <main>
        <section>
            <img id="duzyFotel" src="fotel1.png" alt="Żółty fotel" onclick="pokaz()">
            <div class="miniatury">
                <img src="fotel1.png" alt="wariant 1" onclick="zmien('fotel1.png')">
                <img src="fotel2.png" alt="wariant 2" onclick="zmien('fotel2.png')">
                <img src="fotel3.png" alt="wariant 3" onclick="zmien('fotel3.png')">
            </div>

            <div class="okno">
                <span class="zamknij" onclick="zamknij()">&times;</span>
                <img class="obrazOkno" src="fotel1.png" alt="podgląd fotela">
            </div>
        </section>

        <article>
            <h2>Żółty Fotel</h2>
            <p>Nasz żółty fotel może być przygotowany w trzech wariantach, które można przeglądać na grafikach. Jest wygodny i elegancki. Wariant 1 polecamy do wnętrz klasycznych. Wariant 3 jest utrzymany w stylu glamour, a guzik na środku oparcia jest wykonany z kryształka.</p>
            <p>Wygodne podłokietniki sprawiają, że w tym fotelu naprawdę się odpoczywa. Wykonany z elastycznej pianki - materiału, który wyróżnia się plastycznością oraz sprężystością, zapewniając komfort siedzenia. Zorganizujemy dla Ciebie bezpłatną dostawę oraz wniesiemy towar.</p>
            <p><strong>Wybierz wariant fotela</strong></p>
            <select>
                <option>wariant 1</option>
                <option>wariant 2</option>
                <option>wariant 3</option>
            </select>
            <p><button type="button">KUP TERAZ</button></p>
            <p><a href="index.html">Do strony głównej</a></p>
        </article>
    </main>

    <footer>
        <p>Autor strony: <strong>Refil</strong></p>
    </footer>


    <script>
        function zmien(nazwaPliku) {
            document.getElementById('duzyFotel').src = nazwaPliku;
        }

        function pokaz() {
            var duzy = document.getElementById('duzyFotel');
            document.querySelector('.obrazOkno').src = duzy.src;
            document.querySelector('.okno').style.display = 'block';
        }

        function zamknij() {
            document.querySelector('.okno').style.display = 'none';
        }
    </script>
</body>
</html>
