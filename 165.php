<?php
require("easybitcoin.php");
$bitcoin = new Bitcoin("username", "somepassword");
$info = $bitcoin->getinfo();
print_r($info);
?>