<!doctype html>
<html lang="pl_PL">
<head>
    <meta charset="UTF-8">
    <title>Hurtownia szkolna</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
<header>
    <h1>Hurtownia z najlepszymi cenami</h1>
</header>
<main>
    <?php
    $con = mysqli_connect('localhost', 'root',
            '', 'sklep');
    ?>
    <section id="lewy">
        <h2>Nasze ceny</h2>
        <table>
            <?php
            $q = 'SELECT nazwa, cena FROM towary LIMIT 4;';
            $res = mysqli_query($con, $q);
            while ($row = mysqli_fetch_array($res)) {
                echo "<tr><td>$row[0]</td></tr>";
            }
            ?>
        </table>
    </section>
    <section id="srodkowy">
        <h2>Koszt zakupów</h2>
        <form action="index.php" method="post">
            <label>
                wybierz artykuł:
                <select name="list">
                    <option name="Zeszyt 60 kartek">Zeszyt 60 kartek</option>
                    <option name="Zeszyt 32 kartek">Zeszyt 32 kartek</option>
                    <option name="Cyrkiel">Cyrkiel</option>
                    <option name="Linijka 30 cm">Linijka 30 cm</option>
                </select>
                <br>
            </label>
            liczba sztuk: <input type="number" name="ilosc">
            <br>
            <button type="submit" name="submit">OBLICZ</button>
        </form>
        <p id="wynik">
            <?php
                if (isset($_POST['submit'])) {
                    $produkt = $_POST['list'];
                    $ilosc = $_POST['ilosc'];
                    $q = "SELECT cena FROM towary WHERE nazwa = '$produkt';";
                    $res = mysqli_query($con, $q);
                    while ($row = mysqli_fetch_array($res)) {
                        $cena = $row[0] * $ilosc;
                        echo "wartość zakupów: $cena";
                    }
                }
            mysqli_close($con);
            ?>
        </p>
    </section>
    <section id="prawy">
        <h2>Kontakt</h2>
        <img src="zakupy.png" alt="hurtownia">
        <p>email: <a href="mailto:hurt@poczta2.pl">hurt@poczta2.pl</a></p>
    </section>
</main>
<footer>
    <h4>Witrynę wykonał: olek1305</h4>
</footer>
</body>
</html>