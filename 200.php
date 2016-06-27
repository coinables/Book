$userid = uniqid();
$bitcoin = new Bitcoin("username", "somepassword");
$addy = $bitcoin->getnewaddress();
$newuser = "INSERT INTO users 
(USERID, USERNAME, `PASSWORD`, DEPOSIT_ADDRESS, BALANCE)  
VALUES ('$userid', '$username', '$enc_pass', '$addy', 0)";
$newuserQuery = mysqli_query($conn, $newuser);