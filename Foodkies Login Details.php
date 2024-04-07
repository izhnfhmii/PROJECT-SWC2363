<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Foodkies HomePage</title>
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
</style>
</head>
<body>
    <header class="header">
        <p><a href="Foodkies%20Customer%20Homepages.php"><img src="Foodkies.png" alt="Foodkies Logo" width="100" height="33"></a></p>
        <nav>
            <ul class="nav-links">
                <li><a href="">Login / Sign Up</a></li>
                <li><a href="http://localhost/foodkiesfriendlies/Foodkies%20Customer%20Food%20Court%20List.php">Food Court List</a></li>
                <li><a href="http://localhost/foodkiesfriendlies/Foodkies%20Customer%20Purchasing%20Cart.php">Purchasing Cart</a></li>
                <li><a href="http://localhost/foodkiesfriendlies/Foodkies%20Customer%20Contact.php">Contact</a></li>
                <li><a href="http://localhost/foodkiesfriendlies/Foodkies%20Customer%20About%20Us.php">About</a></li>
            </ul>
        </nav>
    </header>

    <?php
    // Include the necessary files and establish database connection
    include("header.php"); // Make sure this file exists and contains valid PHP code
    $connect = mysqli_connect("localhost", "root", "", "foodkies friendlies");

    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (isset($_POST['customerID'])) {
        $customerID = mysqli_real_escape_string($connect, $_POST['customerID']);
        $query = "SELECT customerID, customerPassword, customerName, customerEmail, customerPhoneNo, customerAddress, customerMembership
                    FROM customers WHERE customerID = '$customerID' ORDER BY customerID";

        $result = mysqli_query($connect, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            echo "<h2>Customer Details</h2>";
            echo "Name: " . $row['customerName'] . "<br>";
            echo "ID: " . $row['customerID'] . "<br>";
            echo "Password: " . $row['customerPassword'] . "<br>";
            echo "Email: " . $row['customerEmail'] . "<br>";
            echo "Phone number: " . $row['customerPhoneNo'] . "<br>";
            echo "Address: " . $row['customerAddress'] . "<br>";
            echo "Membership: " . $row['customerMembership'] . "<br>";
            echo "Today's Date: " . date("Y/m/d") . "<br>";
            echo "Login Time: " . date("h:i:sa");
        } else {
            echo '<p class="error">No records found.</p>';
        }

        mysqli_close($connect);
    }
    ?>

    <footer>
        <p>&copy; FOODKIES 2024. ALL RIGHTS RESERVED</p>
    </footer>
</body>
</html>
