<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    function handleSubdomainError($message) {
        echo json_encode(['success' => false, 'message' => $message]);
        exit();
    }

    if (!isset($_POST['subdomain'], $_POST['domain'], $_POST['type'], $_POST['ip_address'])) {
        handleSubdomainError('Invalid or missing parameters');
    }

    $apiKey = 'YOUR_APIKEY'; // Apikey
    $apiEmail = 'YOUR_EMAIL'; // Email Cloudflare

    $listDomain = [
        'yourdomain.com' => 'ZONE_ID', // Zone ID
        'yourdomain.org' => 'ZONE_ID', // Zone ID
    ];

    $subdomain = $_POST['subdomain'];
    $domain = $_POST['domain'];
    $type = $_POST['type'];
    $ipAddress = $_POST['ip_address'];
    $proxyStatus = false; 
    $zoneID = $listDomain[$domain]; 

    $apiEndpoint = "https://api.cloudflare.com/client/v4/zones/{$zoneID}/dns_records";

    $data = [
        'type' => $type,
        'name' => "{$subdomain}.{$domain}",
        'content' => $ipAddress,
        'ttl' => 1,
        'proxied' => $proxyStatus,
    ];

    $headers = [
        'X-Auth-Email: ' . $apiEmail,
        'X-Auth-Key: ' . $apiKey,
        'Content-Type: application/json',
    ];

    $ch = curl_init($apiEndpoint);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);

    if ($httpCode === 200) {
        echo json_encode(['success' => true]);
    } else {
        handleSubdomainError('Error creating subdomain. Please try again. Response: ' . $response);
    }
}
?>
