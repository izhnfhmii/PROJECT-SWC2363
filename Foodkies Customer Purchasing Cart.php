<?php
session_start(); // Start the session

include("header.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Foodkies Food Court List</title>
<style> 
  /* CSS for header */
  .header {
    background-color: #C0C0C0;
    color: white;
    padding: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  body {
			  font-family: Arial, Helvetica, sans-serif;
				}
  
  /* CSS for navigation links */
  .nav-links {
    list-style-type: none;
    margin: 0;
    padding: 0;
    display: flex;
  }

  .nav-links li {
    margin-right: 20px;
  }

  .nav-links li:last-child {
    margin-right: 0;
  }

  .nav-links a {
    color: white;
    text-decoration: none;
  }

  .nav-links a:hover {
    color: #ff7a59;
  }

  /*For Align The Row Of Pictures*/
  * {
				  box-sizing: border-box;
				}

				.column {
				  float: left;
				  width: 33.33%;
				  padding: 5px;
				}

				/* Clearfix (clear floats) */
				.row::after {
				  content: "";
				  clear: both;
				  display: table;
				}

  /* CSS for columns and images */
  .row::after {
    content: "";
    clear: both;
    display: table;
  }

  .column {
    float: left;
    width: 33.33%;
    padding: 5px;
  }

  /* CSS for buttons */
  .darkred-button {
    background-color: darkred;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
  }

  .darkred-button:hover {
    background-color: darkred;
  }

  .button1 {
    width: 200px;
  }

  /* CSS for footer */
  footer {
    background-color: #C0C0C0;
    padding: 20px;
    text-align: center;
    color: #333;
    font-size: 14px;
  }

  * {
			  box-sizing: border-box;
			}

			html,
			body {
			  width: 100%;
			  height: 100%;
			  margin: 0;
			  background-image: url('FoodkiesBackground.jpg');
			  font-family: 'Roboto', sans-serif;
			}

			.shopping-cart {
			  width: 750px;
			  height: 1500px;
			  margin: 80px auto;
			  background: #FFFFFF;
			  box-shadow: 1px 2px 3px 0px rgba(0, 0, 0, 0.10);
			  border-radius: 6px;
			  display: flex;
			  flex-direction: column;
			}

			.title {
			  height: 60px;
			  border-bottom: 1px solid #E1E8EE;
			  padding: 20px 30px;
			  color: #5E6977;
			  font-size: 18px;
			  font-weight: 400;
			}

			.item {
			  padding: 20px 30px;
			  height: 120px;
			  display: flex;
			}

			.item:nth-child(12) {
			  border-top: 1px solid #E1E8EE;
			  border-bottom: 1px solid #E1E8EE;
			}

			.buttons {
			  position: relative;
			  padding-top: 30px;
			  margin-right: 60px;
			}

			.delete-btn,
			.like-btn {
			  display: inline-block;
			  cursor: pointer;
			}

			.delete-btn {
			  width: 18px;
			  height: 17px;
			  background: url('delete-icn.svg') no-repeat center;
			}

			.like-btn {
			  position: absolute;
			  top: 9px;
			  left: 15px;
			  background: url('twitter-heart.png');
			  width: 60px;
			  height: 60px;
			  background-size: 2900%;
			  background-repeat: no-repeat;
			}

			.is-active {
			  animation-name: animate;
			  animation-duration: .8s;
			  animation-iteration-count: 1;
			  animation-timing-function: steps(28);
			  animation-fill-mode: forwards;
			}

			@keyframes animate {
			  0% {
				background-position: left;
			  }

			  50% {
				background-position: right;
			  }

			  100% {
				background-position: right;
			  }
			}

			.image {
			  margin-right: 50px;
			}

			.description {
			  padding-top: 10px;
			  margin-right: 60px;
			  width: 115px;
			}

			.description span {
			  display: block;
			  font-size: 14px;
			  color: #43484D;
			  font-weight: 400;
			}

			.description span:first-child {
			  margin-bottom: 5px;
			}

			.description span:last-child {
			  font-weight: 300;
			  margin-top: 8px;
			  color: #86939E;
			}

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

			.button1 {
			  width: 250px;
			}

</style>
</head>
<body>

	<?php
	if (isset($_GET['custID']) or is_numeric(($_GET['$custID']))) {
	$customerID = $_GET['custID'];
	}else{
	echo 'no cust id';
	}
	?>

	<header class = "header">   
		
		<p> <a href="Foodkies%20Customer%20Homepages.php?custID=<?php echo $customerID; ?>"><img src="Foodkies.png" width="100" height="33"></a></p>
		<nav>
			<ul class="nav-links">
			<li><a href="Foodkies%20Customer%20Login%20Details.php?custID=<?php echo $customerID; ?>">Customer Details<class="menu-link"></a></li>

			<li><a href="http://localhost/foodkiesfriendlies/Foodkies%20Customer%20Food%20Court%20List.php?custID=<?php echo $customerID; ?>">Food Court List<class="menu-link"></a></li>

			<li><a href="Foodkies%20Customer%20Purchasing%20Cart.php?custID=<?php echo $customerID; ?>">Purchasing Cart<class="menu-link"></a></li>

			<li><a href="Foodkies%20Customer%20Contact.php?custID=<?php echo $customerID; ?>">Contact<class="menu-link"></a></li>

			<li><a href="Foodkies%20Customer%20About%20Us.php?custID=<?php echo $customerID; ?>">About<class="menu-link"></a></li>

			</ul>
		</nav>
	</header>

<div class="shopping-cart">
    <!-- Title -->
    <div class="title">
        Foodkies Purchasing Bag
    </div>
            
	<?php

$cartQuery = "SELECT * FROM `cart` WHERE cartCustomerID = '$customerID'";
$runQuery = @mysqli_query($connect, $cartQuery);

while($result = mysqli_fetch_array($runQuery, MYSQLI_ASSOC)){
	
	echo '	<div class="item">
	<div class="buttons">
		<span class="delete-btn"></span>
		<span class="like-btn"></span>
	</div>

	<div class="image">
		<img src="test" alt="" width="90" height="65" />
	</div>

	<div class="description">
		<span>'.$result['cartProductName'].'</span>
		<span>'.$result['cartQuantity'].'</span>
		<span>Halal</span>
	</div>

	<div class="total-price">'.$result['cartProductPrice'].'</div>

	<form action="deleteCart.php" method="post">
        <input type="hidden" name="cartID" value="'.$result['cartID'].'">
        <input type="hidden" name="custID" value="'.$customerID.'">
        <button type="submit" class="darkred-button">Delete</button>
    </form>

</div>';
}
?>

<a href="Foodkies Customer Food Court List.php?custID=<?php echo $customerID; ?>">
    <p align="center"><button class="silver-button button1">Add More</button></p>
</a>

<style>
	/* CSS to style the button */
	.green-button {
			  background-color: greenyellow;
			  color: white;
			  padding: 10px 20px;
			  border: none;
			  border-radius: 5px;
			  font-size: 16px;
			  cursor: pointer;
			}

			/* Hover effect */
			.green-button:hover {
			  background-color: black;
			}

			.button1 {
			  width: 250px;
			}

</style>

<a href="Foodkies Customer Payment.php?custID=<?php echo $customerID; ?>">
    <p align="center"><button class="green-button button1">Pay Now</button></p>
</a>


<style>
  /* CSS for body background */
  body {
    background-image: url('FoodkiesBackground.jpg');
  }
</style>

<style>
    /* CSS for footer */
  footer {
    background-color: #C0C0C0;
    padding: 20px;
    text-align: center;
    color: #333;
    font-size: 14px;
  }
</style>

<footer>
  <p align="left">© FOODKIES 2024. ALL RIGHTS RESERVED</p>
</footer>

</body>
</html>
