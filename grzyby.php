<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Grzybobranie</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <div id="tytul">
            <h1>Czas na grzyby!</h1>
        </div>
        <div id="miniatura">
            <a href="podgrzybek.jpg"><img src="podgrzybek-miniatura.jpg" alt="Grzybobranie"></a>
        </div>
    </header>
    <main>
        <div id="lewy">
            <h3>Grzyby jadalne</h3>
            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'grzybobranie');
            $q1 = "SELECT id,nazwa,potoczna FROM grzyby WHERE jadalny=1";
            $res1 = mysqli_query($conn, $q1);
            foreach ($res1 as $row) {
                echo "<p>$row[id]. $row[nazwa] ($row[potoczna]) </p>";
            }
            ?>
            <h3>Polecamy do zup</h3>
            <ul>
                <?php
                $q2 = 'SELECT potoczna, rodzina.nazwa FROM grzyby INNER JOIN rodzina ON grzyby.rodzina_id=rodzina.id WHERE potrawy_id=4';
                $res2 = mysqli_query($conn, $q2);
                foreach ($res2 as $row) {
                    echo "<li>$row[potoczna], rodzina: $row[nazwa] </li>";
                }
                ?>
            </ul>
        </div>
        <div id="prawy">
            <?php
            $q3 = 'SELECT nazwa_pliku,nazwa FROM grzyby;';
            $res3 = mysqli_query($conn, $q3);
            foreach ($res3 as $row) {
                echo "<img src='$row[nazwa_pliku]' title='$row[nazwa]'>";
            }
            mysqli_close($conn);
            ?>
        </div>
    </main>
    <footer>
        <p>AUTOR: PESEL</p>
    </footer>
</body>

</html>