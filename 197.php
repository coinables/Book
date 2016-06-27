if(trim($_POST['username'])==''){
 $message = "You must enter a name";
} 
else if(trim($_POST['pw']) ==''){
$message = "You must enter a password";
}
else if ($password != $password2){
$message = "Passwords Do Not Match";
} 