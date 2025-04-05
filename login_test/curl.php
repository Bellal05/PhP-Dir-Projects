<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://official-joke-api.appspot.com/random_joke',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);
// formataazione json 
curl_close($curl);
$json = json_decode($response , true);

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Esame PHP</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: url('img.jpg') no-repeat center center;
            background-size: cover;
            font-family: Arial, sans-serif;
        }
        h1 {
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
            margin-bottom: 20px;
        }
        .buttons {
            display: flex;
            gap: 15px;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #ddd;
        }
        .button-primary {
            background-color: #007BFF;
            color: white;
        }
        .button-secondary {
            background-color: #6C757D;
            color: white;
        }
        .container {
            margin-top: 20px;
            padding: 15px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            font-size: 18px;
            color: #333;
        }
    </style>
</head>
<body>
    <h1>Random Joke</h1>
    <div class="container">
        <p>Type: <?php echo htmlspecialchars(($json)["EUR"]) ; ?> </p>
        <p>Setup: <?php echo htmlspecialchars(($json)["setup"]) ; ?>  </p>
        <p>Punchline: <?php echo htmlspecialchars(($json)["punchline"]) ; ?>  </p>
    </div>
    <br>
    <div class="buttons">
    <a href="index2.php"> <button class="button-primary">Home </button></a>

    </div>
</body>
</html>
<body>
    
</body>
</html>
