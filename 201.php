session_start();
$_SESSION['nuid'] = $userid;
header('Location: https://yoursite.com/game.php');