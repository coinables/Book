<?php

//db connection
$conn = mysqli_connect("localhost", "root", "password", "database_name");
	if (mysqli_connect_errno()){
	echo "Connection to DB failed" . mysqli_connect_error();
	}

require("easybitcoin.php");	
	
//bitcoin node connection
$bitcoin = new Bitcoin("someusername", "somepassword");


if(isset($_POST['submit']))
{

$username = $_POST['username'];
$password = $_POST['pw'];
$password2 = $_POST['pw2'];
		
		
if(trim($_POST['username'])==''){
 $message = "You must enter a name";
} 
else if(trim($_POST['pw']) ==''){
$message = "You must enter a password";
}
else if ($password != $password2){
$message = "Passwords Do Not Match";
} else 
	{

		mysqli_set_charset($conn,"utf8");
		$username = mysqli_real_escape_string($conn, $username);
		$password = mysqli_real_escape_string($conn, $password);
		$password2 = mysqli_real_escape_string($conn, $password2);
		$salt = "abc123";
		$enc_pass = hash_hmac("sha384", $salt, $password);
		
		//check for duplicate username
		$dupName = mysqli_query($conn, "SELECT * FROM users WHERE USERNAME = '$username'");
		$rowName = mysqli_num_rows($dupName);
		if ($rowName != 0) {
		$message = "Username is already in use, pick another";
		} else
		{
		
			$userid = uniqid();
			$addy = $bitcoin->getnewaddress();
			$newuser = "INSERT INTO users 
			(`USERID`, `USERNAME`, `PASSWORD`, `DEPOSIT_ADDRESS`, `BALANCE`) 
			VALUES ('$userid', '$username', '$enc_pass', '$addy', 0)";
			$newuserQuery = mysqli_query($conn, $newuser) or die(mysqli_error($conn));
			session_start();
			$_SESSION['nuid'] = $userid;
			header('Location: game.php');
		
		}

	}		
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Registration Page</title>
</head>
<body>
<h2>Register</h2>
<?php if(isset($message)){
echo $message."<br>";
}
?>
<form method="post">
Username:<br> <input type="text" id="username" name="username" maxlength="20"><br>
Password:<br> <input type="password" id="pw" name="pw"><br>
Retype Password:<br> <input type="password" id="pw2" name="pw2"><br>
<input type="submit" name="submit" value="REGISTER" />
</form>
</body>
</html>