$updateBalance = "UPDATE users SET BALANCE = 0 WHERE USERID = '$userid'";
$doUpdateBalance = mysqli_query($conn, $updateBalance);