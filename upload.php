<?php
    require('vendor/autoload.php');
    // this will simply read AWS_ACCESS_KEY_ID and AWS_SECRET_ACCESS_KEY from env vars
    $s3 = Aws\S3\S3Client::factory();
    $bucket = getenv('S3_BUCKET')?: die('No "S3_BUCKET" config var in found in env!');
?>
<html>
<head><meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Upload Page</title>
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
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['userfile']) && $_FILES['userfile']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['userfile']['tmp_name'])) {
        try {
            $upload = $s3->upload($bucket, $_FILES['userfile']['name'], fopen($_FILES['userfile']['tmp_name'], 'rb'), 'public-read');
            ?>
            <p>Upload <a href="<?=htmlspecialchars($upload->get('ObjectURL'))?>">successful</a> :)</p>
        <?php } catch(Exception $e) { ?>
            <p>Upload error :(</p>
        <?php } } ?>
<h2>Upload a File</h2>
<form enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="POST">
    <input name="userfile" type="file"><input type="submit" value="Upload">
</form>
</div>
</body>
</html>
