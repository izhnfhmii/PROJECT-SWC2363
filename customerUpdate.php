<html>
<head>
    <title> Foodkies Friendlies Customer Relationship Customer System </title>
</head>
<body>
    <?php
    //call file to connect server foodkies friendlies
    include ("header.php");
    ?>

    <h2> Edit Customer Record </h2>

    <?php
    //look for a valid customer ID, either through GET or POST
    if ((isset ($_GET['id'])) && (is_numeric($_GET['id'])))
    {
        $id = $_GET['id'];
    }
    else if ((isset ($_POST['id'])) && (is_numeric($_POST['id'])))
    {
        $id = $_POST['id'];
    }
    else
    {
        echo '<p class = "error"> This Page Has Been Accessed In Error. </p>';
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $error = array (); //Initialize an error array
    }

    //look for the customerName
    if (empty ($_POST ['customerName']))
    {
        $error [] = 'You are forgot to enter Your Name.';
    }
    else
    {
        $n = mysqli_real_escape_string ($connect, trim ($_POST ['customerName']));
    }

    //look for the customerEmail
    if (empty ($_POST ['customerEmail']))
    {
        $error [] = 'You are forgot to enter Your Email.';
    }
    else
    {
        $e = mysqli_real_escape_string ($connect, trim ($_POST ['customerEmail']));
    }

    //look for the customerPhoneNo
    if (empty ($_POST ['customerPhoneNo']))
    {
        $error [] = 'Your forgot to enter Your Phone Number.';
    }
    else
    {
        $ph = mysqli_real_escape_string ($connect, trim ($_POST ['customerPhoneNo']));
    }

    //look for a customerAddress
    if (empty ($_POST ['customerAddress']))
    {
        $error [] = 'You forgot to your Home Address. ';
    }
    else
    {
        $ad = mysqli_real_escape_string($connect, trim ($_POST ['customerAddress']));
    }

    //look for a customerMembership
    if (empty ($_POST ['customerMembership']))
    {
        $error [] = "Your forgot to enter your Foodkies Memberships";
    }
    else
    {
        $mm = mysqli_real_escape_string ($connect, trim ($_POST ['customerMembership']));
    }

        //if no problem occured
        if (empty($error))
        {
            $q = "SELECT customerID FROM customers WHERE customerName = '$n' AND customerID != $id";

            $result = @mysqli_query ($connect, $q); //run the query

            if (mysqli_num_rows($result) == 0)
            {
                $q = "UPDATE customers SET customerName = '$n', customerEmail = '$e',
                customerPhoneNo = '$ph', customerAddress = '$ad', customerMembership = '$mm'
                 WHERE customerID = '$id' LIMIT 1";

                $result = @mysqli_query ($connect, $q); //run the query

                if (mysqli_affected_rows($connect) == 1)
                {
                    echo '<script>alert("The Customer Has Been Edited");
                    window.location.href = "customerList.php"; </script>';
                }
                else
                {
                    echo '<p class = "error"> The Customer Has Not Been Edited Due To The System Error, 
                    We Apologized for Any Inconvenience. </p>';
                    echo '<p>' .mysqli_error($connect) .'<br/> query:' .$q. '</p>';
                }
            }
            else
            {
                echo '<p class = "error"> The ID has been Registered <p/>';
            }
        }
        else
        {
            echo '<p class ="error">The following error (s) occured: <br/>';
            foreach ($error as $msg)
            {
                echo "-msg<br>\n";
            }
            echo '<p><p>Sorry, Please try again.<p>';
        }

    

    $q = "SELECT customerName, customerEmail, customerPhoneNo, customerAddress, customerMembership
        FROM customers WHERE customerID = $id";

        $result = @mysqli_query ($connect, $q); //run the query

        if (mysqli_num_rows($result) == 1)
        {
            //get customer information
            $row = mysqli_fetch_array($result, MYSQLI_NUM);

           //create the form
            echo '<form action="customerUpdate.php" method ="post">
            <p><label class ="label" for="customerName">Customer Name*:</label>
            <input type="text" id="customerName" name="customerName" size ="30"
            maxlength="50" value="'.$row[0].'"></p>

            <p><br><label class ="label" for="customerEmail">Customer Email*:</label>
            <input type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" 
            id="customerEmail" name="customerEmail" size="30" maxlength="50" required
            value="'.$row[2].'"></p>
            
            <p><br><label class ="label" for="customerPhoneNo">Customer Phone No.*:</label>
            <input type="tel" pattern="[0-9]{3}-[0-9]{7}" id="customerPhoneNo"
            name="customerPhoneNo" size ="15" maxlength="20" value"'.$row[1].'"></p>

            <p><br><label class ="label" for="customerAddress">Customer Address*:</label>
            <input type="text" id="customerAddress" name="customerAddress" size="30"
            maxlength="50" value="'.$row[3].'"></textarea></p>

            <p><br><label class="label" for="customerMembership">Customer Membership:</label>
            <select name="customerMembership" id="customerMembership">
            <option value = "Yes">Yes</option>
            <option value = "no">No</option>
            </select></p>
            
            <br><p><input id="submit" type="submit" name="submit" value="Update"></p>
            <br><input type="hidden" name="id" value="'.$id.'"/>
            </form>';
        }
    else
    {//if it didnt't run
        //message
        echo '<p class ="error">This page has been accessed in error<p>';
    }//end of it (result)
    mysqli_close($connect);//close the database connection_aborted
    ?>
        
</body>