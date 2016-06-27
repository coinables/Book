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