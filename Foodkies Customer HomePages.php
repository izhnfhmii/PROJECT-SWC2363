<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Foodkies HomePage</title>
</head>

<body>
	<style> 
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

        .logo {
            font-size: 24px;
        }

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
		
        </style>
	
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
					
	<style>
		body {
		  background-image: url('FoodkiesBackground.jpg');
		}

		video {
		width: 100%;
		height: auto;
		}

	</style>
			
	<body>
			<p align = "center">
			<video width="320" height="240" autoplay muted>
			<source src="foodDelivery.mp4" type="video/mp4">
			<source src="foodDelivery.ogg" type="video/ogg">
			Your browser does not support the video tag.
			</video></p>

		<blockquote>
		   <h1 align = "center"><strong> There's Something Special For You ! </strong></h1>
		</blockquote>
			
			<div class = "row">
			<div class = "column">
				<p align = "center"><img src = "nasilemak.jpg" width="285" height="214"></p> 
				<p align = "center"> Malaysian </p>
			</div>
			
			<div class="column">
				<p align = "center"><img src="nasiayampenyet.jpg" width="285" height="214"></p>
				<p align = "center"> Indonesian </p>
			</div>
			
  			<div class="column">
				<p align = "center"><img src="friedchicken.jpg" width="285" height="214"></p>
				<p align = "center"> Fried Chicken </p>
  			</div>
				
			<div class = "row">
			<div class = "column">
				<p align = "center"><img src = "chinesefood.jpg" width="285" height="214"></p> 
				<p align = "center"> Chinese </p>
			</div>
			
			<div class="column">
				<p align = "center"><img src="indianfood.jpg" width="285" height="214"></p>
				<p align = "center"> Indian </p>
  			</div>
				
			<div class="column">
				<p align = "center"><img src="fastfood.jpg" width="285" height="214"></p>
				<p align = "center"> Fast Food </p>
  			</div>
				
			<div class = "row">
			<div class = "column">
				<p align = "center"><img src = "turkishfood.jpg" width="285" height="214"></p> 
				<p align = "center"> Turkish </p>
			</div>
				
			<div class="column">
				<p align = "center"><img src="healthyfood.jpg" width="285" height="214"></p>
				<p align = "center"> Healthy </p>
  			</div>
				
			<div class="column">
				<p align = "center"><img src="westernfood.jpg" width="285" height="214"></p>
				<p align = "center"> Western </p>
  			</div>	
				
			<div class = "row">
			<div class = "column">
				<p align = "center"><img src = "japanesefood.jpg" width="285" height="214"></p> 
				<p align = "center"> Japanese </p>
			</div>
				
			<div class="column">
				<p align = "center"><img src="koreanfood.jpg" width="285" height="214"></p>
				<p align = "center"> Korean </p>
  			</div>
			
			<div class="column">
				<p align = "center"><img src="bubbletea.jpeg" width="285" height="214"></p>
				<p align = "center"> Drinks </p>
  			</div>
			</div>	
			</div>
			</div>
			</div>
			
	</body>
	
	<body>
		<blockquote>
			<h3> Why Foodkies ? </h3>
		</blockquote>
			<blockquote>
			<p> &#9989 Quickest - Foodkies provides the fastest food delivery in the market. </p>
			</blockquote>
		
			<blockquote>
			<p> &#9989 Easiest - Now grabbing your food is just a few clicks or taps away. Order online or download our Foodkies super app for a faster and more rewarding experience.</p>
			</blockquote>
		
			<blockquote>
			<p> &#9989 Food for all cravings - From local fare to restaurant favourites, our wide selection of food will definitely satisfy all your cravings.</p>
			</blockquote>
		
			<blockquote>
			<p> &#9989 Pay with ease - It’s easy to get your meals delivered to you. It’s even easier to pay for it with FoodkiesPay.</p>
			</blockquote>
		
			<blockquote>
			<p> &#9989 More Rewarding - earn FoodkiesRewards points for every order you make and use them to redeem more goodies.</p>
			</blockquote>
		
	</body>
	
	<style>
            /* CSS to style the footer */
            footer {
              background-color: #C0C0C0; /* Set your desired background color */
              padding: 20px;
              text-align: center;
              color: #333; /* Text color */
              font-size: 14px;
            }
        </style>		
			
	<footer>
        <p align = "left"> © FOODKIES 2024. ALL RIGHTS RESERVED </p>
	</footer>
			
	</body>
	</body>
</html>
