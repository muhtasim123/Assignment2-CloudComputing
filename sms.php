<?php
    require('vendor/autoload.php');
    use Twilio\Rest\Client;

    $account_sid = 'ACe85c1dd76c9672584aeec7383ce0110b';
    $auth_token = 'de29289e46987c3778fed60d49706fe4';
    $twilio_number = "+17209244323";

    $client = new Client($account_sid, $auth_token);
    $client->messages->create(
    // Where to send a text message (your cell phone?)
        '+14167317954',
        array(
            'from' => $twilio_number,
            'body' => 'Testing message'
        )
    );

