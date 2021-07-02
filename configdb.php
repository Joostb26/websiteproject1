<?php

// Verbinding met de database
$conf["Username"]='root';
$conf["Password"]= '';
$conf["Host"]= 'localhost';
$conf["Database"]= 'gym';

$con = mysqli_connect($conf["Host"], $conf["Username"], $conf["Password"], $conf["Database"]);

// Foutmelding als het fout gaat
if($con == false) {
    echo "Kan geen verbinding maken met de database";
}
?>
