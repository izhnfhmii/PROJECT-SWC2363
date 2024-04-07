<html>
<head>
    <title> Foodkies Friendlies Customer Relationship Management System </title>
</head>
<body>
    <?php
    //call file to connect server foodkies friendlies
    include ("header.php");
    ?>

    <?php
    //This section processes submission from the login form
    //check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $error = array (); //Intialize an error array

        //check for an managementPassword
        if (empty ($_POST ['managementPassword']))
        {
            $error [] = 'You Forgot To Enter The Password. ';
        }
        else
        {
            $p = mysqli_real_escape_string ($connect, trim ($_POST ['managementPassword']));
        }

        //check for the managementName
        if (empty ($_POST ['managementName']))
        {
            $error [] = 'You are forgot to enter Your Name.';
        }
        else
        {
            $n = mysqli_real_escape_string ($connect, trim ($_POST ['managementName']));
        }

        //check for the managementEmail
        if (empty ($_POST ['managementEmail']))
        {
            $error [] = 'You are forgot to enter Your Email.';
        }
        else
        {
            $e = mysqli_real_escape_string ($connect, trim ($_POST ['managementEmail']));
        }

        //check for the managementPhoneNo
        if (empty ($_POST ['managementPhoneNo']))
        {
            $error [] = 'Your forgot to enter Your Phone Number.';
        }
        else
        {
            $ph = mysqli_real_escape_string ($connect, trim ($_POST ['managementPhoneNo']));
        }

        //register the management in the database
        //make the query :
        $q = "INSERT INTO management (managementID, managementPassword, managementName, managementEmail, managementPhoneNo)
            VALUES ('', '$p', '$n', '$e', '$ph') ";
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

    <h2> Management Registration </h2>
    <h4> *required field </h4>
    <form action = "managementRegister.php" method = "post">
        <div>
            <label for = "managementPassword"> Password : </label>
            <input type = "managementPassword" id = "managementPassword" name = "managementPassword" size = "15" maxlength = "60"
            pattern ="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title = "Must contain at least one number and one
            uppercase and lowercase letter, and at least 8 or more characters" required value=
            "<?php if (isset($_POST['managementPassword'])) echo $_POST ['managementPassword'];?>">
        </div>

        <div>
            <label for = "managementName"> Management Name* : </label>
            <input type = "text" id = "managementName" name = "managementName" size = "30" maxlength = "50" required
            value = "<?php if (isset($_POST['managementName'])) echo $_POST ['managementName'];?>">
        </div>

        <div>
            <label for = "managementEmail"> Management Email* : </label>
            <input type = "text" pattern = "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" 
            id = "managementEmail" name = "managementEmail" size = "30" maxlength = "50" required 
            value = "<?php if (isset($_POST['managementEmail'])) echo $_POST ['managementEmail'];?>">
        </div>

        <div>
            <label for = "managementPhoneNo"> Management Phone No* :</label>
            <input type = "tel" pattern = "[0-9]{3}-{0-9}{7}" id = "managementPhoneNo" name = "managementPhoneNo"
            size = "15" maxlength = "20" required 
            value = "<?php if (isset($_POST['managementPhoneNo'])) echo $_POST ['managementPhoneNo'];?>">
        </div>

        <div>
            <button type = "submit"> Register </button>
            <button type = "reset"> Reset </button>
        </div>
    </form>
</body>
</html>