<?php
//db connection
$conn = mysqli_connect("localhost", "root", "password", "database_name");
	if (mysqli_connect_errno()){
	echo "Connection to DB failed" . mysqli_connect_error();
	}

//bitcoin node connection
require("easybitcoin.php");
$bitcoin = new Bitcoin("someusername", "somepassword");

$tx = $_GET['tx'];
$getTrans = $bitcoin->gettransaction($tx);
$confirmations = $getTrans["confirmations"];
if($confirmations < 1){
die();
} else {
//loop through the outputs
	$countDetails = count($getTrans['details']);
	for($i=0;$i<$countDetails;$i++){
    $getAddress = $getTrans['details'][$i]['address'];
	$getReceive = $getTrans['details'][$i]['category'];
		if($getReceive == "receive"){
		$checkAddy = mysqli_query($conn, "SELECT * FROM users WHERE DEPOSIT_ADDRESS = '$getAddress'");
		$doCheckAddy = mysqli_num_rows($checkAddy);
			if($doCheckAddy == 1){
			$amount = $getTrans['details'][$i]['amount'];
			$amount = $amount * 100000000;
			$updateBalance = "UPDATE users SET BALANCE = BALANCE + '$amount' WHERE DEPOSIT_ADDRESS = '$getAddress'";
			$doUpdateBalance = mysqli_query($conn, $updateBalance);
			}
		}
	}
}

?>