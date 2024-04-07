<?php
// Database connection details
$host = 'localhost'; // Host name
$dbname = 'foodkies friendlies'; // Database name
$username = 'root'; // Username
$password = ''; // Password

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

// Insert data into the cart table
foreach ($foods as $food) {
    $cartID = 1; // Assuming the user ID is 1 for now
    $cartProductID = $food['foodID'];
    $cartQuantity = 1; // You can set the quantity as per your requirement
    $cartProductName = $food['foodName'];
    $cartProductPrice = $food['foodPrice'];
    $cartProductImage = $food['foodImage'];

    try {
        $stmt = $pdo->prepare("INSERT INTO cart (cartID, cartProductID, cartQuantity, cartProductName, cartProductPrice, cartProductImage) 
                               VALUES (:cartID, :cartProductID, :cartQuantity, :cartProductName, :cartProductPrice, :cartProductImage)");
        $stmt->bindParam(':cartID', $cartID);
        $stmt->bindParam(':cartProductID', $cartProductID);
        $stmt->bindParam(':cartQuantity', $cartQuantity);
        $stmt->bindParam(':cartProductName', $cartProductName);
        $stmt->bindParam(':cartProductPrice', $cartProductPrice);
        $stmt->bindParam(':cartProductImage', $cartProductImage);
        $stmt->execute();
        echo "Inserted into cart table successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Foodkies Food Court List</title>
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

  body {
			  font-family: Arial, Helvetica, sans-serif;
				}
  
  /* CSS for navigation links */
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

  /* CSS for columns and images */
  .row::after {
    content: "";
    clear: both;
    display: table;
  }

  .column {
    float: left;
    width: 33.33%;
    padding: 5px;
  }

  /* CSS for buttons */
  .darkred-button {
    background-color: darkred;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
  }

  .darkred-button:hover {
    background-color: darkred;
  }

  .button1 {
    width: 200px;
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

<?php
 if (isset($_GET['custID']) or is_numeric(($_GET['$custID']))) {
  $customerID = $_GET['custID'];
 }else{
  echo 'no cust id';
 }
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

<style>
  /* CSS for body background */
  body {
    background-image: url('FoodkiesBackground.jpg');
  }
</style>

<div class="row">
  <?php foreach ($foods as $food) { ?>
    <div class="column">
      <p align="center"><img src="<?php echo $food['foodImage']; ?>" width="285" height="214"></p>
      <p align="center"><?php echo $food['foodName']; ?></p>
      <p align="center">RM <?php echo $food['foodPrice']; ?></p>
      <p align="center"><?php echo $food['foodCategory']; ?></p>
      <p align="center">
        <button class="darkred-button button1" onclick="addToCart('<?php echo $food['foodName']; ?>', '<?php echo $food['foodPrice']; ?>')">Place The Order</button>
      </p>
    </div>
  <?php } ?>
</div>
  
  <div class="row">
    <p align="center"><img src="nasilemak.jpg" width="285" height="214"></p> 
    <p align="center">Nasi Lemak Pak Abdul</p>
    <p align="center">RM 5.00</p>
    <p align="center">Malaysian Food</p>
    <p align="center"><button class="darkred-button button1" onclick="addToCart('Nasi Lemak Pak Abdul', 5.00)">Place The Order</button></p>
</button></p>
  </div>

  <div class="row">
    <p align="center"><img src="nasiayampenyet.jpg" width="285" height="214"></p>
    <p align="center">Nasi Ayam Penyet Berapi</p>
    <p align="center">RM 11.00</p>
    <p align="center">Indonesian Food</p>
    <p align="center"><button class="darkred-button button1" onclick="addToCart('Nasi Ayam Penyet Berapi', 11.00)">Place The Order</button></p>
  </div>

  <div class="row">
    <p align="center"><img src="friedchicken.jpg" width="285" height="214"></p>
    <p align="center">Kepcilicious Fried Chicken Set</p>
    <p align="center">RM 18.00</p>
    <p align="center">Fried Chicken Food</p>
    <p align="center"><button class="darkred-button button1" onclick="addToCart('Kepcilicious Fried Chicken Set', 18.00)">Place The Order</button></p>
  </div>

  <div class="row">
    <p align="center"><img src="chinesefood.jpg" width="285" height="214"></p>
    <p align="center">Halal Chicken Dim Sum</p>
    <p align="center">RM 9.00</p>
    <p align="center">Chinese Food</p>
    <p align="center"><button class="darkred-button button1" onclick="addToCart('Halal Chicken Dim Sum', 9.00)">Place The Order</button></p>
  </div>

  <div class="row">
    <p align="center"><img src="indianfood.jpg" width="285" height="214"></p>
    <p align="center">Naan Cheese</p>
    <p align="center">RM 10.00</p>
    <p align="center">Indian Food</p>
    <p align="center"><button class="darkred-button button1" onclick="addToCart('Naan Cheese', 10.00)">Place The Order</button></p>
  </div>

  <div class="row">
    <p align="center"><img src="fastfood.jpg" width="285" height="214"></p>
    <p align="center">Prosperity Burger Set</p>
    <p align="center">RM 22.00</p>
    <p align="center">Fast Food</p>
    <p align="center"><button class="darkred-button button1" onclick="addToCart('Prosperity Burger Set', 22.00)">Place The Order</button></p>
  </div>

  <div class="row">
    <p align="center"><img src="turkishfood.jpg" width="285" height="214"></p>
    <p align="center">Casablanca Chicken Shawarma</p>
    <p align="center">RM 12.00</p> 
    <p align="center">Turkish Food</p>
    <p align="center"><button class="darkred-button button1" onclick="addToCart('Casablanca Chicken Shawarma', 12.00)">Place The Order</button></p>
  </div>

  <div class="row">
    <p align="center"><img src="healthyfood.jpg" width="285" height="214"></p>
    <p align="center">Greek Salad with Grill Chicken</p>
    <p align="center">RM 14.00</p>
    <p align="center">Healthy Food</p>
    <p align="center"><button class="darkred-button button1" onclick="addToCart('Greek Salad with Grill Chicken', 14.00)">Place The Order</button></p>
  </div>

  <div class="row">
    <p align="center"><img src="westernfood.jpg" width="285" height="214"></p>
    <p align="center">Sirloin Angus Beef</p>
    <p align="center">RM 70.00</p>
    <p align="center">Western Food</p>
    <p align="center"><button class="darkred-button button1" onclick="addToCart('Sirloin Angus Beef', 70.00)">Place The Order</button></p>
  </div>
</div>

  <div class="row">
    <p align="center"><img src="japanesefood.jpg" width="285" height="214"></p>
    <p align="center">Variety Sushi Set</p>
    <p align="center">RM 16.00</p> 
    <p align="center">Japanese Food</p>
    <p align="center"><button class="darkred-button button1" onclick="addToCart('Variety Sushi Set', 16.00)">Place The Order</button></p>
  </div>

  <div class="row">
    <p align="center"><img src="koreanfood.jpg" width="285" height="214"></p>
    <p align="center">Spicy Seoul Tteokbokki</p>
    <p align="center">RM 9.00</p>
    <p align="center">Korean Food</p>
    <p align="center"><button class="darkred-button button1" onclick="addToCart('Spicy Seoul Tteokbokki', 9.00)">Place The Order</button></p>
  </div>

  <div class="row">
    <p align="center"><img src="bubbletea.jpeg" width="285" height="214"></p>
    <p align="center">Taiwan Boba Milk Tea</p>
    <p align="center">RM 8.00</p>
    <p align="center">Drinks Beverages</p>
    <p align="center"><button class="darkred-button button1" onclick="addToCart('Taiwan Boba Milk Tea', 8.00)">Place The Order</button></p>
  </div>

  

<footer>
  <p align="left">© FOODKIES 2024. ALL RIGHTS RESERVED</p>
</footer>

<script>
function addToCart(productName, productPrice) {
  // Assuming you have a user ID
  var userId = 1; // You need to set the user ID appropriately

  // Create a form element
  var form = document.createElement('form');
  form.method = 'post';
  form.action = 'insertcart.php?custID=<?php echo $customerID; ?>'; // Change this to the appropriate PHP script URL

  // Create hidden input fields for the data
  var userIdInput = document.createElement('input');
  userIdInput.type = 'hidden';
  userIdInput.name = 'userId';
  userIdInput.value = userId;
  form.appendChild(userIdInput);

  var productNameInput = document.createElement('input');
  productNameInput.type = 'hidden';
  productNameInput.name = 'productName';
  productNameInput.value = productName;
  form.appendChild(productNameInput);

  var productPriceInput = document.createElement('input');
  productPriceInput.type = 'hidden';
  productPriceInput.name = 'productPrice';
  productPriceInput.value = productPrice;
  form.appendChild(productPriceInput);

  // Append the form to the body and submit it
  document.body.appendChild(form);
  form.submit();
}
</script>

</body>
</html>
