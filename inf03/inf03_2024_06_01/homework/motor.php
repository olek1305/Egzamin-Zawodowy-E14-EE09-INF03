<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
<img src="motor.png" alt="motocykl" id="motocykl">
<header>
    <h1>Motocykle - moja pasja</h1>
</header>
<main>
    <section id="lewy1">
        <h2>Gdzie pojechać?</h2>
        <?php
            $con = mysqli_connect('localhost', 'root', '', 'motory');
            $q = 'SELECT wycieczki.nazwa, wycieczki.opis, wycieczki.poczatek, zdjecia.zrodlo 
                    FROM wycieczki JOIN zdjecia ON wycieczki.zdjecia_id = zdjecia.id;';
            $res = mysqli_query($con, $q);
            while ($row = mysqli_fetch_array($res)) {
                echo "<dt>$row[0], rozpoczyna się w $row[2], ";
                echo "<a href='$row[3].jpg'>zobacz zdjęcie</a></dt>";
                echo "<dd>$row[1]</dd>";
            }
        ?>
    </section>
    <section id="prawy1">
        <h2>Co kupić?</h2>
        <ol>
            <li>Honda CBR125R</li>
            <li>Yamaha YBR125</li>
            <li>Honda VFR800i</li>
            <li>Honda CBR1100XX</li>
            <li>BMW R1200GS LC</li>
        </ol>
    </section>
    <section id="prawy2">
        <h2>Statystyki</h2>
        <p>Wpisanych wycieczek:
            <?php
                $q1 = 'SELECT COUNT(*) as liczba_wycieczek FROM wycieczki;';
                $res1 = mysqli_query($con, $q1);
                $row = mysqli_fetch_array($res1);
                echo $row['liczba_wycieczek'];

                mysqli_close($con);
            ?>
        </p>
        <p>Użytkowników forum: 200</p>
        <p>Przesłanych zdjęć: 1300</p>
    </section>
</main>
<footer>
    <p>Stronę wykonał: olek1305</p>
</footer>
</body>
</html>