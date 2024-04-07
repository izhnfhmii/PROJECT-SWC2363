<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Foodkies Payment Website</title>
</head>
<body>
    <?php
    include("header.php");
    ?>
    <style>
        body {
        background-image: url('FoodkiesBackground.jpg');
        }
        
        .main{
            width:1250px;
            height:350px;
            display:table;
            text-align:center;
            background-image: url('');
            }

        .sub{
            vertical-align:middle;
            display:table-cell;
            }
    </style>
    
    <style>
        /* CSS to style the button */
        .silver-button {
          background-color: silver;
          color: white;
          padding: 10px 20px;
          border: none;
          border-radius: 5px;
          font-size: 16px;
          cursor: pointer;
        }
      
        /* Hover effect */
        .silver-button:hover {
          background-color: black;
        }
        
        .button1 {width: 250px;}
    </style>


    <?php
    // Assuming $connect is your database connection
    if (isset($_GET['custID']) && is_numeric($_GET['custID'])) {
        $customerID = $_GET['custID'];
    } else {
        echo 'no cust id';
    }

    $cartQuery = "SELECT * FROM `cart` WHERE cartCustomerID = '$customerID'";
    $runQuery = mysqli_query($connect, $cartQuery);
    $currentTotal = 0;
    while ($result = mysqli_fetch_array($runQuery, MYSQLI_ASSOC)) {
        $currentTotal += (int)$result['cartProductPrice'];
    }
    ?>

    <div class="main"> 
        <div class="sub">
            <img src="paymentQRcode.jpg" length="250" height="250">
            <h2>* Scan To Pay For Your Purchase *</h2>
            <h3>Your Total : RM <?php echo $currentTotal; ?></h3>
        </div>
    </div>

	<!-- JavaScript redirection with a button -->
	<p align="center">
		<button class="silver-button button1" onclick="exitAfterPayment()">Exit After Payment</button>
	</p>

	<script>
		function exitAfterPayment() {
			alert("Thank You For Purchasing With Us!");
			window.location.href = "Foodkies%20Customer%20Homepages.php?custID=<?php echo htmlspecialchars($customerID); ?>";
		}
	</script>


</body>
</html>
