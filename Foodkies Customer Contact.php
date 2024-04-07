<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Foodkies Contact</title>
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

        </style>

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
</style>

<style>
    input[type=text], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }

    input[type=submit] {
        background-color: #04AA6D;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    .container {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
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

<div class="container">
    <div class="row">
        <div class = "column">
        <p align="center"><img src="phoneIcon.png" width="150" height="150"></p>
        <p align="center">Call Us</p>
        <p align="center">017-2412838</p> 
        <p align="center">Management</p>
    </div>


    <div class = "column">
        <p align="center"><img src="mapIcon.png" width="150" height="150"></p>
        <p align="center">Our Location</p>
        <p align="center">No 3A, Jalan Angkasapuri</p> 
        <p align="center">Foodkies Tower</p>
    </div>

    <div class = "column">
        <p align="center"><img src="emailIcon.png" width="150" height="150"></p>
        <p align="center">Email Us</p>
        <p align="center">foodkiesLove@gmail.com</p> 
        <p align="center">Regarding to Email Us!</p>
    </div>
</div>

</div>

<p align="center">Got a question about your order? Need help with some of your app features? Contact Help Centre via app menu.</p>

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
