<?php
include("config.php");
include("navbar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["lisaraamat"])) {
    $nimi = $_POST["nimi"];
    $autor = $_POST["autor"];
    $laenutus_kp = $_POST["laenutus_kp"];
    $laenu_pikkus = $_POST["laenu_pikkus"];
    $saadavus = 1;

    // Päring raamatu lisamiseks
    $sql = "INSERT INTO Raamat (Nimi, Autor, Laenutus_kp, Laenu_pikkus, Saadavus) VALUES ('$nimi', '$autor', '$laenutus_kp', $laenu_pikkus, $saadavus)";

    if ($yhendus->query($sql) === TRUE) {
        echo "Raamat on edukalt lisatud.";
    } else {
        echo "Viga: " . $yhendus->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Lisa raamat</title>
</head>
<body>
    <h1>Lisa raamat</h1>
    <form method="post">
        <label for="nimi">Nimi:</label>
        <input type="text" name="nimi" required><br>

        <label for="autor">Autor:</label>
        <input type="text" name="autor" required><br>

        <label for="laenutus_kp">Laenutus kuupäev:</label>
        <input type="date" name="laenutus_kp" required><br>

        <label for="laenu_pikkus">Laenu pikkus (päevades):</label>
        <input type="number" name="laenu_pikkus" required><br>

        <input type="submit" name="lisaraamat" value="Lisa raamat">
    </form>
</body>
</html>
