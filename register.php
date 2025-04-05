<?php
session_start();
require "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = trim($_POST['nome']);
    $cognome = trim($_POST['cognome']);
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $indirizzo = trim($_POST['indirizzo']);
    $password = $_POST['password'];
    $isadmin = "0";
    $sesso = $_POST['sesso'];
    $codice_tessera = strtoupper(uniqid("GYM3"));
    $altezza = $_POST['altezza'];
    $peso = $_POST['peso'];
    $scheda = "Da compilare";

    try {
        $sql = "INSERT INTO utenti_p3 (nome, cognome, email, telefono, password, codice_tessera, altezza, peso, sesso, indirizzo, scheda, isadmin) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            "ssssssssssss",
            $nome,
            $cognome,
            $email,
            $telefono,
            $password,
            $codice_tessera,
            $altezza,
            $peso,
            $sesso,
            $indirizzo,
            $scheda,
            $isadmin
        );
        $stmt->execute();
        header("Location: login.php");
        exit;
    } catch (mysqli_sql_exception $e) {
        echo "Errore MySQLi: " . $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GYM3 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image" style="align-self: center;">
                    <div >
                                <img src="registra.jpg" alt="" style="max-width:500px">
                    </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Crea un account!</h1>
                            </div>
                            <form class="user" method="POST" action="register.php">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="nome" class="form-control form-control-user"
                                            id="exampleFirstName" placeholder="Nome" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="cognome" class="form-control form-control-user"
                                            id="exampleLastName" placeholder="Cognome" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user"
                                        id="exampleInputEmail" placeholder="Email" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="telefono" class="form-control form-control-user"
                                            id="examplePhone" placeholder="Telefono" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="indirizzo" class="form-control form-control-user"
                                            id="exampleAdress" placeholder="Indirizzo" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-user"
                                        id="exampleInputPassword" placeholder="Password" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <select name="sesso" required class="form-control ">
                                            <option value="" disabled selected>Sesso</option>
                                            <option value="0">M</option>
                                            <option value="1">F</option>
                                            <option value="2">Others</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="number" name="peso" class="form-control "
                                            id="exampleAdress" placeholder="Peso" required>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="number" name="altezza" class="form-control "
                                            id="exampleAdress" placeholder="Altezza" required>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-user btn-block" type="submit">Register</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="login.php">Hai gia un account da noi? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>