$confirmations = $getTrans["confirmations"];
if($confirmations < 1){
die();
} else {
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