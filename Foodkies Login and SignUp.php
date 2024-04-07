<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Foodkies Login and Sign-Up</title>
</head>

	
	       
    		<p align = "center"> <a href="Foodkies HomePages.html"><img src="Foodkies.png"></a></p>
					
	<style>
		body {
		  background-image: url('FoodkiesBackground.jpg');
			html,
		  body,
		  #image,
		  #gradient {
			height: 100%;
			width: 100%;
		  }

		  #image,
		  #gradient {
			position: fixed;
			top: 0;
		  }

		  body {
			margin: 0;
			opacity: 0;
			transition: opacity 700ms;
		  }

		  body[shown] {
			opacity: 1;
		  }
		}
	</style>
			
	<style>
		.btn {
		  background-color: silver;
		  border: none;
		  color: white;
		  padding: 12px 16px;
		  font-size: 16px;
		  cursor: pointer;
		}

		/* Darker background on mouse-over */
		.btn:hover {
		  background-color: black;
		}
		
		.btn span {
		  cursor: pointer;
		  display: inline-block;
		  position: relative;
		  transition: 0.5s;
		}

		.btn span:after {
		  content: '\00bb';
		  position: absolute;
		  opacity: 0;
		  top: 0;
		  right: -20px;
		  transition: 0.5s;
		}

		.btn:hover span {
		  padding-right: 25px;
		}

		.btn:hover span:after {
		  opacity: 1;
		  right: 0;
		}
	</style>
			
			<body>
					<p align = "center">
						<center>
							<a href = "http://localhost/foodkiesfriendlies/managementLogin.php">
								<button class="btn"><i class="fa fa-home"></i> Management </button> 
							</a>
							<a href = "http://localhost/foodkiesfriendlies/customerLogin.php">
					 			<button class="btn"><i class="fa fa-home"></i> Customer </button> 
							</a>
						</center>
					</p>
			</body>
			
<body>
</body>
</html>
