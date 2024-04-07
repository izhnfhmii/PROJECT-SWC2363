<html>
<head>
    <title> Foodkies Friendlies Customer Relationship Management System </title>
</head>
<body>
    <?php
    //call file to connect server foodkies friendlies
    include ("header.php");
    ?>

    <style>
        body 
        {
        background-image: url("FoodkiesBackground.jpg");
		background-color: #cccccc;
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
    </style>

    <form action ="customerFound.php" method="post">

    <h1 align = "center">Search Customer Record</h1>
    <p align = "center"><label class="label" for="customerName">Customer Name: </label>
    <input id="customerName" type="text" name="customerName" size="30"
    maxlength="50" value="<?php if (isset($_POST['customerName']))
    echo $_POST ['customerName']; ?>"/></p>

    <p align = "center"><input id ="submit" type="submit" name="submit" value="Search"/></p>
    </form>
</body>
</html>
