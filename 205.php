$userid = $_SESSION['nuid'];
$trueLogin = "SELECT * FROM users WHERE USERID = '$userid'";
$doTrueLogin = mysqli_query($conn, $trueLogin);
$rowsTrueLogin = mysqli_num_rows($doTrueLogin);
if($rowsTrueLogin != 1){
header("Location: login.php");
}