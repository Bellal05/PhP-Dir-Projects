<?php
include("conn.php");


$id = $_POST['id'] ?? '';
$scheda = $_POST['scheda'] ?? '';


try {
    $stmt = $conn->prepare("UPDATE  utenti_p3 SET scheda = ?  WHERE id = ?");
    $stmt->bind_param("ss", $scheda, $id);
    $stmt->execute();
    
    echo "<script>window.close();</script>";
    
    exit;
} catch (PDOException $e) {
    echo "Errore : " . $e->getMessage();
}
