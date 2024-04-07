<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style><?php include("styleeeee.css");?></style>
<?php
    // Start session
    session_start();

    // Include header file to connect to server
    include ("header.php");
    ?>

<?php
    // Check if the userID is set from the session
    if (isset($_SESSION['customerID'])) {
        // Get the userID from the session
        $customerID = $_SESSION['customerID'];

        // Fetch product data from cart table
        $query = "SELECT * FROM `cart` WHERE 1";
        $result = mysqli_query($connect, $query);

        // Check if there are any products
        if (mysqli_num_rows($result) > 0) {
            // Loop through products
            while ($row = mysqli_fetch_assoc($result)) {
?>
    <div class="productlist">
        <section class="listproduct">
            <div class="item">
                <img src="products_images/<?php echo $row['product_img']; ?>" alt="<?php echo $row['product_name']; ?>" />
                <div class="container">
                    <h2><?php echo $row['product_name']; ?></h2>
                    <p>Quantity: <?php echo $row['quantity']; ?></p>
                    <p>Total Price: RM <?php echo number_format($row['totalprice'], 2); ?></p>
                </div>
            </div>
        </section>
    </div>

    <!-- End of Product Card -->
<?php
            }
        } else {
            // If no products found for the user
            echo "No products found for this user.";
        }
    } else {
        // If userID is not set in the session
        echo "User ID not set.";
    }
?>
</body>
</html>