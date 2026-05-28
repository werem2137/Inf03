<?php

##########################
### TWORZENIE ZMIENNEJ ###
##########################

[nazwa] = [wartosc];
$pieniadze = 67;


############################
### INSTRUKCJA WARUNKOWA ###
############################

 if ([Warunek]) { [Co jezeli prawda] }
 else { [Co jezeli falsz] }
$status = "";

if ($pieniadze < 100) {
    echo "Biedny jestes";
    $status = "biedak";
} else {
    echo "Ale bogacz";
    $status = "bogacz";
}

 Jezeli [Co jezeli prawda] to pojedynczka linijka nie potrzebujesz klamerek
if ($pieniadze == 0)
    echo "Ale z ciebie biedak";
else
    echo "Masz piniondz";

 else { [Co jezeli falsz] } NIE JEST WYMAGANE
if ($pieniadze == 67) {
    echo "haha";
}

###############
### SWITCHE ###
###############

 Instrukcja warunkowa tylko inaczej napisana

Switch [Zmienna] {
   Case [Wartosc zmiennej]:
        [Co jezeli prawda];
        Break;
   default:
        [Co jezeli nic nie pasuje];
        Break;
   }

 Ilosc Caseow moze byc jaka chcesz

switch ($status) {
    case 'bogacz':
        $pieniadze += 10;
        break;
    case 'biedak':
        $pieniadze += 1;
        break;
    default:
        $pieniadze += 0;
        break;
}

?>

<html lang="en">
<body>
    

#################
### FORMULARZ ###
#################

<!-- <form action="[nazwa pliku w ktorym jestes] method=[get/post]" -->


    <form action="tutorial.php" method="get">
        Ile dolarkuw chcesz otrzymac: <input type="number" name="dolarki">
        Czy ma byc opodatkowane: <input type="checkbox" name="opodatkowane">
        <button type="submit">Pieniadzuj</button>
    </form>

    <form action="tutorial.php" method="post">
        Ile masz piniondz: <input type="number" name="pieniadz">
        Czy masz prace: <input type="checkbox" name="praca">
        <button type="submit">Pieniadzuj</button>
    </form>

</body>
</html>

<?php

##########################
### POBIERANIE DANYCH ####
##########################

z method="get"
  $_GET["[name inputu]"]
 (Pobiera z url strony)

 z method="post"
  $_POST["[name inputu]"]

$iloscPiniendzy = $_POST["pieniadz"];
$czyOpodakowane = $_GET['opodatkowane'];

  ############################
  ###    SPRAWDZANIE CZY   ###
  ### FORMULARZ WYPELNIONY ###
  ############################

  empty([zmienna]) - Prawda, jezeli zmienna jest pusta
  isset([zmienna]) - Prawda, jezeli zmienna posiada wartosc

if (isset($iloscPiniendzy))
    echo "Podano ilosc pieniedzy";

if (empty($iloscPiniendzy))
    echo "Dawaj ten numer";

  ##########################
  ### WARTOSCI W TEKSCIE ###
  ##########################

  w podwojnym cudzyslowie zmienne sa dozwolone
    echo "Numer to $piniondz";
  wyświetli "Numer to [wartosc]";

  w pojedynczym cudzyslowie zmienne NIE ZMIENIAJA SIE
    echo 'Numer to $piniondz';
  wyswietli 'Numer to $piniondz';


  #####################
  ### KWERENDOWANIE ###
  #####################

  ### Tworzenie polaczenia ### 
  [zmienna polaczenia] = mysqli_connect( "[ip]", "[uzytkownik]", "[haslo]", "[baza]" )
    $conn = mysqli_connect('localhost', 'root', '', 'bazaJakas');
  
  ### Zamkniecie polaczenia ### 
  mysqli_close([zmienna polaczenia])
    mysqli_close($conn);
  LUB
  [zmienna polaczenia] -> close()
    $conn -> close();

  ### Zapytanie ### 
  [wynik zapytania] = mysqli_query([zmienna polaczenia], [zapytanie])
    $wynik = mysqli_query($conn, "select imie, nazwisko, rok from `tabela`");
  LUB
  [wynik zapytania] = [zmienna polaczenia] -> query([zapytanie])
    $wynik = $conn -> query("select imie, nazwisko, rok from `tabela`");

  zapytanie samo w sobie moze byc zmienna
    $zapytanie = "select imie, nazwisko, rok from `tabela`";
    $wynik = $conn -> query($zapytanie);

  ### Wypisywanie ###
  
  Wartosc jednego wiersza
  [Zmienna wiersza] = mysqli_fetch_row([wynik zapytania])
    $wiersz = mysqli_fetch_row($wynik);
  LUB
  [Zmienna wiersza] = [wynik zapytania] -> fetch_row();
    $wiersz = $wynik -> fetch_row();

  To bierze pierwszą linijke odpowiedzi SQLa numerujac kolumny
  wiec w przypadku:
  select imie, nazwisko, rok (...)
  $wiersz[0] to wartosc kolumny imie
  $wiersz[1] to wartosc kolumny nazwisko
  $wiersz[2] to wartosc kolumny rok

  Wszystkie wiersze po kolei
  while ([Zmienna wiersza] = mysqli_fetch_row([wynik zapytania])) {
      [Co ma sie dziac na kazdy wiersz odpowiedzi]
  } 
  LUB
  while ([Zmienna wiersza] = [wynik zapytania] -> fetch_row()) { }
 
    while ($wiersz = mysqli_fetch_row($wynik)) {
        echo $wiersz[0];
    }

  Wypisze wszystkie wiersze z pierwszej kolumny
  

?>