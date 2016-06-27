<?php
//db connection
$conn = mysqli_connect("localhost", "root", "password", "database_name");
	if (mysqli_connect_errno()){
	echo "Connection to DB failed" . mysqli_connect_error();
	}


if(isset($_POST['submit']))
{

	$username = $_POST['username'];
	$password = $_POST['pw'];
		
	mysqli_set_charset($conn,"utf8");
	$username = mysqli_real_escape_string($conn, $username);
	$password = mysqli_real_escape_string($conn, $password);
	$salt = "abc123";
	$enc_pass = hash_hmac("sha384", $salt, $password);

	$loginCheck = mysqli_query($conn, "SELECT * FROM users WHERE USERNAME = '$username' AND `PASSWORD` = '$enc_pass'");
	$rowLogin = mysqli_num_rows($loginCheck);
	
	if ($rowLogin == 1) 
	{
		$getuid = mysqli_fetch_assoc($loginCheck);
		$userid = $getuid["USERID"];
		session_start();
		$_SESSION['nuid'] = $userid;
		header('Location: game.php');
	} else {
	$message = "Wrong username or password";
	}
	
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
</head>
<body>
<h2>Login</h2>
<?php if(isset($message)){
echo $message."<br>";
}
?>
<form method="post">
Username:<br> <input type="text" id="username" name="username" maxlength="20"><br>
Password:<br> <input type="password" id="pw" name="pw"><br>
<input type="submit" name="submit" value="LOGIN" />
</form>
</body>
</html>