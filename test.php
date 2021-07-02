<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Progressie</title>
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
    <div id="box">
        <div id="postbox" style="bottom: 1%">
            <!-- Hier word het formulier gemaakt -->
            <form name="formulier" action="formulier.php" method="POST">
                <fieldset>
                    <legend><h1>VUL IN...</h1></legend>
                    <br>
                    <!-- Invul weeknummer -->
                    <input required type="text" id="weeknummer"
                           name="weeknummer" placeholder="Typ hier je week nummer in!"><br>
                    <!-- Invul aantaldagen -->
                    <select required name="aantaldagen" id="aantaldagen">
                        <option value="0">Hoeveel dagen in de week ga je naar de gym?</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                    </select>
                    <!-- Invul oefening -->
                    <select required name="oefening" id="oefening">
                        <option value="0">Welk onderdeel ga je doen?</option>
                        <option value="Cardio">Cardio</option>
                        <option value="Buikspieren">Buikspieren</option>
                        <option value="Borst">Borst</option>
                        <option value="Schouders">Schouders</option>
                        <option value="Biceps">Biceps</option>
                        <option value="Triceps">Triceps</option>
                        <option value="Benen">Benen</option>
                        <option value="Rug">Rug</option>
                    </select>
                    <!-- Invul Aantaluur -->
                    <select required name="aantaluur" id="aantaluur">
                        <option value="0">Aantal uren</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select><br>
                    <!-- Invul kilo's -->
                    <input required type="text" id="kilo"
                           name="kilo" placeholder="Aantal kilo bij elkaar!"><br>
                    <!-- Invul datum naar de gym -->
                    <label for="datumgym">Wanneer ga je naar de gym? </label><br>
                    <input required type="date" name="datumgym" id="datumgym"><br><br>
                </fieldset>
                <!-- Bevestiging knop -->
                <input type="submit" id="verzend"
                       name="verzend" value="Verzend">
            </form>
        </div>
    </div>
</div>
</div>
</body>
</html>
<?php

if (isset($_POST['verzend'])) {
    $weeknummer = $_POST['weeknummer'];
    $aantaldagen = $_POST['aantaldagen'];
    $oefening = $_POST['oefening'];
    $aantaluur = $_POST['aantaluur'];
    $kilo = $_POST['kilo'];
    $datumgym = $_POST['datumgym'];

    $conn = new mysqli('localhost', 'root', '', 'gym');
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed : " . $conn->connect_error);
    } else {
        // Hier word de data die is ingevuld naar de database toegestuurd
        $stmt = $conn->prepare("insert into formulier(weeknummer, aantaldagen, oefening, aantaluur, kilo, datumgym) values(?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isssss", $weeknummer, $aantaldagen, $oefening, $aantaluur, $kilo, $datumgym);
        $execval = $stmt->execute();
        echo $execval;
        echo "Registration successfully...";
        $stmt->close();
        $conn->close();
    }
}

// Database verbinden er een foutmelding maken als er iets fout gaat

?>