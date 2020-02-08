<?php

	$thisusername = trim($_POST["uname"]);

	$thispassword = trim($_POST["psw"]);



	$conn_string = "host=ec2-35-172-85-250.compute-1.amazonaws.com port=5432 dbname=d7h71ne38f3nm8 user=rvauqwbiucrruu password=5fa2b549d88496011b16dfd7e548f3b4ec17f9452123f32c1c34d60a80f37946";

	$dbconn = pg_connect($conn_string);



	$result = pg_query($dbconn, “SELECT * FROM assignment WHERE username = '$thisusername' AND password = '$thispassword';");

	if($_SERVER["REQUEST METHOD"] == "POST"){

		if(pg_num_rows($result) == 1) {

			header("location: upload.php");

		} else {

			$error = "Your login username or password is invalid";

		}

	}

?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

</style>
</head>
<body>

<h2>Login Form</h2>

<form action=" " method="post">


  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required> 
    <button type="submit">Login</button>
  </div>

</form>

</body>
</html>
