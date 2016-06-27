if ($rowLogin == 1) {
$getuid = mysqli_fetch_assoc($loginCheck);
$userid = $getuid["USERID"];
session_start();
$_SESSION['nuid'] = $userid;
header('Location: https://yoursite.com/game.php');
} 