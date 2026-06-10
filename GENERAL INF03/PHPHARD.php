<?php
$conn = mysqli_connect('localhost', 'root', '', 'przewozy');
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Firma Przewozowa</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Firma przewozowa Półdarmo</h1>
    </header>
    <nav>
        <a href="kw1.png">kwerenda1</a>
        <a href="kw2.png">kwerenda2</a> 
        <a href="kw3.png">kwerenda3</a> 
        <a href="kw4.png">kwerenda4</a>  
    </nav>
    <main>
        <section id="lewy">
            <h2>Zadania do wykonania</h2>
            <table>
                <tr>
                    <th>Zadanie do wykonania</th>
                    <th>Data realizacji</th>
                    <th>Akcja</th>
                </tr>
                <?php 
                $zap1 = "select id_zadania, zadanie, data from zadania;";
                $wynik = mysqli_query($conn, $zap1);
                
                    while ($row = mysqli_fetch_row($wynik)) {
                        echo "<tr> <td>". $row[1]. "</td>". "<td>". $row[2]. "</td>". "<td>"."<a href='przewozy.php?id_zadania='>Usuń</a>". "</td> </tr>";
                }
                ?>
            </table>
            <form method="POST">
                <label>Zadanie do wykonania</label><input type="text" name="zadanie"><br>
                <label>Data realizacji:</label><input type="date" name="data">
                <button type="submit">Dodaj</button>
            </form>
                 <?php 
                    if(isset($_POST['zadanie'])){
                        $zadanie = $_POST['zadanie'];
                        $data = $_POST['data'];
                        $zap2 = "INSERT INTO `zadania`(`zadanie`, `data`, `osoba_id`) VALUES ('$zadanie', '$data', 1);";
                        $wynik3 = mysqli_query($conn, $zap2);
                    }
                    mysqli_close($conn);
                 ?>
        </section>
        <section id="prawy">
            <img src="auto1.png" alt="auto firmowe">
            <h3>Nasza specjalność</h3>
            <ul>
                <li>Przeprowadzki</li>
                <li>Przewóz mebli</li>
                <li>Przesyłki gabarytowe</li>
                <li>Wynajem pojazdów</li>
                <li>Zakupy towarów</li>
            </ul>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: 69destroyer</p>
    </footer>
</body>
</html>
