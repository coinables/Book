<?php
//db connection
$conn = mysqli_connect("localhost", "root", "password", "database_name");
	if (mysqli_connect_errno()){
	echo "Connection to DB failed" . mysqli_connect_error();
	}

	
//bitcoin node connection
require("easybitcoin.php");
$bitcoin = new Bitcoin("someusername", "somepassword");
session_start();

//confirm valid session and login
$userid = $_SESSION['nuid'];
$trueLogin = "SELECT * FROM users WHERE USERID = '$userid'";
$doTrueLogin = mysqli_query($conn, $trueLogin);
$rowsTrueLogin = mysqli_num_rows($doTrueLogin);
if($rowsTrueLogin != 1){
//not logged in
header("Location: login.php");
} else 
{
$userData = "SELECT * FROM users WHERE USERID = '$userid'";
$doUserData = mysqli_query($conn, $userData);
$fetchUserData = mysqli_fetch_assoc($doUserData);
$balance = $fetchUserData["BALANCE"];
$username = $fetchUserData["USERNAME"];

if(isset($_POST['withdrawal'])){

$addy = trim($_POST['address']);
//validate
$checkAddy = $bitcoin->validateaddress($addy);
$isValid = $checkAddy['isvalid'];
$isMine = $checkAddy['ismine']; 
	if($balance < 1000){
	$message = "You need at least 1000 to withdraw";
	} else {
		if(!$isValid){
		$message = "Address is invalid";
		} elseif(!$isMine){
		//process withdrawal
		$convertBalance = $balance / 100000000;
		$convertBalance = number_format($convertBalance, 8);
		$doWithdrawal = $bitcoin->sendtoaddress($addy, $convertBalance);
		$message = "Transaction: ".$doWithdrawal."<br>";
		//reset users balance to zero
		$updateBalance = "UPDATE users SET BALANCE = 0 WHERE USERID = '$userid'";
		$doUpdateBalance = mysqli_query($conn, $updateBalance);
		}else {
		$message = "You cannot withdraw to that address";
		}
	}
}

}

?>

<!DOCTYPE html>
<html>
<head>
<title>Withdrawal Page</title>
</head>
<body>
<h2>Withdrawal</h2>
<h4>Welcome, <?php echo $username; ?></h4><br>
Your Balance: <?php echo $balance; ?><br>
<form method="post">
Withdrawal to this Address: <input type="text" name="address" size="60"><br>
<input type="submit" name="withdrawal" value="Cash Out">
</form><br>
<?php if(isset($message)){
echo $message."<br>";
}
?>
Once you click Cash Out your full balance will be withdrawn to the address specified. 
<br>
</body>
</html>