<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <!-- Connectie met styles.ccs -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="banner">
    <div class="navhome">
        <img src="logogym.png" class="logo">
        <ul>
            <!-- Navigatie -->
            <li><a href="home.php">Home</a></li>
            <li><a href="progressie.php">Gym Progressie</a></li>
            <li><a href="planning.php">Gym Planning</a></li>
            <li><a href="formulier.php">Gym Formulier</a></li>
        </ul>
    </div>
    <div class="content">
        <h1>GYM SITE</h1>
        <p> Vind hier al je gym progressie's en planningen van de aankomende weken!</p>
        <div>
            <!-- Buttons waar je op kan klikken om naar een andere pagina te gaan / Zit een stukje javascript in-->
            <button onclick="location.href='progressie.php'" type="button" ><span></span>GYM PROGRESSIE</button>
            <button onclick="location.href='planning.php'" type="button"><span></span>GYM PLANNING</button>
            <button onclick="location.href='formulier.php'" type="button"><span></span>GYM FORMULIER</button>
        </div>
    </div>
</div>
</body>
</html>
<?php
