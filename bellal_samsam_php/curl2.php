<?php
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://ron-swanson-quotes.herokuapp.com/v2/quotes',
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
    <title>Quotes</title>
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
        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 30px;
            width: 350px;
            text-align: center;
            margin: 10px;
        }
        .centered-text {
            text-align: center;
        }
        p {
            font-size: 1.2em;
            color: #555;
        }
        .btn-dark {
            background-color: #333;
            border: none;
            transition: background-color 0.3s;
        }
        .btn-dark:hover {
            background-color: #444;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2 class="mb-3">Citazione del giorno</h2>
        <div class="centered-text">
            <p><?php echo htmlspecialchars(($response)); ?></p>
            <a href="index.php"><button type="button" class="btn btn-dark">Home</button></a>
            <a href="curl2.php"><button type="button" class="btn btn-dark">Genera un'altra quote</button></a>
        </div>
    </div>
</body>
</html>
