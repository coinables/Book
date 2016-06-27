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
}