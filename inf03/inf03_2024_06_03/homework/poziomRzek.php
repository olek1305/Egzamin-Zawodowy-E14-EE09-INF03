<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Poziomy rzek</title>
</head>
<body>
    <header>
        <section id="bannerlewy">
            <img src="obraz1.png" alt="Mapa Polski">
        </section>
        <section id="bannerprawy">
            <h1>Rzeki w województwie dolnośląskim</h1>
        </section>
    </header>
    <nav>
        <form action="poziomRzek.php">
            <label for="" id="input">
                <input type="radio" name="stan" value="1" checked>Wszystkie
            </label>
            <label for="" id="input">
                <input type="radio" name="stan" value="2">Ponad stan ostrzegawczy
            </label>
            <label for="" id="input">
                <input type="radio" name="stan" value="3">Ponad stan alarmowy
            </label>
            <button type="submit" name="pokaz">Pokaż</button>
        </form>
    </nav>
    <main>
        <section id="lewy">
            <h3>Stany na dzień 2022-05-05</h3>
            <table>
                <tr>
                    <th>Wodomierz</th>
                    <th>Rzeka</th>
                    <th>Ostrzegawczy</th>
                    <th>Alarmowy</th>
                    <th>Aktualny</th>
                </tr>
                <!-- skrypt -->
                <?php
                    $polaczenia = mysqli_connect("localhost", "root", "", "rzeki");

                    $zapytanie = "SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody FROM wodowskazy JOIN pomiary ON wodowskazy.id = pomiary.wodowskazy_id WHERE dataPomiaru='2022-05-05';";
                    $wynik = mysqli_query($polaczenia, $zapytanie);

                    while($wiersz = mysqli_fetch_array($wynik))
                        {
                            echo "<tr>";
                            echo "<td>".$wiersz['nazwa']."</td>";
                            echo "<td>".$wiersz['rzeka']."</td>";
                            echo "<td>".$wiersz['stanOstrzegawczy']."</td>";
                            echo "<td>".$wiersz['stanAlarmowy']."</td>";
                            echo "<td>".$wiersz['stanWody']."</td>";
                            echo "</tr>";
                        }
                ?>
            </table>
        </section>
        <section id="prawy">
            <h3>Informacje</h3>
            <ul>
                <li>Brak ostrzeżeń o burzach z gradem</li>
                <li>Smog w mieście Wrocław</li>
                <li>Silny wiatr w Karkonoszach</li>
            </ul>
            <h3>Średnie stany wód</h3>
            <?php 
                $zapytanie2 = "SELECT dataPomiaru, AVG(stanWody) FROM pomiary GROUP BY dataPomiaru;";
                $wynik2 = mysqli_query($polaczenia, $zapytanie2);

                while($wiersz2 = mysqli_fetch_array($wynik2)) {
                    echo "<p>".$wiersz2[0] . ": " . $wiersz2[1]."</p>";
                }

                mysqli_close($polaczenia);
            ?>
            <a href="https://komunikaty.pl">Dowiedz się więcej</a>
            <img src="obraz2.jpg" alt="rzeka" id="rzeka">
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: olek1305</p>
    </footer>
</body>
</html>