$userData = "SELECT * FROM users WHERE USERID = '$userid'";
$doUserData = mysqli_query($conn, $userData);
$fetchUserData = mysqli_fetch_assoc($doUserData);
$balance = $fetchUserData["BALANCE"];