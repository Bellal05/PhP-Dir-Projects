<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web App PhP</title>
    <style>
        body {
            background-color: black;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-image: url('path/to/your/image.jpg');
            background-size: cover;
            background-position: center;
            color: rgb(255, 255, 255);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .buttons {
            display: flex;
            gap: 10px;
        }
        button {
            padding: 10px 20px;
            background-color: rgba(0, 0, 0, 0.5);
            border: none;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Scegli un endpoint !</h1>
    
    <div class="buttons">
        <a href="curl.php"><button type="button" class="btn btn-outline-light">Prezzo BTC</button></a>
        <a href="curl2.php"><button type="button" class="btn btn-outline-info">Quotes</button></a>
        <a href="curl3.php"><button type="button" class="btn btn-outline-light">Alba e tramonto</button></a>
        
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>