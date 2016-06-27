$dupName = mysqli_query($conn, "SELECT * FROM users WHERE USERNAME = '$username'");
$rowName = mysqli_num_rows($dupName);