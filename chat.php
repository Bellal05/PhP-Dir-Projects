


<?php

$telefono = $_POST['telefono'] ?? null;
$message = $_POST['message'] ?? null;

$chat = [
    "secret" => "9c156b6ba1350ef08c76e181c221b5a0fd731088", // your API secret from (Tools -> API Keys) page
    "account" => "17380543929bf31c7ff062936a96d3c8bd1f8f2ff367989af8dea96",
    "recipient" => "$telefono",
    "type" => "text",
    "message" => "$message"
];

$cURL = curl_init("https://app.wasend.it/api/send/whatsapp");
curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
curl_setopt($cURL, CURLOPT_POSTFIELDS, $chat);
$response = curl_exec($cURL);
curl_close($cURL);

$result = json_decode($response, true);

// do something with response
print_r($result);
if ($result['status'] === 'success') {
    header("Location: index.php");
} else {
    echo 'Errore nell\'invio del messaggio: ' . $result['message'];
}
?>