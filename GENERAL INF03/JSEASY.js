/* INDEX */
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pola figur</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h2>Pola figur płaskich</h2>
    </header>
    <main>
        <nav>
            <h3>MENU</h3>
            <ul>
                <li><a href="index.html">Prostokąt i trójkąt</a></li>
                <li><a href="kolo.html">Okrąg i koło</a></li>
            </ul>
        </nav>
        <section>
            <img src ="1d.bmp" alt="Figura" class="duzyobraz" id="wybierz">
            <img src="1m.bmp" alt="Wybierz trójkąt" class="grafiki" onclick="wybierzt('1d.bmp')" id="wybierz">
            <img src="2m.bmp" alt="Wybierz prostokąt" class="grafiki" onclick="wybierzp('2d.bmp')" id="wybierz">
            <script>
                function wybierzt() {
                    document.getElementById('wybierz').src = "1d.bmp";
                }
                function wybierzp() {
                    document.getElementById('wybierz').src = "2d.bmp";
                }
            </script>
        </section>
        <aside>
            <h3>Pole prostokąta / pole trójkąta</h3>
            <label>Bok prostokąta / podstawa trójkąta <br> <input type="number" id="a"></label><br>
            <label>Drugi bok prostokąta / wysokość trójkąta <br> <input type="number" id="b"></label><br>
            <button type="submit" onclick="oblicz()">Oblicz</button>
            <p id="wynik"></p>
            <script>
                function oblicz() {
                    var a = Number(document.getElementById('a').value);
                    var b = Number(document.getElementById('b').value);
                    var wynik = 0;
                    var obraz = document.getElementById('wybierz').src;
                    if (obraz.includes("2d.bmp")) {
                        wynik = a * b;
                    }else {
                        wynik = (a * b) / 2;
                    }
                    document.getElementById("wynik").innerHTML = "Wynik: " + wynik;
                }
            </script>
        </aside>
    </main>
    <footer>
        <p>Autor: 67destroyer</p>
    </footer>
</body>
</html>
/* KOLO */
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pola figur</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h2>Pola figur płaskich</h2>
    </header>
    <main>
        <nav>
            <h3>MENU</h3>
            <ul>
                <li><a href="index.html">Prostokąt i trójkąt</a></li>
                <li><a href="kolo.html">Okrąg i koło</a></li>
            </ul>
        </nav>
        <section>
            <img src="kolo.gif" alt="koło">
        </section>
        <aside>
            <p>Pole koła = P = &Pi; * r<sup>2"</sup></p>
        </aside>
    </main>
    <footer>
        <p>Autor: 67destroyer</p>
    </footer>
</body>
</html>
