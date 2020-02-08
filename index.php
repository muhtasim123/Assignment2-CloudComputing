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

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>

<?php
	$myPDO = new PDO('pgsql:host=ec2-35-172-85-250.compute-1.amazonaws.com', 'dbname=d7h71ne38f3nm8', 'rvauqwbiucrruu', '5fa2b549d88496011b16dfd7e548f3b4ec17f9452123f32c1c34d60a80f37946');
	$result = $myPDO->query("SELECT 

	if($_SERVER["REQUEST METHOD"] == "POST"){
		$thisusername = trim($_POST["uname"]);
		$thispassword = trim($_POST["psw"]);

		if(pg_num_rows($result) == 1) {
			header("location: upload.php");
		} else {
			$error = "Your login username or password is invalid";
		}
	}
?>
<body>

<h2>Login Page</h2>

<form action=" " method="post">

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
    <button type="submit">Login</button>
  </div>
</form>

<div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

</body>
</html>

