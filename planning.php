<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Planning</title>
    <!-- Connectie met styles.ccs -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="banner">
    <div class="nav">
        <img src="logogym.png" class="logo">
        <ul>
            <!-- Navigatie -->
            <li><a href="home.php">Home</a></li>
            <li><a href="progressie.php">Gym Progressie</a></li>
            <li><a href="planning.php">Gym Planning</a></li>
            <li><a href="formulier.php">Gym Formulier</a></li>
        </ul>
    </div>
    <div class="contentprogressie">
        <h1>GYM PLANNING</h1>
    </div>
    <?php

    // Verbinding met de database
    include 'configdb.php';

    // Maken van de tabel
    echo "<table style='background-color: transparent; position: absolute; bottom: 15%; left: 35%; width: 600px; height: 500px;'>" .
        "<td>" .
        "<table>" .
        "<td style='color: white; width: 200px'><b>Weeknummer</b></td>" .
        "<td style='color: white; width: 200px'><b>Aantal dagen</b></td>" .
        "<td style='color: white; width: 200px'><b>Aantal uur</b></td>" .
        "<td style='color: white; width: 200px'><b>Datum naar Gym</b></td>";
    echo "<form method='post'><select name='dropdown'>";

    // Data uit de database word hier gehaald
    $sql1 = "select weeknummer From formulier";
    $result1 = mysqli_query($con, $sql1);
    while ($row = mysqli_fetch_array($result1)) {
        echo "<option>$row[weeknummer]</option>";
    }

    "</select>";

    // Hier kan je met een dropdown menu, zien wat je bijvoorbeeld in week 1 hebt gedaan.
    echo "<input type='submit'></form>";
    if (isset($_POST['dropdown'])) {
        $dropdown = mysqli_real_escape_string($con, $_POST['dropdown']);

        $sql = "select weeknummer, aantaldagen, aantaluur, datumgym From formulier WHERE weeknummer LIKE '" . $dropdown . "%'";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td style='color: white; width: 200px; border: white solid 1px'>" . $row["weeknummer"] .
                "<td style='color: white; width: 200px; border: white solid 1px'>" . $row["aantaldagen"] .
                "<td style='color: white; width: 200px; border: white solid 1px'>" . $row["aantaluur"] .
                "</td><td style='color: white; width: 200px; border: white solid 1px'>" . $row["datumgym"] . "</td>";
            echo "</tr>";
        }
    }
    echo "</table></table>"; ?>
</div>
</div>
</body>
</html>