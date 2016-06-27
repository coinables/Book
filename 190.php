<?php
session_start();
?>
<html>
Order Details:<br>
Item: <?php echo $_SESSION['product']; ?><br>
Cost: <?php echo $_SESSION['cost']; ?><br>
Name: <?php echo $_POST['name']; ?><br>
Address: <?php echo $_POST['street']; ?><br>
</html>