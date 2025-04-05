<?php

$curl = curl_init();

$barcode = $_POST["barcode"];

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://world.openfoodfacts.org/api/v0/product/$barcode.json",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);
$json = json_decode($response , true);


?>