<table>
<tr>
<td>ID</td><td>TARGET</td><td>GUESS</td><td>WIN/LOSE</td>
</tr>
<?php
//user stats
$userStats = "SELECT * FROM games WHERE PLAYER = '$userid' ORDERBY GAMEID DESC LIMIT 20";
$doUserStats = mysqli_query($conn, $userStats);
while($dumpStats=mysqli_fetch_assoc($doUserStats))
{
echo "<tr>";
echo "<td>".$dumpStats['GAMEID']."</td>";
echo "<td>".$dumpStats['TARGET']."</td>";
$dumpGuess = $dumpStats['GUESS'];
switch($dumpGuess){
  case 1:
  $guessOut = "Greater Than 50";
  break;
  case 2:
  $guessOut = "Less Than 50";
  break;
  case 3:
  $guessOut = "Exactly 50";
  break;
}
echo "<td>".$guessOut."</td>";
$dumpWin = $dumpStats['WINLOSE'];
switch($dumpWin){
  case 0:
  $winLoseOut = "Win";
  break;
  case 1:
  $winLoseOut = "Lose";
  break;
}
echo "<td>".$winLoseOut."</td>";
echo "</tr>";
}
?>
</table>