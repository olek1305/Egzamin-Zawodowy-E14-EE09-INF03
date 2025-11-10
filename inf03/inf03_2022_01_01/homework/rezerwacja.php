<?php
$connect = mysqli_connect('localhost', 'root', '', 'baza');
if (isset($_POST['rezerwuj'])) {
    $data = $_POST['data'];
    $ilosc = $_POST['ilosc'];
    $telefon = $_POST['telefon'];
    $q = "INSERT INTO rezerwacje VALUES (NULL, NULL, '$data', $ilosc, '$telefon');";
    mysqli_query($connect, $q);
    echo "Dodano rezerwcje do bazy";
}
mysqli_close($connect);
?>