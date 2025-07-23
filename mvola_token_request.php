<?php

$consumerKey = 'd0ZRF_O2BIrxJz2FF7kAAwe_GaIa';
$consumerSecret = 'WYzsm35NWRu8EPEUj4hHryRFeGEa';
$credentials = base64_encode("$consumerKey:$consumerSecret");

$url = 'https://sandbox.mvola.mg/token';

$headers = [
    "Authorization: Basic $credentials",
    "Content-Type: application/x-www-form-urlencoded"
];

$data = http_build_query([
    'grant_type' => 'client_credentials'
]);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Pour l’environnement sandbox uniquement

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Erreur CURL : ' . curl_error($ch);
} else {
    echo 'Réponse Mvola : ' . $response;
}

curl_close($ch);
?>
