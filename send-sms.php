<?php
require_once 'vendor/autoload.php';

use Vonage\Client;
use Vonage\Client\Credentials\Basic;

$apiKey = 'YOUR_API_KEY';
$apiSecret = 'YOUR_API_SECRET';

$credentials = new Basic($apiKey, $apiSecret);
$client = new Client($credentials);

function sendSMS($to, $message) {
    try {
        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS($to, '', $message)
        );

        $messages = $response->getMessages();
        foreach ($messages as $msg) {
            if ($msg->getStatus() == 0) {
                echo "The message was sent successfully\n";
            } else {
                echo "The message failed with status: " . $msg->getStatus() . "\n";
            }
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }
}

$to = $_POST['to'];
$message = $_POST['message'];

sendSMS($to, $message);
?>
