<html>
<head>
    <title> Foodkies Friendlies Customer Relationship Customer System </title>
</head>
<body>
    <?php
    //call file to connect server foodkies friendlies
    include ("header.php");
    ?>

    <?php

    $ph = "";

    //This section processes submission from the login form
    //check if the form has been submitted

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $error = array (); //Intialize an error array

        //check for the customerPassword
        if (empty ($_POST ['customerPassword']))
        {
            $error [] = 'You Forgot To Enter The Password. ';
        }
        else
        {
            $p = mysqli_real_escape_string ($connect, trim ($_POST ['customerPassword']));
        }

        //check for the customerName
        if (empty ($_POST ['customerName']))
        {
            $error [] = 'You are forgot to enter Your Name.';
        }
        else
        {
            $n = mysqli_real_escape_string ($connect, trim ($_POST ['customerName']));
        }

        //check for the customerEmail
        if (empty ($_POST ['customerEmail']))
        {
            $error [] = 'You are forgot to enter Your Email.';
        }
        else
        {
            $e = mysqli_real_escape_string ($connect, trim ($_POST ['customerEmail']));
        }

        //check for the customerPhoneNo
        if (empty ($_POST ['customerPhoneNo']))
        {
            $error [] = 'Your forgot to enter Your Phone Number.';
        }
        else
        {
            $ph = mysqli_real_escape_string ($connect, trim ($_POST ['customerPhoneNo']));
        }

        //check for the customerAddress
        if (empty ($_POST ['customerAddress']))
        {
            $error [] = 'Your forgot to enter Your Home Address.';
        }
        else
        {
            $ad = mysqli_real_escape_string ($connect, trim ($_POST ['customerAddress']));
        }

        //check for the customerMembership
        if (empty ($_POST ['customerMembership']))
        {
            $error [] = 'You forgot to identify your own Membership Members.';
        }
        else
        {
            $mm = mysqli_real_escape_string ($connect, trim ($_POST ['customerMembership']));
        }

        //register the Customer in the database
        //make the query :
        $q = "INSERT INTO customers (customerID, customerPassword, customerName, customerEmail, customerPhoneNo, customerAddress, customerMembership)
            VALUES ('', '$p', '$n', '$e', '$ph', '$ad', '$mm', '')";
        $result = @mysqli_query ($connect, $q); //run the query
        if ($result) //if it runs
        {
            echo '<h1> Thank You So Much</h1>';
            exit();
        }
        else
        {
            //if it didn't run
            //message
            echo '<h1> Sorry, System is Error <h1>';

            //debugging message
            echo '<p>' .mysqli_error($connect). '<br><br> Query : ' .$q. '</p>';
        } //end of it (result)
        mysqli_close($connect); //close the database connection aborted
        exit();
    } //end of the main submit conditional
    ?>

    <h2> Customer Registration </h2>
    <h4> *required field </h4>
    <form action = "customerRegister.php" method = "post">
        <div>
            <label for = "customerPassword"> Password : </label>
            <input type = "customerPassword" id = "customerPassword" name = "customerPassword" size = "15" maxlength = "60"
            pattern = "(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title = "Must contain at least one number and one
            uppercase and lowercase letter, and at least 8 or more characters" required value =
            "<?php if (isset($_POST['customerPassword'])) echo $_POST ['customerPassword'];?>">
        </div>

        <div>
            <label for = "customerName"> Customers Full Name* : </label>
            <input type = "text" id = "customerName" name = "customerName" size = "30" maxlength = "50" required
            value = "<?php if (isset($_POST['customerName'])) echo $_POST ['customerName'];?>">
        </div>

        <div>
            <label for = "customerEmail"> Customer Email* : </label>
            <input type = "text" pattern = "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" 
            id = "customerEmail" name = "customerEmail" size = "30" maxlength = "50" required 
            value = "<?php if (isset($_POST['customerEmail'])) echo $_POST ['customerEmail'];?>">
        </div>

        <div>
            <label for="customerPhoneNo">Customer Phone No*:</label>
            <input type="tel" pattern="[0-9]{3}-[0-9]{7}" id="customerPhoneNo" name="customerPhoneNo"
            size="15" maxlength="20" required value="<?php if (isset($_POST['customerPhoneNo'])) 
            echo $_POST ['customerPhoneNo'];?>">
        </div>

        <div>
            <label for = "customerAddress"> Customer Address* : </label>
            <textarea id = "customerAddress" name = "customerAddress" size = "30" maxlength = "50" required
            value = "<?php if (isset($_POST['customerAddress'])) echo $_POST ['customerAddress'];?>"> </textarea>
        </div>

        <div>
            <label for = "customerMembership"> Customer Membership* : </label>
            <select name = "customerMembership" id = "customerMembership">
                <option value = "Yes"> Yes </option>
                <option value = "No"> No </option>
            </select>
        </div>

        <div>
            <button type = "submit"> Register </button>
            <button type = "reset"> Reset </button>
        </div>
    </form>
</body>
</html>