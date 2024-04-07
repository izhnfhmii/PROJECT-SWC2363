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

    <form action ="managementFound.php" method="post">

    <h1 align = "center">Search Management Record</h1>
    <p align = "center"><label class="label" for="managementName"> Management Name: </label>
    <input id="managementName" type="text" name="managementName" size="30"
    maxlength="50" value="<?php if (isset($_POST['managementName']))
    echo $_POST ['managementName']; ?>"/></p>

    <p align = "center"><input id ="submit" type="submit" name="submit" value="Search"/></p>
    </form>
</body>
</html>
