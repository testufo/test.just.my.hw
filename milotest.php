<?php
$client = new http\Client;
$request = new http\Client\Request;
$request->setRequestUrl('https://be.trustifi.com/api/i/v1/email');
$request->setRequestMethod('POST');
$body = new http\Message\Body;
$body->append('{
  "recipients": [{"email": "dd4dd5.yv@gmail.com"}],
  "lists": [],
  "contacts": [],
  "attachments": [],
  "title": "Title",
  "html": "Body",
  "methods": { 
    "postmark": false,
    "secureSend": false,
    "encryptContent": false,
    "secureReply": false 
  }
}');
$request->setBody($body);
$request->setOptions(array());
$request->setHeaders(array(
  'x-trustifi-key' => 'fff5ae3b541a6bc10ded62ea0a184310c663f2c29ec0be49',
  'x-trustifi-secret' => '790388bd035f9ab10ad86700055b4743',
  'Content-Type' => 'application/json'
));
$client->enqueue($request)->send();
$response = $client->getResponse();
echo $response->getBody();

?>
