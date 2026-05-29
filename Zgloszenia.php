<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <label>Imię Klienta</label><input type="text" name="klient">
        <label>Model Pojazdu</label><input type="text" name="model">
        <label>Opis Usterki</label><input type="text" name="usterka">
        <button type="submit">Dodaj</button>
    </form>

    <?php
    $conn = mysqli_connect("localhost", "root", "", "zgloszenia");
    if (isset($_POST['klient'])) {
        $klient = $_POST['klient'];
        $model = $_POST['model'];
        $usterka = $_POST['usterka'];
        $dodac = "INSERT INTO `zgloszenia` (`klient`, `model`, `usterka`) VALUES ('$klient', '$model', '$usterka');";
        mysqli_query($conn, $dodac);
        echo "Wysłane";

        $dodac2 = "SELECT * FROM zgloszenia;";
        $wynik = mysqli_query($conn, $dodac2);
        echo "<table><tr>
            <th>Klient</th>
            <th>Model</th>
            <th>Usterka</th>
        </tr>";

        while ($row = mysqli_fetch_row($wynik)) {
            echo "<tr><td>". $row[1]. "</td>". "<td>". $row[2]. "</td>". "<td>". $row[3]. "</td> </tr>";
        }
        "</table>";
    } 
    mysqli_close($conn);
    ?>
</body>
</html>
