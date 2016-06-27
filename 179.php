$doSelect = mysqli_query($conn, $select) or die(mysqli_error($conn));
$fetchSelect = mysqli_fetch_assoc($doSelect);
$getAddy = $fetchSelect["address"];