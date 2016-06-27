$convertBalance = $balance / 100000000;
$convertBalance = number_format($convertBalance, 8);
$doWithdrawal = $bitcoin->sendtoaddress($addy, $convertBalance);