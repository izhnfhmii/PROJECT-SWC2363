<html>
<head>
    <title> Foodkies Friendlies Customer Relationship Management System </title>
</head>
<body>
    <?php
    //call file to connect server foodkies friendlies
    include ("header.php");
    ?>

    <h2 align = "center"> Delete Management Record </h2>

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

    if ($_SERVER['REQUEST_METHOD']== 'POST')
    {
        if ($_POST['sure'] == 'Yes')//Delete The Record
        {
            //make the query
            $q = "DELETE FROM management WHERE managementID = $id LIMIT 1";
            $result = @mysqli_query ($connect, $q); //run the query

            if (mysqli_affected_rows($connect) == 1) //if there was a problem
            //display message
            {
                echo '<script>Alert("The Management has been Deleted");
                window.location.href="managementList.php";</script>';
            }
            else
            {
                //display error message
                echo '<p class = "error"> The record could no been deleted.<br>
                Probably because it does not exist or due to the system error.</p>';

                echo '<p>' .mysqli_error($connect). '<br/> Query: '.$q. '</p>';
                //debugging message
            }
        }
        else
            {
                echo '<script>alert("The Management has NOT been deleted");
                window.location.href="managementList.php";</script>';
            }
    }
    else
    {
        //display the form
        //Retrieve the member's data

        $q = "SELECT managementName FROM management WHERE managementID = $id";
        $result = @mysqli_query($connect, $q); //run the query

        if (mysqli_num_rows($result) ==1)
        {
            //get management information
            $row = mysqli_fetch_array($result, MYSQLI_NUM);
            echo "<h3>Are you sure that to permanently delete $row[0]? </h3>";
            echo '<form action = "managementDelete.php" method = "post">
            <input id ="submit-no" type="submit" name="sure" value="Yes">
            <input id ="submit-no" type="submit" name="sure" value="No">
            <input type = "hidden" name="id" value="'.$id.'">
            </form>';
        }
        else
        {
            //if it didn't run
            //message
            echo '<p class ="error"> This pass has been accessed in error<p>';
            echo '<p>&nbsp;</p>';
        } //end of it (result)
    }
    mysqli_close($connect); //close the database connection_aborted
    ?>
</body>
</html>