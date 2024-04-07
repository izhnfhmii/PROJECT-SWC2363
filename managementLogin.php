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
    //check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        //validate the managementID
        if (!empty($_POST['managementID']))
        {
            $id = mysqli_real_escape_string($connect, $_POST['managementID']);
        }
        else
        {
            $id = FALSE;
            echo '<p class = "error"> You Are Forgot To Put And Enter Your Own ID. </p>';
        }

        //validate the managementPassword
        if (!empty($_POST['managementPassword']))
        {
            $p = mysqli_real_escape_string($connect, $_POST['managementPassword']);
        }
        else
        {
            $p = FALSE;
            echo '<p class = "error"> You Are Forgot To Enter Your Own Password. </p>';
        }

        //if it had no problems
        if ( $id && $p )
        {
            //Retrieve the managementID, managementPassword, managementName, managementEmail, managementPhoneNo
            $q = "SELECT managementID, managementPassword, managementName, managementEmail, managementPhoneNo
            FROM management WHERE (managementID = '$id' AND
            managementPassword = '$p')";

            //run the query and assign it to the variable $result
            $result = mysqli_query ($connect, $q);

            //count the number of rows that match the managementID / managementPassword combination
            //if one database row (record) are matches with the input :
                if (@mysqli_num_rows ($result) == 1)
                {
                    //start the session, fetch the record and insert the three values in the array
                    session_start();
                    $_SESSION = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    echo '<p align="center"> Welcome to Foodkies, Your Food Website Delicacy ! </p>';
                    echo '<p align="center"><a href = "Foodkies Management HomePages.php" target="_blank"> Click Here';

                    //Cancel The Rest Of The Script
                    exit();

                    mysqli_free_result ($result);
                    mysqli_close ($connect);
                    //No Match Was Made
                }
                else
                {
                    echo '<p class = "error"> The managementID and managementPassword Input Entered But It Do Not Match With The Records
                    <br> Perhaps You Need To Make A New Register, Just Click The Register Button Below </p>';
                }
                //if there was a problems
        }
        else
            {
                echo '<p class = "error"> Sorry, Please Try Again. </p>';
            }
            mysqli_close ($connect);
    } //end of submit conditional
    ?>

    <h2 align = "center"> Management Login Sections </h2>

    <form action = "managementLogin.php" method = "post">
        <div>
            <p align = "center"> <label for = "managementID"> Management ID : </label> 
            <input type = "text" id = "managementID" name = "managementID" size = "4" maxlength = "6"
            value = "<?php if (isset($_POST['managementID'])) echo $_POST ['managementID'];?>"> </p>
        </div>

        <div>
            <p align = "center"> <label for = "managementPassword"> Your Password : </label>
            <input type = "password" id = "managementPassword" name = "managementPassword" size = "15" maxlength = "60"
            pattern = "(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title = "Must Contain At Least One Number and One Uppercase
            and Lowercase Letter, and At Least 8 or More Characters" 
            required value = "<?php if (isset($_POST['managementPassword'])) echo $_POST ['managementPassword'];?>"> </p>
        </div>

        <div>
            <p align = "center"> <button type = "submit"> Login </button>
            <button type = "reset"> Reset </button> </p>
        </div>

        <div>
            <p align = "center"> <label> Don't have an account ?
                <a href = "managementRegister.php"> Sign Up </a>
            </label> </p>
        </div>
</form>
</body>
</html>