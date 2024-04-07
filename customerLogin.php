<html>
<head>
    <title> Foodkies Friendlies Customer Relationship Management System </title>
</head>
	
	<style>
		body  {
		  background-image: url("FoodkiesBackground.jpg");
		  background-color: #cccccc;
		}
		
		a:link, a:visited {
		  background-color: #0DFF00;
		  color: white;
		  padding: 14px 25px;
		  text-align: center;
		  text-decoration: none;
		  display: inline-block;
		}

		a:hover, a:active {
		  background-color: greenyellow;
		}
	</style>

<body>
    <?php
    //call file to connect server foodkies friendlies
    include ("header.php");
    ?>

    <?php
    //This section processes submission from the login form
    //Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        //Validate the customerID
        if (!empty($_POST['customerID']))
        {
            $id = mysqli_real_escape_string($connect, $_POST['customerID']);
        }
        else
        {
            $id = FALSE;
            echo '<p class ="error"> You Are Forgot To Put And Enter Your Own ID. </p>';
        }

        //validate the customerPassword
        if (!empty($_POST['customerPassword']))
        {
            $p = mysqli_real_escape_string($connect, $_POST['customerPassword']);
        }
        else
        {
            $p = FALSE;
            echo '<p class ="error"> You Are Forgot To Enter Your Own Password. </p>';
        }

        //if it had no problems 
        if ( $id && $p )
        {
            //Retrieve the customerID, customerPassword, customerName, customerEmail, customerPhoneNo, customerAddress, customerMembership
            $q = "SELECT customerID, customerPassword, customerName, customerEmail, customerPhoneNo, customerAddress, customerMembership
            FROM customers WHERE (customerID = '$id' AND customerPassword = '$p')";

            //run the query and assign it to the variable result
            $result = mysqli_query ($connect, $q);

            //count the number of rows that match the customerID/customerPassword combination 
            //if one database row (record) matches the input:
            if (@mysqli_num_rows ($result)==1)
            {
                session_start();
                $_SESSION = mysqli_fetch_array($result, MYSQLI_ASSOC);
            
                echo '<p align="center"> Welcome to Foodkies, Your Food Website Delicacy ! </p>';
                echo '<p align="center"><a href = "Foodkies Customer Login Details.php?custID='.$_SESSION['customerID'].'" target="_blank"> Click Here';
            
            //cancel the Rest of the script

            mysqli_free_result($result);
            mysqli_close($connect);
            //no match was made
            exit();
    }
    else
    {
        echo '<p class="error"> The customerID and customerPassword Input Entered But It Do Not Match With The Records 
        <br> Perhaps You Need To Make A New Register, Just Click The Register Button Below</p>';
    }

    //if there was a problems
   
}
else 
{
     echo '<p class="error">Please try again.</p>';
}
    mysqli_close($connect);
    }
//end of submit conditional
?>
	
    <h2 align="center"> Customers Login Sections </h2>

    <form action="customerLogin.php" method="post">
    <div>
        <p align = "center"> <label for = "customerID"> Customer ID : </label>
        <input type = "text" id = "customerID" name = "customerID" size = "4" maxlength = "6"
        value = "<?php if (isset($_POST['customerID'])) echo $_POST ['customerID'];?>"> </p>
    </div>

    <div>
        <p align = "center"> <label for = "customerPassword"> Your Password: </label>
        <input type = "password" id = "customerPassword" name = "customerPassword" size = "10" maxlength = "60"
        pattern = "(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title = "Must Contain At Least One Number and One Uppercase
        and Lowercase Letter, and At Least 8 or More Characters" 
        required value = "<?php if (isset($_POST['customerPassword'])) echo $_POST ['customerPassword'];?>"> </p>
    <div>
    
    <div align="center">
    <button type="submit" name="login">Login</button>
    <button type="reset">Reset</button>
    </div>

    <div>
        <p align = "center"> <label> Don't have an account?
            <a href = "customerRegister.php"> Sign Up </a>
        </label> </p>
</div>
</form>
</body>
</html>