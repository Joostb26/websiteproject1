<?php
// Verbinden met de database
$conf["Username"] = 'root';
$conf["Password"] = '';
$conf["Host"] = 'localhost';
$conf["Database"] = 'gym';

$con = mysqli_connect($conf["Host"], $conf["Username"], $conf["Password"], $conf["Database"]);

// Verbindingen met de tabellen in de database en informatie eruit halen met query's
$query = "SELECT weeknummer, kilo FROM formulier";
$query2 = "SELECT oefening, aantaluur FROM formulier";
$result2 = mysqli_query($con, $query2);
$result = mysqli_query($con, $query);
$chart_data = '';

// Results voor de eerste lijngrafiek - Aantal kilo's per weerk
while ($row = mysqli_fetch_array($result)) {
    $weeknummer[] = $row['weeknummer'];
    $kilo[] = $row['kilo'];
}

// Results voor de tweede lijngrafiek - Aantal uur per oefening
while ($row2 = mysqli_fetch_array($result2)) {
    $oefening[] = $row2['oefening'];
    $aantaluur[] = $row2['aantaluur'];
}

$chart_data = substr($chart_data, 0, -2);

?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Progressie</title>
        <!-- Connectie met styles.ccs -->
        <link rel="stylesheet" href="styles.css">
        <!-- Chart.js toevoegen -->
        <script src="//code.jquery.com/jquery-1.9.1.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
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
        <div class="progc">
            <!-- Gym Progressie hoofdtekst -->
            <h2 style="color: white">GYM PROGRESSIE</h2>
        </div>
        <div style="width:30%;height:20%;text-align:center; position: absolute; left: 15%; bottom: 35%">
            <!-- Het toevoegen van de lijngrafiek -->
            <h2 class="page-header" style="color: white">Analytics Gym </h2>
            <div style="color: white">Progressie Kilo's</div>
            <canvas id="aantalkiloanalytics"></canvas>
        </div>
        <div style="width:30%;height:20%;text-align:center; position: absolute; left: 55%; bottom: 35%">
            <h2 class="page-header" style="color: white">Analytics Gym </h2>
            <div style="color: white">Aantal uur</div>
            <canvas id="aantaluuranalytics"></canvas>
        </div>
    </div>
    </div>
    </body>
    </html>
    <!-- Javascript van de eerste lijngrafiek - Kilo per week -->
    <script type="text/javascript">
        var ctx = document.getElementById("aantalkiloanalytics").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels:<?php echo json_encode($weeknummer); ?>,
                datasets: [{
                    label: [
                        'Aantal Kilo Per Week'
                    ],
                    borderColor: [
                        "#FF8300"
                    ],
                    data:<?php echo json_encode($kilo); ?>,
                }]
            },
            options: {
                legend: {
                    display: true,
                    position: 'bottom',

                    labels: {
                        fontColor: '#ffffff',
                        fontFamily: 'sans-serif',
                        fontSize: 14,
                    }
                },


            }
        });
    </script>
    <script type="text/javascript">
        <!-- Javascript van de tweede lijngrafiek - Aantal uur per oefening -->
        var ctx = document.getElementById("aantaluuranalytics").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels:<?php echo json_encode($oefening); ?>,
                datasets: [{
                    label: [
                        'Aantal Uur Per Week'
                    ],
                    borderColor: [
                        "#FFE300"
                    ],
                    data:<?php echo json_encode($aantaluur); ?>,
                }]
            },
            options: {
                legend: {
                    display: true,
                    position: 'bottom',

                    labels: {
                        fontColor: '#ffffff',
                        fontFamily: 'sans-serif',
                        fontSize: 14,
                    }
                },


            }
        });
    </script>
<?php
