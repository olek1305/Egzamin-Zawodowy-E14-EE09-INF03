<!doctype html>
<html lang="pl_PL">
<head>
    <meta charset="UTF-8">
    <title>Kwiaty</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
<header>
    <h1>Grupa Polskich Kwiaciarni</h1>
</header>
<main>
    <section id="lewy">
        <h2>Menu</h2>
        <ol>
            <li><a href="index.html">Strona główna</a></li>
            <li><a href="https://www.kwiaty.pl/" target="_blank">Rozpoznaj kwiaty</a></li>
            <li><a href="znajdz.php">Znajdź kwiarciarnię</a>
                <ul>
                    <li>w Warszawie</li>
                    <li>w Malborku</li>
                    <li>w Poznaniu</li>
                </ul>
            </li>
        </ol>
    </section>
    <section id="prawy">
        <form action="znajdz.php" method="POST">
            <h2>Znajdź kwiaciarnię</h2>
            <label>
                Podaj nazwę miasta:
                <input type="text" name="miasto">
            </label>
            <button name="wyslij">SPRAWDŹ</button>
        </form>
        <?php
            $con = mysqli_connect('localhost', 'root', '', 'kwiaciarnia');
            if (isset($_POST['wyslij'])) {
                $miasto = $_POST['miasto'];
                $q = "SELECT nazwa, ulica FROM kwiaciarnie WHERE miasto = '$miasto';";
                $res = mysqli_query($con, $q);
                while ($row = mysqli_fetch_array($res)) {
                    echo "<h3>$row[0], $row[1]</h3>";
                }
            }
            mysqli_close($con);
        ?>
    </section>
</main>
<footer>
    <p>Stronę opracował: olek1305</p>
</footer>
</body>
</html>