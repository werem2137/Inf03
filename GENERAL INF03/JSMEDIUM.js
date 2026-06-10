<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planer zadań</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <aside>
        <img src="obraz.jpg" alt="notatki">
    </aside>
    <header>
        <h2>Moje zadania</h2>
    </header>
    <nav>
        <input type="text" placeholder="Dodaj zadanie" id="zadanie">
        <button type="submit" onclick="dodaj()">Dodaj</button>
    </nav>
    <main>
        <ul id="lista">
            <li>Wyprowadzić psa <button id="wykonaj" type="submit" onclick="wykonaj(this)">Wykonane</button></li>
            <li>Gimnastyka <button id="wykonaj" type="submit" onclick="wykonaj(this)">Wykonane</button></li>
            <li>Zakupy <button id="wykonaj" type="submit" onclick="wykonaj(this)">Wykonane</button></li>
            <li>Spacer z kumplem <button id="wykonaj" type="submit" onclick="wykonaj(this)">Wykonane</button></li>
            <li>Odrabianie lekcji z młodszą siostrą <button id="wykonaj" type="submit" onclick="wykonaj(this)">Wykonane</button></li>
            <li>Projekt na geografię <button id="wykonaj" type="submit" onclick="wykonaj(this)">Wykonane</button></li>
        </ul>
        <script>
            function dodaj() {
                var zadanie = document.getElementById('zadanie').value;
                var lista = document.getElementById('lista');
                var nowyelement = document.createElement('li');
                nowyelement.innerHTML = `${zadanie} <button id="wykonaj" type="submit" onclick="wykonaj(this)">Wykonane</button>`;
                lista.appendChild(nowyelement);
            }

            function wykonaj(chuj) {
                var elementlisty = chuj.parentElement;
                elementlisty.style = "text-decoration: line-through";
            }
        </script>
    </main>
    <footer>
        <h3>Notatki: 67destroyer</h3>
    </footer>
</body>
</html>
