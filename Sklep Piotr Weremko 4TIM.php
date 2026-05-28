<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklep</title>
</head>
<body>

<form method="post">

    <select name="produkt">
        <option value="3">Mleko</option>
        <option value="4">Chleb</option>
        <option value="3">Mieso</option>
        <option value="7">Pomidor</option>
    </select>

    <label>Liczba</label>
    <input type="number" name="liczba">

    <br><br>

    <label>Rabat</label>
    <input type="checkbox" name="rabat">

    <label>Karta</label>
    <input type="checkbox" name="karta">

    <br><br>

    <button type="submit">Oblicz</button>

</form>

<?php

if(isset($_POST['produkt'])) {

    $produkt = $_POST['produkt'];
    $liczba = $_POST['liczba'];

    $rabat = isset($_POST['rabat']);
    $karta = isset($_POST['karta']);

    if($produkt == 3) {
        $nazwa = "Mleko lub Mieso";
    }

    if($produkt == 4) {
        $nazwa = "Chleb";
    }

    if($produkt == 7) {
        $nazwa = "Pomidor";
    }

    $cena = ($produkt * $liczba);

    if($rabat) {
        $cena = $cena - ($cena * 0.05);
    }

    if($karta) {
        $cena = $cena - ($cena * 0.10);
    }

    echo "Produkt: " . $nazwa . "<br>";
    echo "Liczba sztuk: " . $liczba . "<br>";
    echo "Do zaplaty: " . round($cena, 2) . " zl";
}

?>

</body>
</html>