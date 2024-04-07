<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Customer Receipt</title>
<style>
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
        <?php
        // Check if the necessary data is received via POST
        if(isset($_POST['set1'], $_POST['set2'], $_POST['paymentMethod'], $_POST['totalAmount'])) {
            // Extract data from POST
            $set1 = $_POST['set1'];
            $set2 = $_POST['set2'];
            $paymentMethod = $_POST['paymentMethod'];
            $totalAmount = $_POST['totalAmount'];
            ?>
            <p>Your Order:</p>
            <div class="receipt-item">
                <p>Item: <span><?php echo $set1; ?></span> & <span><?php echo $set2; ?></span></p>
                <p>Payment Method: <span><?php echo $paymentMethod; ?></span></p>
                <p>Total Price: RM<span><?php echo $totalAmount; ?></span></p>
            </div>
            <p><em>* Thank you and Enjoy your meals! *</em></p>
            <p><em>* Please Come Again! *</em></p>
            <?php
        } else {
            echo "<p>Failed to generate receipt. Data missing.</p>";
        }
        ?>
    </div>
    <div class="button-container">
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
