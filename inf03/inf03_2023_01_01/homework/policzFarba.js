function policzFarba() {
    const $policz = document.getElementById('powierzchnia').value;
    const $puszka = Math.ceil($policz / 4);
    document.getElementById('wynik').innerHTML = "Liczba potrzebnych puszek: " + $puszka;
}