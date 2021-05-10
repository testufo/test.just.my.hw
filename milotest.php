<?php
# Include the Autoloader (see "Libraries" for install instructions)
require 'vendor/autoload.php';
use Mailgun\Mailgun;
# Instantiate the client.
$mgClient = new Mailgun('4ff3e607f0b0f51202b766d287a900a3-602cc1bf-ece26f0a');
$domain = "sandbox252a4ec668564d6296482bda252a3024.mailgun.org";
# Make the call to the client.
$result = $mgClient->sendMessage($domain, array(
	'from'	=> 'Excited User <mailgun@sandbox252a4ec668564d6296482bda252a3024.mailgun.org>',
	'to'	=> 'Baz <dd4dd5.yv@gmail.com>',
	'subject' => 'Hello',
	'text'	=> 'Testing some Mailgun awesomness!'
));
?>
