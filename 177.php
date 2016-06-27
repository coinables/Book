<?php
$conn = mysqli_connect("localhost","user","pw","siteusers");

if(mysqli_connect_errno()){
die("Connection to DB failed" . mysqli_connect_error());
}
$uid = uniqid();
$username = "coinableS";
$addy = "1NPrfWgJfkANmd1jt88A141PjhiarT8d9U"; 

$addUser = "INSERT INTO siteusers (userid, username, address) VALUES('$uid', '$username', '$addy')");
$doAddUser = mysqli_query($conn, $addUser) or die(mysqli_error($conn));
?>