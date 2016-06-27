<?php
$conn = mysqli_connect("localhost","user","pw","siteusers");

if(mysqli_connect_errno()){
die("Connection to DB failed" . mysqli_connect_error());
}
$select = "SELECT * FROM siteusers WHERE username = 'coinableS'";
$doSelect = mysqli_query($conn, $select) or die(mysqli_error($conn));
$fetchSelect = mysqli_fetch_assoc($doSelect);
$getAddy = $fetchSelect["address"];
echo $getAddy;
?>