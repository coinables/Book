$updateBalance = "UPDATE users SET BALANCE = BALANCE + 9900 WHERE USERID = '$userid'";
$doUpdateBalance = mysqli_query($conn, $updateBalance);