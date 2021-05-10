<?php
require 'vendor/autoload.php';
use Mailgun\Mailgun;

// First, instantiate the SDK with your API credentials
$mg = Mailgun::create('4ff3e607f0b0f51202b766d287a900a3-602cc1bf-ece26f0a', 'https://api.mailgun.net/v3/sandbox252a4ec668564d6296482bda252a3024.mailgun.org'); // For EU servers

// Now, compose and send your message.
// $mg->messages()->send($domain, $params);
$mg->messages()->send('sandbox252a4ec668564d6296482bda252a3024.mailgun.org', [
  'from'    => 'bob@sandbox252a4ec668564d6296482bda252a3024.mailgun.org',
  'to'      => 'dd4dd5.yv@gmail.com',
  'subject' => 'The PHP SDK is awesome!',
  'text'    => 'It is so simple to send a message.'
]);
?>
