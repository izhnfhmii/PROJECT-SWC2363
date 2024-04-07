<?php
session_start();

// Retrieve order details from session
if (isset($_SESSION['order'])) {
    $order = $_SESSION['order'];
} else {
    // Redirect back to the cart if no order data found
    header("Location: purchasingCart2.php");
    exit();
}

// Retrieve total price from session
$total_price = isset($_SESSION['total_price']) ? $_SESSION['total_price'] : 0;

// Calculate total amount
$totalAmount = number_format($total_price, 2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Customer Receipt</title>
<style>
    body  {
		  background-image: url("FoodkiesBackground.jpg");
		  background-color: #cccccc;
		}
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        padding: 0;
    }
    .container {
        width: 80%;
        margin: 50px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .header {
        text-align: center;
        margin-bottom: 20px;
    }
    .receipt {
        font-size: 16px;
        line-height: 1.6;
        margin-bottom: 20px;
    }
    .receipt-item {
        margin-bottom: 10px;
    }
    .button-container {
        text-align: center;
    }
    .button {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin-top: 20px;
        cursor: pointer;
        border-radius: 5px;
    }
</style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>RECEIPT</h1>
    </div>
    <div class="receipt">
        <p>Your Order:</p>
        <?php foreach ($order as $order_item): ?>
            <div class="receipt-item">
                <p>Item: <?php echo $order_item['item']; ?></p>
                <p>Quantity: <?php echo $order_item['quantity']; ?></p>
                <p>Total Price: RM<?php echo number_format($order_item['total_price'], 2); ?></p>
            </div>
        <?php endforeach; ?>
        <p>Total Amount: RM<?php echo $totalAmount; ?></p>
        <p><em>* Thank you and Enjoy your meals! *</em></p>
        <p><em>* Please Come Again! *</em></p>
    </div>
    <div class="button-container">
        <a href = "http://localhost/foodkiesfriendlies/Foodkies%20Management%20Purchasing%20Cart.php">
        <button class="button" onclick="closeWindow()">Close</button>
    </div>
</div>

<script>
    // Function to close the window
    function closeWindow() {
        window.close();
    }
</script>
</body>
</html>
