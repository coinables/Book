$send = $bitcoin->sendtoaddress("1SomeBitcoinAddy", 1);
echo $send ? $send : "Oops an error: ".$bitcoin->error;