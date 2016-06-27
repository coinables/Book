$username = $_POST['username'];
$password = $_POST['pw'];
		
mysqli_set_charset($conn,"utf8");
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);
$salt = "abc123";
$enc_pass = hash_hmac("sha384", $salt, $password);

$loginCheck = mysqli_query($conn, "SELECT * FROM users WHERE USERNAME = '$username' AND `PASSWORD` = '$enc_pass'");
$rowLogin = mysqli_num_rows($loginCheck);