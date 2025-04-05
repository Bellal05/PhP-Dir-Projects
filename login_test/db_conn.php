<?php

$host = "mysql.next-data.net";  
$dbname = "www_wpschool_it";       
$user = "www_13237";       
$pass = "uBaKfYFM";           
    
$conn = new mysqli($host, $user, $pass, $dbname);

 // Controllare la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
} 
//echo "Connessione riuscita!";

