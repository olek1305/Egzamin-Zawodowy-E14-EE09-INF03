<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wędkowanie</title>
    <link rel="stylesheet" href="styl_1.css">
</head>
<body>
    <header>
        <h1>Portal dla wędkarzy</h1>
    </header>
    <main>
        <section id="lewy1">
            <h3>Ryby zamieszkujące rzeki</h3>
            <ol>
                <?php
                $con = mysqli_connect('localhost', 'root', '', 'wedkowanie');
                $q = "SELECT ryby.nazwa, lowisko.akwen, lowisko.wojewodztwo FROM ryby INNER JOIN lowisko ON ryby.id = lowisko.Ryby_id WHERE lowisko.rodzaj = 3;";
                $res = mysqli_query($con, $q);
                while ($row = mysqli_fetch_array($res)) {
                    echo "<li>$row[0] pływa w rzece $row[1], $row[2]</li>";
                }
                mysqli_close($con);
                ?>
            </ol>
        </section>
        <section id="prawy">
            <img src="ryba1.jpg" alt="Sum"><br>
            <a href="kwerendy.txt">Pobierz kwerendy</a>
        </section>
        <section id="lewy2">
            <h3>Ryby drapieżne naszych wód</h3>
            <table>
                <tr>
                    <th>L.p</th>
                    <th>Gatunek</th>
                    <th>Wystepowanie</th>
                </tr>
                <?php
                $con = mysqli_connect('localhost', 'root', '', 'wedkowanie');
                $q = "SELECT id, nazwa, wystepowanie FROM ryby WHERE styl_zycia = 1;";
                $res = mysqli_query($con, $q);
                while ($row = mysqli_fetch_array($res)) {
                    echo "<tr>
                          <td>$row[0]</td>
                          <td>$row[1]</td>
                          <td>$row[2]</td>
                          </tr>";
                }
                mysqli_close($con);
                ?>
            </table>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: olek1305</p>
    </footer>
</body>
</html>