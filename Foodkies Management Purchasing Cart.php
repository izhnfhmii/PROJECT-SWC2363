<?php
session_start();

// Check if the form is submitted
if (isset($_POST['add_to_cart'])) {
    // Retrieve item details
    $item = $_POST['item'];
    $quantity = (int)$_POST['quantity'];
    
    // Calculate total price
    $item_prices = [
        "Nasi Lemak Pak Abdul" => 9.90,
        "Nasi Ayam Penyet Berapi" => 10.90,
        "Kepcilicious Fried Chicken" => 14.90,
        "Halal Chicken DimSum" => 9.90,
        "Cheese Naan with Variety Gravy" => 7.90,
        "Smoking Prosperity Burger Set" => 17.90,
        "Casablanca Chicken Shawarma" => 11.90,
        "Greek Salad with Grilled Chicken and Dressing" => 12.90,
        "T-Bone Steak With Wedges" => 59.90,
        "Variety Sushi Set" => 16.90,
        "Seoul Spicy Tteokbokki" => 12.90,
        "Taiwan Milk Bubble Tea" => 8.90,
    ];
    $total_price = isset($item_prices[$item]) ? $item_prices[$item] * $quantity : 0;

    // Apply shipping charges based on membership
    if ($_POST['membership'] == 'member') {
        $shipping_charge = 0; // Free shipping for members
    } else {
        $shipping_charge = 3.00; // RM3.00 shipping charge for non-members
    }

    $total_price += $shipping_charge; // Add shipping charge to total price

    // Add item to cart
    $_SESSION['order'][] = array('item' => $item, 'quantity' => $quantity, 'total_price' => $total_price);

    // Store total price in session
    $_SESSION['total_price'] = array_sum(array_column($_SESSION['order'], 'total_price'));

    // Redirect to receipt script
    header("Location: Foodkies Management Receipt.php");
    exit();
}

// If 'remove' action is requested
if (isset($_GET['remove'])) {
    $index = (int)$_GET['remove'];
    unset($_SESSION['order'][$index]);
    // Redirect back to the cart
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Purchasing Cart</title>
<style>
    body {
        background-image: url("FoodkiesBackground.jpg");
		background-color: #cccccc;
        font-family: Arial, sans-serif;
    }
    .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    table, th, td {
        border: 1px solid #ccc;
        padding: 8px;
    }
    th {
        background-color: #f2f2f2;
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
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 5px;
    }
</style></head>
<body>
<div class="container">
    <h2>Purchasing Cart</h2>
    <?php
    if (isset($_SESSION['order'])) {
        $order = $_SESSION['order'];

        // Output table header
        echo "<table border='1'>";
        echo "<tr><th>Item</th><th>Quantity</th><th>Price (per item)</th><th>Total Price</th><th>Action</th></tr>";

        // Output items in the order
        foreach ($order as $index => $order_item) {
            $item = $order_item['item'];
            $quantity = $order_item['quantity'];
            $item_price = $item_prices[$item];
            $total_price = calculateItemTotalPrice($item, $quantity);

            echo "<tr>";
            echo "<td>{$item}</td>";
            echo "<td>{$quantity}</td>";
            echo "<td>RM " . number_format($item_price, 2) . "</td>";
            echo "<td>RM " . number_format($total_price, 2) . "</td>";
            echo "<td><a href='?remove={$index}'>Remove</a></td>";
            echo "</tr>";
        }

        echo "</table>";

        echo "<p><a href='Foodkies Management.php' class='button'>Continue Shopping</a></p>";
    } else {
        echo "<p>No items in the cart</p>";
    }
    ?>
</div>
</body>
</html>