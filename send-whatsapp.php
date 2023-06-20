<?php
require_once 'vendor/autoload.php';

use Twilio\Rest\Client;

// Your Twilio Account SID and Auth Token from twilio.com/console
$account_sid = 'AC8864ed5392a5fca91555e26cc74ca72f';
$auth_token = '0a68f333fba858e550288c6a580c3e05';

// Initialize the Twilio client
$client = new Client($account_sid, $auth_token);

// Get the form data
$name = $_POST['name'];
$message = $_POST['message'];
$phone = $_POST['phone'];

// Send the WhatsApp message
$message = $client->messages->create(
    "whatsapp:$phone", // Destination phone number in WhatsApp format
    array(
        'from' => 'whatsapp:+15076785073', // Your Twilio phone number in WhatsApp format
        'body' => "From: $name\n\n$message" // The message body with the sender's name
    )
);

echo "Message sent!";
?>
