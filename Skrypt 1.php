<?php 
/* INF.03-01-26.01-SG */ /* INF.03-01-26.01-SG */ /* INF.03-01-26.01-SG */ /* INF.03-01-26.01-SG */ /* INF.03-01-26.01-SG */
?>
Skrypt 1
− Wysyła do bazy danych zapytanie 3
− W czwartej kolumnie tabeli wyświetlana jest cena całkowita, która jest sumą ceny z tabeli pojazdy
oraz dopłaty z tabeli kolory
− W wierszach tabeli wyświetlane są kolejne rekordy zgodnie z ilustracją 2.
<?php
$connect = mysqli_connect("localhost", "root", "", "samochody");
            $query3 = "SELECT pojazdy.marka, pojazdy.model, pojazdy.cena, kolory.nazwa, kolory.doplata FROM pojazdy JOIN kolory ON pojazdy.kolor = kolory.id WHERE pojazdy.model = 'alfa';";
            $result = mysqli_query($connect, $query3);
            while ($row = mysqli_fetch_array($result)) {
                $fullPrice = $row['cena'] + $row['doplata'];
                echo "<tr>
                <td>{$row['marka']}</td>
                <td>{$row['model']}</td>
                <td>{$row['nazwa']}</td>
                <td>{$fullPrice}</td>
            </tr>";
} 
?>
Skrypt 2
− Wysyła do bazy danych zapytanie 4
− Wyświetla pierwszy rekord w tabeli w wierszach 3 i 4; drugi rekord w wierszach 6 i 7
− Na końcu zamykane jest połączenie z serwerem
<?php
            $query4 = "SELECT marka, model, cena FROM pojazdy ORDER BY RAND() LIMIT 2;";
            $result = mysqli_query($connect, $query4);
            $vehicle1 = mysqli_fetch_array($result);
            $vehicle2 = mysqli_fetch_array($result);
?> 
<?php
/* INF.03-02-26.01-SG */ /* INF.03-02-26.01-SG */ /* INF.03-02-26.01-SG */ /* INF.03-02-26.01-SG */ /* INF.03-02-26.01-SG */
?>
Skrypt 1:
− Wysyła do bazy danych zapytanie 1
− Dla każdego wiersza pobranego z bazy wyświetla obraz o pobranej z bazy nazwie pliku i tekście
alternatywnym odpowiadającym nazwie owocu
<?php
$connect = mysqli_connect("localhost", "root", "", "bazar");
        $query1 = "SELECT nazwa, plik FROM towar LIMIT 10;";
        $result = mysqli_query($connect, $query1);
        while ($row = mysqli_fetch_array($result)) {
            echo "<img src='{$row['plik']}' alt='{$row['nazwa']}'>";
        } 
?>
Skrypt 2 (ilustracja 4):
− Wysyła do bazy danych zapytanie 2
− Dla każdego wiersza pobranego z bazy generuje opcję listy rozwijanej, gdzie w atrybucie value
znajduje się zwrócone pole id, a w treści opcji znajduje się nazwa towaru
<?php
$query2 = "SELECT id, nazwa FROM towar;";
            $result = mysqli_query($connect, $query2);
            while ($row = mysqli_fetch_array($result)) {
                echo "<option value='{$row['id']}'>{$row['nazwa']}</option>";
    } 
?>
Skrypt 3, wykonywany tylko wtedy, gdy wysłano dane z formularza (ilustracja 5):
− Pobiera wartości z formularza: id towaru i liczbę kilogramów
− Wysyła do bazy danych zmodyfikowane zapytanie 3, tak że wybierany jest rekord o id wskazanym
w formularzu
− Oblicza wartość na podstawie zwróconej zapytaniem ceny oraz liczby kilogramów wysłanej
z formularza
− Wypisuje w dodatkowym paragrafie pod formularzem tekst: „<rodzaj> <nazwa> wartość:
<wartość> zł”, gdzie w znakach <> umieszczono zwrócone zapytaniem pola i wyliczoną wartość
− Wstawia do bazy rekord za pomocą zmodyfikowanego zapytania 4, w ten sposób, że w miejscu id
towaru i liczby kilogramów są wpisywane odpowiednie wartości wysłane z formularza (id sklepu
pozostaje bez zmian lub jest pomijane)
− Po wykonaniu wszystkich operacji połączenie z bazą jest zamykane
<?php
if (isset($_POST['submit']) && !empty($_POST['waga'])) {
                $id_towaru = $_POST['towar'];
                $waga = $_POST['waga'];
                $query3 = "SELECT rodzaj, nazwa, cena FROM towar WHERE id = $id_towaru;";
                $result = mysqli_query($connect, $query3);
                $row = mysqli_fetch_array($result);
                $wartosc = $waga * intval($row['cena']);
                echo "<p>{$row['rodzaj']} {$row['nazwa']} wartość: $wartosc zł</p>";
                $query4 = "INSERT INTO zamowienie VALUES (NULL, $id_towaru, 2, $waga);";
                mysqli_query($connect, $query4);
            } 
?>