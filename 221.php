if(isset($_POST['withdrawal'])){

$addy = trim($_POST['address']);
//validate
$checkAddy = $bitcoin->validateaddress($addy);
$isValid = $checkAddy['isvalid'];
  if($balance < 1000){
  $message = "You need at least 1000 to withdrawal";
  } else {
    if(!$isValid){
    $message = "Address is invalid";
    } else {
    //process withdrawal
    $convertBalance = $balance / 100000000;
    $convertBalance = number_format($convertBalance, 8);
    $doWithdrawal = $bitcoin->sendtoaddress($addy, $convertBalance);
    $message = "Transaction: ".$doWithdrawal."<br>";
    //reset users balance to zero
    $updateBalance = "UPDATE users SET BALANCE = 0 WHERE USERID = '$userid'";
    $doUpdateBalance = mysqli_query($conn, $updateBalance);
    }
  }
}