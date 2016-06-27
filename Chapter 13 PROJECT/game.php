<?php
//db connection
$conn = mysqli_connect("localhost", "root", "password", "database_name");
	if (mysqli_connect_errno()){
	echo "Connection to DB failed" . mysqli_connect_error();
	}

require("easybitcoin.php");	
	
//bitcoin node connection
$bitcoin = new Bitcoin("someusername", "somepassword");

session_start();
	
//logout	
if(isset($_POST['logout'])){
	session_destroy();
	header('Location: login.php');
	}
	
//withdrawal	
if(isset($_POST['withdrawal'])){
	header('Location: withdrawal.php');
	}	


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
	//successful login
	//get balance and deposit address
	$userData = "SELECT * FROM users WHERE USERID = '$userid'";
	$doUserData = mysqli_query($conn, $userData);
	$fetchUserData = mysqli_fetch_assoc($doUserData);
	$balance = $fetchUserData["BALANCE"];
	$deposit_address = $fetchUserData["DEPOSIT_ADDRESS"];
	$username = $fetchUserData["USERNAME"];
	
	//computer picks a random number
	$winningNumber = mt_rand(1,100);
	
	if(isset($_POST['greater']))
	{
	  //check if they have enough to play
	  if($balance < 100){
      $message = "You need at least 100 satoshi to play";
	  } else {
		$guess = 1;
		if($winningNumber > 50)
		{
		//user wins
		$message = "You Win! +99 Satoshis";
		$message .= "<br> The computer picked ".$winningNumber;
		$winlose = 1;
		$insertGame = "INSERT INTO games (PLAYER, TARGET, GUESS, WINLOSE) VALUES ('$userid', '$winningNumber', '$guess', '$winlose')";
		$doInsertGame = mysqli_query($conn, $insertGame) or die(mysqli_error($conn));
		$updateBalance = "UPDATE users SET BALANCE = BALANCE + 99 WHERE USERID = '$userid'";
		$doUpdateBalance = mysqli_query($conn, $updateBalance);
		//get balance 
		$userData = "SELECT * FROM users WHERE USERID = '$userid'";
		$doUserData = mysqli_query($conn, $userData);
		$fetchUserData = mysqli_fetch_assoc($doUserData);
		$balance = $fetchUserData["BALANCE"];
		} else
		{
		//user loses
		$message = "You Lose! -100 Satoshis";
		$message .= "<br> The computer picked ".$winningNumber;
		$winlose = 0;
		$insertGame = "INSERT INTO games (PLAYER, TARGET, GUESS, WINLOSE) VALUES ('$userid', '$winningNumber', '$guess', '$winlose')";
		$doInsertGame = mysqli_query($conn, $insertGame) or die(mysqli_error($conn));
		$updateBalance = "UPDATE users SET BALANCE = BALANCE - 100 WHERE USERID = '$userid'";
		$doUpdateBalance = mysqli_query($conn, $updateBalance);
		//get balance 
		$userData = "SELECT * FROM users WHERE USERID = '$userid'";
		$doUserData = mysqli_query($conn, $userData);
		$fetchUserData = mysqli_fetch_assoc($doUserData);
		$balance = $fetchUserData["BALANCE"];
		}
	  }
	}
	
	if(isset($_POST['less']))
	{
	  //check if they have enough to play
	  if($balance < 100){
      $message = "You need at least 100 satoshi to play";
	  } else {
		$guess = 2;
		if($winningNumber < 50)
		{
		//user wins
		$message = "You Win! +99 Satoshis";
		$message .= "<br> The computer picked ".$winningNumber;
		$winlose = 1;
		$insertGame = "INSERT INTO games (PLAYER, TARGET, GUESS, WINLOSE) VALUES ('$userid', '$winningNumber', '$guess', '$winlose')";
		$doInsertGame = mysqli_query($conn, $insertGame) or die(mysqli_error($conn));
		$updateBalance = "UPDATE users SET BALANCE = BALANCE + 99 WHERE USERID = '$userid'";
		$doUpdateBalance = mysqli_query($conn, $updateBalance);
		//get balance 
		$userData = "SELECT * FROM users WHERE USERID = '$userid'";
		$doUserData = mysqli_query($conn, $userData);
		$fetchUserData = mysqli_fetch_assoc($doUserData);
		$balance = $fetchUserData["BALANCE"];
		} else
		{
		//user loses
		$message = "You Lose! -100 Satoshis";
		$message .= "<br> The computer picked ".$winningNumber;
		$winlose = 0;
		$insertGame = "INSERT INTO games (PLAYER, TARGET, GUESS, WINLOSE) VALUES ('$userid', '$winningNumber', '$guess', '$winlose')";
		$doInsertGame = mysqli_query($conn, $insertGame) or die(mysqli_error($conn));
		$updateBalance = "UPDATE users SET BALANCE = BALANCE - 100 WHERE USERID = '$userid'";
		$doUpdateBalance = mysqli_query($conn, $updateBalance);
		//get balance 
		$userData = "SELECT * FROM users WHERE USERID = '$userid'";
		$doUserData = mysqli_query($conn, $userData);
		$fetchUserData = mysqli_fetch_assoc($doUserData);
		$balance = $fetchUserData["BALANCE"];
		}
	  }
	}
	
	if(isset($_POST['exact']))
	{
	  //check if they have enough to play
	  if($balance < 100){
      $message = "You need at least 100 satoshi to play";
	  } else {
		$guess = 3;
		if($winningNumber == 50)
		{
		//user wins
		$message = "You Win! +9900 Satoshis";
		$message .= "<br> The computer picked ".$winningNumber;
		$winlose = 1;
		$insertGame = "INSERT INTO games (PLAYER, TARGET, GUESS, WINLOSE) VALUES ('$userid', '$winningNumber', '$guess', '$winlose')";
		$doInsertGame = mysqli_query($conn, $insertGame) or die(mysqli_error($conn));
		$updateBalance = "UPDATE users SET BALANCE = BALANCE + 9900 WHERE USERID = '$userid'";
		$doUpdateBalance = mysqli_query($conn, $updateBalance);
		//get balance 
		$userData = "SELECT * FROM users WHERE USERID = '$userid'";
		$doUserData = mysqli_query($conn, $userData);
		$fetchUserData = mysqli_fetch_assoc($doUserData);
		$balance = $fetchUserData["BALANCE"];
		} else
		{
		//user loses
		$message = "You Lose! -100 Satoshis";
		$message .= "<br> The computer picked ".$winningNumber;
		$winlose = 0;
		$insertGame = "INSERT INTO games (PLAYER, TARGET, GUESS, WINLOSE) VALUES ('$userid', '$winningNumber', '$guess', '$winlose')";
		$doInsertGame = mysqli_query($conn, $insertGame) or die(mysqli_error($conn));
		$updateBalance = "UPDATE users SET BALANCE = BALANCE - 100 WHERE USERID = '$userid'";
		$doUpdateBalance = mysqli_query($conn, $updateBalance);
		//get balance 
		$userData = "SELECT * FROM users WHERE USERID = '$userid'";
		$doUserData = mysqli_query($conn, $userData);
		$fetchUserData = mysqli_fetch_assoc($doUserData);
		$balance = $fetchUserData["BALANCE"];
		}
	  }
	}
		
}


?>
<!DOCTYPE html>
<html>
<head>
<title>Game Page</title>
</head>
<body>
<h2>Game</h2>
<h4>Welcome, <?php echo $username; ?></h4><br>
<form method="post">
<input type="submit" name="logout" value="Logout">
<input type="submit" name="withdrawal" value="Cash Out">
</form><br>
Your Balance: <?php echo $balance; ?><br>
Deposit Address: <?php echo $deposit_address; ?><br>
<img src="http://chart.googleapis.com/chart?chs=125x125&cht=qr&chl=<?php echo $deposit_address; ?>">
<hr>
RULES: The object of the game is to correctly guess if the computer will pick a number greater than or less than 50. 
Every guess will cost you 100 satoshis. If you guess correctly you will win 198 satoshis in return, if you guess 
wrong you receive nothing. BONUS, if you guess correctly with the EXACTLY 50 option you will win 9,900 satoshis. <br>
<h4>Make your guess!</h4>
<form method="post">
<input type="submit" name="greater" value="OVER 50"><br>
<input type="submit" name="less" value="UNDER 50"><br>
<input type="submit" name="exact" value="EXACTLY 50"><br>
</form><br>
<?php if(isset($message)){
echo $message."<br>";
}
?>

<br>
Stats:
<table>
<tr>
<td>ID</td><td>TARGET</td><td>GUESS</td><td>WIN/LOSE</td>
</tr>
<?php
//user stats
	$userStats = "SELECT * FROM games WHERE PLAYER = '$userid' ORDER BY GAMEID DESC LIMIT 20";
	$doUserStats = mysqli_query($conn, $userStats) or die(mysqli_error($conn));
	while($dumpStats = mysqli_fetch_assoc($doUserStats))
	{
	echo "<tr>";
	echo "<td>".$dumpStats['GAMEID']."</td>";
	echo "<td>".$dumpStats['TARGET']."</td>";
	$dumpGuess = $dumpStats['GUESS'];
	switch($dumpGuess){
	  case 1:
	  $guessOut = "Greater Than 50";
	  break;
	  case 2:
	  $guessOut = "Less Than 50";
	  break;
	  case 3:
	  $guessOut = "Exactly 50";
	  break;
	}
	echo "<td>".$guessOut."</td>";
	$dumpWin = $dumpStats['WINLOSE'];
	switch($dumpWin){
	  case 0:
	  $winLoseOut = "Lose";
	  break;
	  case 1:
	  $winLoseOut = "Win";
	  break;
	}
	echo "<td>".$winLoseOut."</td>";
	echo "</tr>";
	}
?>
</table>
</body>
</html>