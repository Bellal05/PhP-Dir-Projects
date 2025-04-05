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
    </style>
</head>
<body>
    <h1>Benvenuto nella mia pagina</h1>
    <div class="buttons">
        <a href="curl.php"><button class="button-primary">Chiamata APi:RandomJoke </button></a>
        <button class="button-secondary">Bottone 2</button>
    </div>
</body>
</html>
<body>
    
</body>
</html>