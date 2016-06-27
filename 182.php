$updateAddy = "UPDATE siteusers SET address = '$newAddy' WHERE username='coinableS'";
$doUpdate = mysqli_query($conn, $updateAddy) or die(mysqli_error($conn));