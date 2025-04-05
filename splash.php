<?php

require 'conn.php';

session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = $_POST['email'];
    $password = $_POST['password'];
    $stmt = $conn->prepare("SELECT * FROM utenti_p3 WHERE email = ?");
    $stmt ->bind_param("s" , $mail);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($password == $user["password"] && $mail == $user['email']) {
        $_SESSION['id'] = $user['id'];
        $_SESSION['nome'] = $user['nome'];
        $_SESSION['cognome'] = $user['cognome'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['isadmin'] = $user['isadmin'];
        $_SESSION['login_status'] = '';
        header("Location: index.php");
        exit;
    } else {
        header("Location: login.php");
        $_SESSION['login_status'] = 'Email o password errati!';
        exit();
    }
}
?>
