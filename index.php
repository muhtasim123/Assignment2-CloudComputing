
<?php
	$myPDO = new PDO('pgsql:host=ec2-35-172-85-250.compute-1.amazonaws.com', 'dbname=d7h71ne38f3nm8', 'rvauqwbiucrruu', '5fa2b549d88496011b16dfd7e548f3b4ec17f9452123f32c1c34d60a80f37946');

	$thisusername = trim($_POST["uname"]);
	$thispassword = trim($_POST["psw"]);

	$result = $myPDO->query("SELECT * FROM assignment WHERE username = '$thisusername' AND password = '$thispassword';";

	if($_SERVER["REQUEST METHOD"] == "POST"){
		if(pg_num_rows($result) == 1) {
			header("location: upload.php");
		} else {
			$error = "Your login username or password is invalid";
		}
	}
?>
<html>
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

