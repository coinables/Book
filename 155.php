$secret = "your_secret";
   if($_GET['secret'] != $secret)
   {
     die('Stop doing that');
   }
   else
   {
   
$order_num = $_GET['invoice'];
$amount = $_GET['value']; 
$amountCalc = $amount / 100000000; //optional 

$queryUpdate = "UPDATE orders SET paid = 1, recd = $amount WHERE orderid = '$order_num'";

$doUpdate = mysqli_query($conn, $queryUpdate) or die(mysqli_error($conn));
   if($doUpdate)
	  {
      echo "*ok*"; 
	  }
   }