<?php

$weeknummer = $_POST['weeknummer'];
$aantaldagen = $_POST['aantaldagen'];
$oefening = $_POST['oefening'];
$aantaluur = $_POST['aantaluur'];
$kilo = $_POST['kilo'];
$datumgym = $_POST['datumgym'];

// Database verbinden er een foutmelding maken als er iets fout gaat
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
?>