<?php
# Include the Autoloader (see "Libraries" for install instructions)
require 'vendor/autoload.php';
use Mailgun\Mailgun;

# Instantiate the client.
$mgClient = new Mailgun('f79742876db5ccec7e92cc82e972b899-602cc1bf-2137cbc5');
$domain = "YOUR_DOMAIN_NAME";
$params = array(
    'from'     => 'Excited User <mailgun@sandboxdc497144cd8d4e84a034120b2bd57c9c.mailgun.org>',
    'to'       => 'dd4dd5.yv@gmil.com',
    'subject'  => 'Hello',
    'template' => 'template.albert',
    'v:link'  => 'https://valentyn.tk',
);
# Make the call to the client.
$result = $mgClient->messages()->send($domain, $params);


?>
