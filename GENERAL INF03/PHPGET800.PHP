/* ISLANDIA */
<?php
$conn = mysqli_connect('localhost', 'root', '', 'islandia');

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Islandia</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>
            <a href="./islandia.php" >Zwiedzaj Islandia</a>
        </h1>
    </header>
    <aside>
        <h3>Do zwiedzenia</h3>
        <ul>
            <li>Wodospady:
                <ol>
                    <?php
                    $skrypt1 = "SELECT nazwa FROM obiekty where idRodzaj = 10; ";
                    $wynik = mysqli_query($conn, $skrypt1);
                    while($row = mysqli_fetch_row($wynik)){
                        echo "<li>". $row[0]. "</li>";
                        
                    }
                    
                    
                    ?>
                </ol>
            </li>
            <li>Siedliska zwierząt:
                <ol>
                    <?php
                    $skrypt2 = "SELECT nazwa FROM obiekty where idRodzaj = 14; ";
                    $wynik = mysqli_query($conn, $skrypt2);
                    while($row = mysqli_fetch_row($wynik)){
                        echo "<li>". $row[0]. "</li>";
                        
                    }
                    
                    
                    ?>
                </ol>
            </li>
        </ul>
    </aside>
    <main>
        <h2>Opis zdjęcia</h2>
        <section>
            <?php
        
                 $skrypt3 = "SELECT idObiekt, plik, nazwa from obiekty;";
                 $wynik = mysqli_query($conn, $skrypt3);
                   
                 while($row = mysqli_fetch_assoc($wynik)){
    
                        echo "<a href='obiekty.php?idObiekt=$row[idObiekt]'>";
                        echo "<img src='$row[plik]' alt='$row[nazwa]' title='$row[nazwa]' class='miniatura'>";
                        echo "</a>";
                 }
                 
                 

            
            
            
            
            ?>
        </section>
    </main>
    <footer>
        <hr>
    <p>Autor: </p>
    </footer>
</body>
</html>
/* OBIEKTY */
<?php
$conn = mysqli_connect('localhost', 'root', '', 'islandia');

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Islandia</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>
            <a href="./islandia.php" >Zwiedzaj Islandia</a>
        </h1>
    </header>
    <aside>
        <h3>Do zwiedzenia</h3>
        <ul>
            <li>Wodospady:
                <ol>
                    <?php
                    $skrypt1 = "SELECT nazwa FROM obiekty where idRodzaj = 10; ";
                    $wynik = mysqli_query($conn, $skrypt1);
                    while($row = mysqli_fetch_row($wynik)){
                        echo "<li>". $row[0]. "</li>";
                        
                    }
                    
                    
                    ?>
                </ol>
            </li>
            <li>Siedliska zwierząt:
                <ol>
                    <?php
                    $skrypt2 = "SELECT nazwa FROM obiekty where idRodzaj = 14; ";
                    $wynik = mysqli_query($conn, $skrypt2);
                    while($row = mysqli_fetch_row($wynik)){
                        echo "<li>". $row[0]. "</li>";
                        
                    }
                    
                    
                    ?>
                </ol>
            </li>
        </ul>
    </aside>
    <main>
        <h2>Galeria</h2>
        <section>
            <?php
        
                 $skrypt4 = "SELECT obiekty.plik, obiekty.nazwa, obiekty.nazwaCechy, obiekty.wartoscCechy, obiekty.opis, rodzaje.rodzaj FROM obiekty JOIN rodzaje on obiekty.idRodzaj = rodzaje.idRodzaj where obiekty.idObiekt = '$_GET[idObiekt]'";
                 $wynik = mysqli_query($conn, $skrypt4);
         
                 while($row = mysqli_fetch_assoc($wynik)){
                        echo "<img src='$row[plik]' alt='$row[nazwa]' title='$row[nazwa]' class='miniatura'>";
                        echo "<h2>". $row['nazwa']. "</h2>";
                        echo "<h3>". $row['rodzaj']. "</h3>";
                        echo "<p>". $row['nazwaCechy'].  ": " . $row['wartoscCechy']."</p>";
                        echo "<p>". $row['opis']. "</p>";
                 }
                 
                 

            
            
            
            
            ?>
        </section>
    </main>
    <footer>
        <hr>
    <p>Autor: </p>
    </footer>
</body>
</html>
