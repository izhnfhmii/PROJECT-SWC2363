<html>
<head>
    <title> Foodkies Friendlies Customer Relationship Customer System </title>
</head>
<body>
    <?php
    //call file to connect server foodkies friendlies
    include ("header.php");
    ?>

    <h2> Edit Management Record </h2>

    <?php
    //look for a valid management ID, either through GET or POST
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

    //look for the managementName
    if (empty ($_POST ['managementName']))
    {
        $error [] = 'You are forgot to enter Your Name.';
    }
    else
    {
        $n = mysqli_real_escape_string ($connect, trim ($_POST ['managementName']));
    }

    //look for the managementEmail
    if (empty ($_POST ['managementEmail']))
    {
        $error [] = 'You are forgot to enter Your Email.';
    }
    else
    {
        $e = mysqli_real_escape_string ($connect, trim ($_POST ['managementEmail']));
    }

    //look for the managementPhoneNo
    if (empty ($_POST ['managementPhoneNo']))
    {
        $error [] = 'Your forgot to enter Your Phone Number.';
    }
    else
    {
        $ph = mysqli_real_escape_string ($connect, trim ($_POST ['managementPhoneNo']));
    }

        //if no problem occured
        if (empty($error))
        {
            $q = "SELECT managementID FROM management WHERE managementName = '$n' AND managementID != $id";

            $result = @mysqli_query ($connect, $q); //run the query

            if (mysqli_num_rows($result) == 0)
            {
                $q = "UPDATE management SET managementName = '$n', managementEmail = '$e',
                managementPhoneNo = '$ph' WHERE managementID = '$id' LIMIT 1";

                $result = @mysqli_query ($connect, $q); //run the query

                if (mysqli_affected_rows($connect) == 1)
                {
                    echo '<script>alert("The Management Has Been Edited");
                    window.location.href = "managementList.php"; </script>';
                }
                else
                {
                    echo '<p class = "error"> The Management Has Not Been Edited Due To The System Error, 
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

    

    $q = "SELECT managementName, managementEmail, managementPhoneNo
        FROM management WHERE managementID = $id";

        $result = @mysqli_query ($connect, $q); //run the query

        if (mysqli_num_rows($result) == 1)
        {
            //get management information
            $row = mysqli_fetch_array($result, MYSQLI_NUM);

           //create the form
            echo '<form action="managementUpdate.php" method ="post">
            <p><label class ="label" for="managementName">Management Name*:</label>
            <input type="text" id="managementName" name="managementName" size ="30"
            maxlength="50" value="'.$row[0].'"></p>

            <p><br><label class ="label" for="managementEmail">Management Email*:</label>
            <input type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" 
            id="managementEmail" name="managementEmail" size="30" maxlength="50" required
            value="'.$row[2].'"></p>
            
            <p><br><label class ="label" for="managementPhoneNo">Management Phone No.*:</label>
            <input type="tel" pattern="[0-9]{3}-[0-9]{7}" id="managementPhoneNo"
            name="managementPhoneNo" size ="15" maxlength="20" value"'.$row[1].'"></p>
            
            <br><p><input id="submit" type="submit" name="submit" value="Update"></p>
            <br><input type="hidden" name="id" value="'.$id.'"/>
            </form>';
        }
    else
    {//if it didn't run
        //message
        echo '<p class ="error">This page has been accessed in error<p>';
    }//end of it (result)
    mysqli_close($connect);//close the database connection_aborted
    ?>
        
</body>