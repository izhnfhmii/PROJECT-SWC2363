<?php
session_start();
include("header.php");

// Database connection details
$host = 'localhost';
$dbname = 'foodkies friendlies';
$username = 'root';
$password = '';

// Create a PDO connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Fetch items from the foods table
try {
    $stmt = $pdo->query("SELECT * FROM foods");
    $foods = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Insert data into the cart table and add to cart session
foreach ($foods as $food) {
    // Assuming the user ID is 1 for now
    $userID = 1;
    $productID = $food['foodID'];
    $quantity = 1; // Default quantity
    $productName = $food['foodName'];
    $productPrice = $food['foodPrice'];
    $productImage = $food['foodImage'];

    try {
        // Insert into cart table
        $stmt = $pdo->prepare("INSERT INTO cart (cartCustomerID, cartProductID, cartQuantity, cartProductName, cartProductPrice, cartProductImage) 
                               VALUES (:userID, :productID, :quantity, :productName, :productPrice, :productImage)");
        $stmt->bindParam(':userID', $userID);
        $stmt->bindParam(':productID', $productID);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':productName', $productName);
        $stmt->bindParam(':productPrice', $productPrice);
        $stmt->bindParam(':productImage', $productImage);
        $stmt->execute();

        // Add to cart session
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        $_SESSION['cart'][] = array(
            'foodID' => $food['foodID'],
            'foodName' => $food['foodName'],
            'foodPrice' => $food['foodPrice'],
            'foodType' => $food['foodType'],
            'foodImage' => $food['foodImage'],
        );

        echo "Inserted into cart table successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Close the PDO connection
$pdo = null;
?>
