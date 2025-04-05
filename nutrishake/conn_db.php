<?php
$host = "185.124.46.150";
$user = "www_13237";
$password = "uBaKfYFM";
$dbname = "www_wpschool_it";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>