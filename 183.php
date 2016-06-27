<?php
$conn = mysqli_connect("localhost","user","pw","siteusers");

if(mysqli_connect_errno()){
die("Connection to DB failed" . mysqli_connect_error());
}
$newAddy = "1J9ikqFuwrzPbczsDkquA9uVYeq6dEehsj";
$updateAddy = "UPDATE siteusers SET address = '$newAddy' WHERE username='coinableS'";
$doUpdate = mysqli_query($conn, $updateAddy) or die(mysqli_error($conn));
echo "Table updated.";
?>