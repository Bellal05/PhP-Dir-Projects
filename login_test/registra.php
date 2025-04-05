<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = $_POST['email'];
    $password = $_POST['password'];
    $stmt = $conn->prepare("INSERT INTO test (email, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $mail, $password);
    $stmt->execute();
    echo "Registrazione riuscita!";
    sleep(3);
// Redirect to another page
header("Location: index.php");
    exit;
    } 
?>