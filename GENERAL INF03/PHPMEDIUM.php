<?php
$conn = mysqli_connect('localhost', 'root', '', 'gry'); 
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gry komputerowe</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header><h1>Ranking gier komputerowych</h1>
    </header>
    <main>
        <section id="lewy">
            <h3>Top 5 gier w tym miesiącu</h3>
            <ul>
                <?php 
                $zap3 = "select nazwa, punkty from gry ORDER BY `gry`.`punkty` DESC limit 5;";
                $wynik3 = mysqli_query($conn, $zap3);
                while ($row = mysqli_fetch_row($wynik3)) {
                    echo "<li>". $row[0]. "<div class='punkt'>". $row[1]. "</div>". "</li>";
                }
                ?>
            </ul>
            <h3>Nasz sklep</h3>
            <a href="http://sklep.gry.pl">Tu kupisz gry</a>
            <h3>Stronę wykonał:</h3> <p>67destroyer</p>
        </section>
        <section id="srodek">
            <?php
            $zap1 = "select id,nazwa,zdjecie FROM gry;";
            $wynik1 = mysqli_query($conn, $zap1);
            while ($row = mysqli_fetch_row($wynik1)){
                echo "<div class='gry'>";
                 echo "<img src='$row[2]' alt='$row[0]'>";
                 echo "<p>". $row[1]. "</p>";
                 echo "</div>";
            }
            ?>
        </section>
        <section id="prawy">
            <h3>Dodaj nową grę</h3>
            <form method="POST">
                <label>nazwa</label><br><input type="text" name="nazwa"><br>
                <label>opis</label><br><input type="text" name="opis"><br>
                <label>cena</label><br><input type="number" name="cena"><br>
                <label>zdjęcie</label><br><input type="text" name="zdjecie"><br>
                <button type="submit">Dodaj</button>
            </form>
            <?php
                if(isset($_POST['nazwa'])) {
                    $nazwa = @$_POST['nazwa'];
                    $opis = @$_POST['opis'];
                    $cena = @$_POST['cena'];
                    $zdjecie = @$_POST['zdjecie'];
                    $zap4 = "INSERT INTO `gry`(`nazwa`, `opis`, `punkty`, `cena`, `zdjecie`) VALUES ('$nazwa','$opis', 0, $cena,'$zdjecie');";
                $wynik4 = mysqli_query($conn, $zap4);
                }
                            
                ?>
        </section>
    </main>
    <footer>
        <form method="post">
            <input type="text" placeholder="Podaj id" name="id"><button type="submit">Pokaż opis</button>
            <?php
                if(isset($_POST['id'])) {
                    $id = @$_POST['id'];
                    $zap2 = "select nazwa, LEFT(opis, 100), id, punkty, cena from gry where id = $id;";
                    $wynik2 = mysqli_query($conn, $zap2);
                    while ($row = mysqli_fetch_row($wynik2)) {
                        echo "<h2>". $row[0]. ", ". $row[3]. " punktow, ". $row[4]. " ". "zł". "</h2>";
                        echo "<p>". $row[1]. "</p>";
                    }
                }
                            mysqli_close($conn);
                ?>
        </form>
    </footer>
</body>
</html>
