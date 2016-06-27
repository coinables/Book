$username = $_POST['username'];
$password = $_POST['pw'];
$password2 = $_POST['pw2'];
		

mysqli_set_charset($conn,"utf8");
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);
$password2 = mysqli_real_escape_string($conn, $password2);
$salt = "abc123";
$enc_pass = hash_hmac("sha384", $salt, $password);