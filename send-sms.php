<?php
require_once 'vendor/autoload.php';

$to = $_POST['to'];
$message = $_POST['message'];

const VONAGE_API_KEY = 'YOUR_API_KEY';
const VONAGE_API_SECRET = 'YOUR_API_SECRET';

$basic  = new \Vonage\Client\Credentials\Basic(VONAGE_API_KEY, VONAGE_API_SECRET);
$client = new \Vonage\Client($basic);

try {
    $response = $client->sms()->send(
        new \Vonage\SMS\Message\SMS($to, 'HEDWIG', $message)
    );

    $messages = $response->current();

    if ($messages->getStatus() == 0) {
        echo "The message was sent successfully\n";
    } else {
        echo "The message failed with status: " . $messages->getStatus() . "\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
