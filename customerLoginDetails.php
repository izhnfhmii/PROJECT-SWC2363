<?php
session_start();

// Include database connection file
$servername = "localhost";
$username = "foodkiesfriendlies";
$password = "ppmax2011";
$dbname = "customers";

$connect = mysqli_connect($servername, $username, $password, $dbname);

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate input
    if (!empty($_POST['customerID']) && !empty($_POST['customerPassword'])) {
        $id = mysqli_real_escape_string($connect, $_POST['customerID']);
        $password = mysqli_real_escape_string($connect, $_POST['customerPassword']);
        
        // Query to retrieve customer details
        $query = "SELECT * FROM customers WHERE customerID = '$id' AND customerPassword = '$password'";
        $result = mysqli_query($connect, $query);
        
        // If login is successful, store customer details in session
        if (mysqli_num_rows($result) == 1) {
            $_SESSION['customer'] = mysqli_fetch_assoc($result);
            echo '<p align="center"> Welcome to Foodkies, Your Food Website Delicacy ! </p>';
            echo '<p align="center"><a href="Foodkies Customer HomePages.php" target="_blank"> Click Here';
            exit(); // Cancel the rest of the script
        } else {
            echo '<p class="error"> The customerID and customerPassword entered do not match our records. </p>';
        }
    } else {
        echo '<p class="error"> Please enter both customerID and customerPassword. </p>';
    }
}

// Check if the customer is logged in
if (isset($_SESSION['customer'])) {
    // Display customer details
    $customer = $_SESSION['customer'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Customer Detail</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .container h2 {
            text-align: center;
        }
        .details {
            margin-bottom: 20px;
        }
        .logout-btn {
            text-align: center;
        }
        .logout-btn a {
            background-color: #FF0000;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Customer Details</h2>
    <div class="details">
        <p><strong>Customer ID:</strong> <?php echo $customer['customerID']; ?></p>
        <p><strong>Name:</strong> <?php echo $customer['customerName']; ?></p>
        <p><strong>Email:</strong> <?php echo $customer['customerEmail']; ?></p>
        <p><strong>Phone No:</strong> <?php echo $customer['customerPhoneNo']; ?></p>
        <p><strong>Address:</strong> <?php echo $customer['customerAddress']; ?></p>
        <!-- Add more details as needed -->
    </div>
    <div class="logout-btn">
        <a href="customerLogout.php">Log Out</a>
    </div>
</div>

</body>
</html>

<?php
    // End of customer detail page
    exit();
}

mysqli_close($connect);
?>
	
<!DOCTYPE html>
<html>
<head>
    <title>Customer Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .container h2 {
            text-align: center;
        }
        .error {
            color: #FF0000;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn-group {
            text-align: center;
        }
        .btn-group button {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-transform: uppercase;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Customer Login</h2>
    <form action="customerLoginDetails.php" method="post">
        <div class="form-group">
            <label for="customerID">Customer ID:</label>
            <input type="text" id="customerID" name="customerID" required>
        </div>
        <div class="form-group">
            <label for="customerPassword">Password:</label>
            <input type="password" id="customerPassword" name="customerPassword" required>
        </div>
        <div class="btn-group">
            <button type="submit">Login</button>
        </div>
    </form>
</div>

</body>
</html>
