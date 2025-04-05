<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.sunrise-sunset.org/json?lat=36.7201600&lng=-4.4203400',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);
$json = json_decode($response , true);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Alba e tramonto</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: black;
            color: #333;
        }
        .card, .table {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin: 10px;
            padding: 20px;
            width: 300px;
            text-align: center;
        }
        .table {
            width: auto;
            display: table;
        }
        .row {
            display: table-row;
        }
        .cell {
            display: table-cell;
            padding: 10px;
            border: 1px solid #ddd;
        }
        .symbol {
            font-size: 24px;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>Alba e tramonto</h2>
        <div id="usd" class="currency">
            <div> &#127748 Alba: <?php echo htmlspecialchars(($json)["results"]["sunrise"]); ?></div>
            <div> &#127749 Tramonto: <?php echo htmlspecialchars(($json)["results"]["sunset"]); ?></div>
            <div> &#127774 Mezzogiorno: <?php echo htmlspecialchars(($json)["results"]["solar_noon"]); ?></div>
        </div>
        <br>
        <a href="index.php"><button type="button" class="btn btn-dark">Home</button></a>
    </div>
</body>
</html>