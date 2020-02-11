<?php
    require('vendor/autoload.php');
    use Twilio\Rest\Client;

    $account_sid = 'ACe85c1dd76c9672584aeec7383ce0110b';
    $auth_token = 'de29289e46987c3778fed60d49706fe4';
    $twilio_number = "+17209244323";

    if (isset($_GET['query']) && $_GET['query'] != '') {
        $url = 'https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/Search/NewsSearchAPI';
        $query_field = $_GET['query'];
        $client = new Client($account_sid, $auth_token);
        $client->messages->create(
            '+14167317954',
            array(
                'from' => $twilio_number,
                'body' => $query_field
            )
        );
    }
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>News</title>
    <style>
        * {box-sizing: border-box}
        body {font-family: "Lato", sans-serif;}

        /* Style the tab */
        .tab {
            float: left;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
            width: 18%;
            height: 100%;
        }

        /* Style the buttons inside the tab */
        .tab button {
            display: block;
            background-color: inherit;
            color: black;
            padding: 22px 16px;
            width: 100%;
            border: none;
            outline: none;
            text-align: left;
            cursor: pointer;
            transition: 0.3s;
            font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        .other {
            padding: 0px 0px 0px 315px;
        }

    </style>
</head>
<body>
<div class="tab">
    <h1>Assignment 2</h1>
    <button class="tablinks" onclick="window.location.href = 'https://assignment2-muhtasim.herokuapp.com/upload.php';">Upload</button>
    <button class="tablinks" onclick="window.location.href = 'https://assignment2-muhtasim.herokuapp.com/download.php';">Download</button>
    <button class="tablinks" onclick="window.location.href = 'https://assignment2-muhtasim.herokuapp.com/news.php';">News</button>
    <button class="tablinks" onclick="window.location.href = 'https://assignment2-muhtasim.herokuapp.com/sms.php';">SMS</button>
</div>
<div class="other">
    <h2>Send an SMS</h2>
    <form action="" method="get">
        <label for="query">Enter your message:</label>
        <input id="query" type="text" name="query" />
        <br />
        <button type="submit" name="submit">Send</button>
    </form>
    alert("Message sent!");
</div>
</body>
</html>

