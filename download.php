<?php
    require('vendor/autoload.php');
    // this will simply read AWS_ACCESS_KEY_ID and AWS_SECRET_ACCESS_KEY from env vars
    $s3 = Aws\S3\S3Client::factory();
    $bucket = getenv('S3_BUCKET')?: die('No "S3_BUCKET" config var in found in env!');
?>
<html>
<head><meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
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

    </style></head>
<body>
<div class="tab">
    <h1>Wilfred Capital</h1>
    <button class="tablinks" onclick="window.location.href = 'https://assignment2-muhtasim.herokuapp.com/upload.php';">Upload</button>
    <button class="tablinks" onclick="window.location.href = 'https://assignment2-muhtasim.herokuapp.com/download.php';">Download</button>
</div>
<div class="other">
<h2>Files Available for Download</h2>
<?php
    try {
        $objects = $s3->getIterator('ListObjects', array(
            "Bucket" => $bucket
        ));
        foreach ($objects as $object) {
            ?>
            <p> <a href="<?=htmlspecialchars($s3->getObjectUrl($bucket, $object['Key']))?>"> <?echo $object['Key'] . "<br>";?></a></p>

        <?		}?>

    <?php } catch(Exception $e) { ?>
        <p>error :(</p>
    <?php }  ?>
</div>
</body>
</html>
