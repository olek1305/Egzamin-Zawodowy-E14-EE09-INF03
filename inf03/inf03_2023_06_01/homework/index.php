<!doctype html>
<html lang="pl_PL">
<head>
    <meta charset="UTF-8">
    <title>Sklep dla uczniów</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Dzisiejsze promocje naszego sklepu</h1>
    </header>
    <main>
        <?php
        $con = mysqli_connect('localhost', 'root', '', 'sklep');
        ?>
        <section id="lewy">
            <h2>Taniej o 30%</h2>
            <ol>
                <?php
                $q = "SELECT nazwa FROM towary WHERE promocja = 1;";
                $res = mysqli_query($con, $q);
                while ($row = mysqli_fetch_array($res)) {
                    echo "<li>$row[0]</li>";
                }
                ?>
            </ol>

        </section>
        <section id="srodkowy">
            <h2>Sprawdź cenę</h2>
            <form action="index.php" method="POST">
                <select name="list">
                    <option value="Gumka do mazania">Gumka do mazania</option>
                    <option value="Cienkopis">Cienkopis</option>
                    <option value="Pisaki 60 szt.">Pisaki 60 szt.</option>
                    <option value="Markery 4 szt.">Markery 4 szt.</option>
                </select>
                <button name="submit">SPRAWDŹ</button>
            </form>
            <section class="wynik">
                <?php
                if (isset($_POST['submit'])) {
                    $produkt = $_POST['list'];
                    $q = "SELECT cena FROM towary WHERE nazwa = '$produkt';";
                    $res = mysqli_query($con, $q);
                    while ($row = mysqli_fetch_array($res)) {
                        echo "cena regularna: $row[0]</br>";
                        $cena = ROUND($row[0] * 0.7, 2);
                        echo "cena w promocji 30%: $cena";
                    }
                }
                ?>
            </section>
        </section>
        <section id="prawy">
            <h2>Kontakt</h2>
            <p>e-mail: <a href="mailto:bok@sklep.pl">bok@sklep.pl</a></p>
            <img src="promocja.png" alt="promocja">
        </section>
        <?php
            mysqli_close($con);
        ?>
    </main>
    <footer>
        <h4>Autor strony: olek1305</h4>
    </footer>
</body>
</html>