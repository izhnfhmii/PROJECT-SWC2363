<?php
include("header.php");

 if (isset($_GET['custID']) or is_numeric(($_GET['$custID']))) {
  $customerID = $_GET['custID'];
 }else{
  echo 'no cust id';
 }


// Insert data into the cart table
if (isset($_POST['userId']) && isset($_POST['productName']) && isset($_POST['productPrice'])) {
    $userId = $_POST['userId'];
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];

    echo $productPrice;

    $addtoCartQ = "INSERT INTO `cart`(`cartCustomerID`, `cartQuantity`, `cartProductName`, `cartProductPrice`) VALUES ('$customerID','1','$productName','$productPrice')";
    $runAddtoCart = @mysqli_query($connect, $addtoCartQ);

    if($runAddtoCart){
        echo '<script> window.location.href = "Foodkies Customer Purchasing Cart.php?custID='.$customerID.'"</script>';
    }
} else {
    echo "Invalid request!";
}
?>
