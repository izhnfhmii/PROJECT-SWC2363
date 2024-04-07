<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Foodkies Customer Login Details</title>
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

    /* CSS for navigation */
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

    /* CSS for body background */
    body {
        font-family: Arial, Helvetica, sans-serif;
        background-image: url('FoodkiesBackground.jpg');
    }

    /* CSS for footer */
    footer {
        background-color: #C0C0C0;
        padding: 20px;
        text-align: center;
        color: #333;
        font-size: 14px;
    }

    /* CSS for container */
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    /* CSS for centering text */
    h2, p {
        text-align: center;
    }

    /* CSS to style the button */
    .darkred-button {
        background-color: darkred;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
    }

    /* Hover effect */
    .darkred-button:hover {
        background-color: darkred;
    }

    .button1 {width: 200px;}
    </style>
</style>
</head>
<body>
<?php
        // Include the necessary files and establish database connection
        include("header.php"); // Make sure this file exists and contains valid PHP code
        $connect = mysqli_connect("localhost", "root", "", "foodkies friendlies");

        if (!$connect) {
            die("Connection failed: " . mysqli_connect_error());
        }

        if (isset($_GET['custID']) or is_numeric(($_GET['$custID']))) {
            $customerID = $_GET['custID'];
            $query = "SELECT customerID, customerPassword, customerName, customerEmail, customerPhoneNo, customerAddress, customerMembership
                        FROM customers WHERE customerID = '$customerID' ORDER BY customerID";
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

    <div class="container">
   
<?php
            $result = mysqli_query($connect, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                echo "<h2>Customer Details</h2>";
                echo "<p>Name: " . $row['customerName'] . "</p>";
                echo "<p>ID: " . $row['customerID'] . "</p>";
                echo "<p>Password: " . $row['customerPassword'] . "</p>";
                echo "<p>Email: " . $row['customerEmail'] . "</p>";
                echo "<p>Phone number: " . $row['customerPhoneNo'] . "</p>";
                echo "<p>Address: " . $row['customerAddress'] . "</p>";
                echo "<p>Membership: " . $row['customerMembership'] . "</p>";
                echo "<p>Today's Date: " . date("Y/m/d") . "</p>";
                echo "<p>Login Time: " . date("h:i:sa") . "</p>";
            } else {
                echo '<p class="error">No records found.</p>';
            }

            mysqli_close($connect);
        }
        ?>
    </div>

    <div class="row">
        <p align="center"><a href="Foodkies Global HomePages.php"><button class="darkred-button button1">Log Out</button></a></p>
    </div>

    <footer>
        <p>&copy; FOODKIES 2024. ALL RIGHTS RESERVED</p>
    </footer>
</body>
</html>
