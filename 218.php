if(isset($_POST['withdrawal'])){
$addy = trim($_POST['address']);
//validate
$checkAddy = $bitcoin->validateaddress($addy);
$isValid = $checkAddy['isvalid'];
	if(!$isValid){
       $message = "Address is invalid";
	} else {
	//process withdrawal
	}
}