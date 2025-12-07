<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Grzybobranie</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <header>
        <section class="miniatura">
            <a href="borowik.jpg"><img src="borowik-miniatura.jpg" alt="Grzybobranie"></a>
        </section>
        <section class="tytulowa">
            <h1>Idziemy na grzyby!</h1>
        </section>
    </header>
    <main>
        <section class="lewy">
            <?php
            $con = mysqli_connect('localhost', 'root', '', 'dane2');
            $q = 'SELECT nazwa_pliku, potoczna FROM grzyby;';
            $res = mysqli_query($con, $q);
            while ($row = mysqli_fetch_array($res)) {
                echo "<img src='{$row['nazwa_pliku']}' alt='{$row['potoczna']}'>";
            }
            ?>
        </section>
        <section class="prawy">
            <h2>Grzyby jadalne</h2>
            <?php
            $q = 'SELECT nazwa, potoczna FROM grzyby WHERE jadalny = 1;';
            $res = mysqli_query($con, $q);
            while ($row = mysqli_fetch_array($res)) {
                echo "<p>{$row['nazwa']} ({$row['potoczna']})</p>";
            }
            ?>
            <h2>Polecamy do sosów</h2>
            <ol>
                <?php
                $q = 'SELECT grzyby.nazwa, grzyby.potoczna, rodzina.nazwa AS rodzina FROM grzyby JOIN rodzina ON grzyby.rodzina_id = rodzina.id JOIN potrawy ON grzyby.potrawy_id = potrawy.id WHERE potrawy.nazwa = "sos";';
                $res = mysqli_query($con, $q);
                while ($row = mysqli_fetch_array($res)) {
                    echo "<li>{$row['nazwa']} ({$row['potoczna']}), rodzina: {$row['rodzina']}</li>";
                }
                mysqli_close($con);
                ?>
            </ol>
        </section>
    </main>
    <footer>
        <p>Autor: olek1305</p>
    </footer>
</body>
</html>