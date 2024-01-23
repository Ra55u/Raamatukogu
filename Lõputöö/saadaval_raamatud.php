<?php
include("config.php");
include("navbar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["laenuta"])) {
    $raamatu_id = $_POST["raamatu_id"];
    $laenutus_kp = $_POST["laenutus_kp"];

    // Päring raamatu välja laenamiseks
    $sql = "UPDATE Raamat SET Saadavus = 0, Laenutus_kp = '$laenutus_kp' WHERE Id = $raamatu_id";

    if ($yhendus->query($sql) === TRUE) {
        echo "Raamat on edukalt laenutatud.";
    } else {
        echo "Viga: " . $yhendus->error;
    }
}

// Päring saadaval olevate raamatute kuvamiseks
$sql = "SELECT * FROM Raamat WHERE Saadavus = 1";
$result = $yhendus->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Saadaval olevad raamatud</title>
</head>
<body>
    <h1>Saadaval olevad raamatud</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nimi</th>
            <th>Autor</th>
            <th>Laenutus kuupäev</th>
            <th>Laenu pikkus (päevades)</th>
            <th>Tegevused</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["Id"] . "</td>";
            echo "<td>" . $row["Nimi"] . "</td>";
            echo "<td>" . $row["Autor"] . "</td>";
            echo "<td>" . $row["Laenutus_kp"] . "</td>";
            echo "<td>" . $row["Laenu_pikkus"] . "</td>";
            echo "<td>
                    <form method='post'>
                        <input type='hidden' name='raamatu_id' value='" . $row["Id"] . "'>
                        <input type='date' name='laenutus_kp' required>
                        <input type='submit' name='laenuta' value='Laenuta'>
                    </form>
                </td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
