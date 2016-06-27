<?php
$conn = mysqli_connect("localhost","user","pw","siteusers");

if(mysqli_connect_errno()){
die("Connection to DB failed" . mysqli_connect_error());
}
?>