<?php
include("config.php");
include("navbar.php");

// Kustutamise päring
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["kustuta"])) {
    $raamatu_id = $_POST["raamatu_id"];

    // Päring raamatu kustutamiseks
    $sql_delete = "DELETE FROM Raamat WHERE Id = $raamatu_id";

    if ($yhendus->query($sql_delete) === TRUE) {
        echo "Raamat on edukalt kustutatud.";
    } else {
        echo "Viga kustutamisel: " . $yhendus->error;
    }
}

// Päring välja laenatud raamatute kuvamiseks
$sql_select = "SELECT * FROM Raamat WHERE Saadavus = 0";
$result = $yhendus->query($sql_select);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Välja laenatud raamatud</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Välja laenatud raamatud</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nimi</th>
            <th>Autor</th>
            <th>Laenutus kuupäev</th>
            <th>Laenu tähtaeg</th>
            <th>Laenutamise seisund</th>
            <th>Tegevused</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            $laenutus_kp = new DateTime($row["Laenutus_kp"]);
            $laenu_tahtaeg = $laenutus_kp->add(new DateInterval('P' . $row["Laenu_pikkus"] . 'D'));
            $tana = new DateTime();
            
            echo "<tr>";
            echo "<td>" . $row["Id"] . "</td>";
            echo "<td>" . $row["Nimi"] . "</td>";
            echo "<td>" . $row["Autor"] . "</td>";
            echo "<td>" . $row["Laenutus_kp"] . "</td>";
            echo "<td>" . $laenu_tahtaeg->format('Y-m-d') . "</td>";
            
            $laenutamise_seisund = "";
            if ($tana <= $laenu_tahtaeg) {
                $laenutamise_seisund = "<span style='color:green;'>Üle nädala veel</span>";
            } elseif ($tana <= $laenu_tahtaeg->modify('+7 days')) {
                $laenutamise_seisund = "<span style='color:yellow;'>Kuni nädal veel</span>";
            } else {
                $laenutamise_seisund = "<span style='color:red;'>Ületanud tähtaja</span>";
            }

            echo "<td>" . $laenutamise_seisund . "</td>";
            echo "<td>
                    <form method='post' style='display:inline;'>
                        <input type='hidden' name='raamatu_id' value='" . $row["Id"] . "'>
                        <input type='submit' name='kustuta' value='Kustuta'>
                    </form>
                </td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
