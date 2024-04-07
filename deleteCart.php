<?php
include("header.php");
?>

<?php
 if (isset($_GET['custID']) or is_numeric(($_GET['$custID']))) {
  $customerID = $_GET['custID'];
 }else{
  echo 'no cust id';
 }

 $deleteQuery = "DELETE FROM `cart` WHERE cartCustomerID = '$customerID'";
 $runDeleteQ = @mysqli_query($connect, $deleteQuery);

 if($runDeleteQ){
    echo "<script> window.location.href = 'Foodkies Customer Food Court List.php?custID=".$customerID."'</script>";
 }else{
    echo "<script> 
    alert('Fail to delete cart.');
    window.location.href = 'Foodkies Customer Food Court List.php?custID=".$customerID."'</script>";
 }
?>