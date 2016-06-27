<h4>Welcome, <?php echo $username; ?></h4><br>
Your Balance: <?php echo $balance; ?><br>
Deposit Address: <?php echo $deposit_address; ?><br>
<img src="http://chart.googleapis.com/chart?chs=125x125&cht=qr&chl=<?php echo $deposit_address; ?> ">