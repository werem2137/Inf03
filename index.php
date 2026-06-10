<?php
$conn = mysqli_connect('localhost', 'root', '', 'wodospad');
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wodospady</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h2>Łowcy wodospadów</h2>
    </header>
    <main>
        <aside>
            <?php
            $zap1 = "SELECT idKontynent, nazwa FROM kontynenty;";
            $wynik1 = mysqli_query($conn, $zap1);
            while ($row = mysqli_fetch_assoc($wynik1)) {
                 echo "<a href='index.php?idKontynent=$row[idKontynent]'>". $row['nazwa']. "</a>";
            }
            ?>
        </aside>
        <section>
            <table>
            <tr>
                <th>Identyfikator</th>
                <th>Państwo</th>
                <th>Nazwa wodospadu</th>
                <th>Wysokość</th>
                <?php
                $id_Kontynentu = $_GET['idKontynentu'] ?? 6;
                $zap3 = "SELECT idWodospadu, panstwo, nazwa, wysokosc FROM wodospady WHERE idKontynent = $id_Kontynentu;";
                $wynik3 = mysqli_query($conn, $zap3);
                while ($row = mysqli_fetch_assoc($wynik3)) {
                    echo "<tr><td>". $row['idWodospadu']. "</td><td>". $row['panstwo']. "</td><td>". $row['nazwa']. "</td><td>". $row['wysokosc']. "</td></tr>";
                }
                ?>
            </tr>
</table>
            <h4>Wpisz osiągnięcie do bazy</h4>
            <form method="post">
            <label>Identyfikator wodospadu<input type="number" name="id"></label>
            <label>Turysta
                <select name="lista">
                    <?php
                    $zap5 = "SELECT idTurysta, nick FROM turysci ORDER BY nick;";
                    $wynik5 = mysqli_query($conn, $zap5);
                    while ($row = mysqli_fetch_assoc($wynik5)) {
                       echo "<option value='$row[idTurysta]'>". $row['nick']. "</option>"  ;
                    }

                    if (isset($_POST['id'])) {
                        $id = $_POST['id'];
                        $lista = $_POST['lista'];
                        $zap4 = "INSERT INTO wpisy(`idWodospadu`, `idTurysta`) VALUES ('$id', '$lista')";
                        $wynik4 = mysqli_query($conn, $zap4);
                        }
                    ?>
                </select>

            </label>
            <button type="submit">Wpisz</button>
        </form>
        </section>
    </main>
    <article>
        <h3>Wodospady w Polsce</h3>
        <img src="kamienczyk.jpg" alt="Wodospad">
        <img src="siklawa.jpg" alt="Wodospad">
        <img src="siklawica.jpg" alt="Wodospad">
        <img src="wilczki.jpg" alt="Wodospad">
        <img src="wodogrzmoty.jpg" alt="Wodospad">
    </article>
    <footer>
        Autor: 67destroyer
    </footer>
</body>
<?php
mysqli_close($conn);
?>
</html>