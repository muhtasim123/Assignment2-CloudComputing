<?php
    require('vendor/autoload.php');

    if (isset($_GET['query']) && $_GET['query'] != '') {
        $url = 'https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/Search/NewsSearchAPI';
        $query_fields = [
            'autoCorrect' => 'true',
            'pageNumber' => 1,
            'pageSize' => 10,
            'safeSearch' => 'false',
            'q' => $_GET['query']
        ];

        $curl = curl_init($url . '?' . http_build_query($query_fields));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
            'X-RapidAPI-Key: 5f62119cdamshda7acf3b93dac29p12af08jsn973582af7c05'
        ]);
        $response = json_decode(curl_exec($curl), true);
        curl_close($curl);

        $news = $response['value'];
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
    <h2>News Page</h2>
<form action="" method="get">
    <label for="query">Enter your query string:</label>
    <input id="query" type="text" name="query" />
    <br />
    <button type="submit" name="submit">Search</button>
</form>
<br />
<?php
    if (!empty($news)) {
        echo '<b>News by Your query:</b>';
        foreach ($news as $post) {
            echo '<h3>' . $post['title'] . '</h3>';
            echo '<a href="' . $post['url'] . '">Source</a>';
            echo '<p>Date Published: ' . $post['datePublished'] . '</p>';
            echo '<p>' . $post['body'] .'</p>';
            echo '<hr>';
        }
    }
?>
</div>
</body>
</html>
