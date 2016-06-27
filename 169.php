$uid = uniqid();
$info = $bitcoin->getnewaddress();
$add = $db->prepare("INSERT INTO users (userid, address) VALUES(?, ?)");