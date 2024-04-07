<html>
<head>
    <title> Foodkies Friendlies Customer Relationship Customer System </title>
</head>
<body>
    <?php
    //call file to connect server foodkies friendlies
    include ("header.php");
    ?>
    
    <h2 align = "center"> Customer List </h2>

    <style>
        body 
        {
        background-image: url("FoodkiesBackground.jpg");
		background-color: #cccccc;
        }
        .container {
            margin: 0 auto;
            width: 80%; /* Adjust width as needed */
        }
        table {
            margin: 0 auto;
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

    .button1 {width: 200px;}
    </style>

    <?php
        //make the query
        $q= "SELECT customerID, customerPassword, customerName, customerEmail, customerPhoneNo, customerAddress, customerMembership
            FROM customers ORDER BY customerID";

            //run the query and assign it to the variable $result
            $result = @mysqli_query ($connect, $q);

            if ($result)
            {
                //Table heading
                echo '<table border = "2">
                <tr>
                <td align = "center"> <strong> ID </strong> </td>
                <td align = "center"> <strong> NAME </strong> </td>
                <td align = "center"> <strong> EMAIL </strong> </td>
                <td align = "center"> <strong> PHONE NO </strong> </td>
                <td align = "center"> <strong> ADDRESS </strong> </td>
                <td align = "center"> <strong> MEMBERSHIP </strong> </td>
                <td align = "center"> <strong> UPDATE </strong> </td>
                <td align = "center"> <strong> DELETE </strong> </td>
                </tr>';

                //Fetch and print all the records
                while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
                {
                    echo '<tr>
                    <td>'.$row['customerID'].'</td>
                    <td>'.$row['customerName'].'</td>
                    <td>'.$row['customerEmail'].'</td>
                    <td>'.$row['customerPhoneNo'].'</td>
                    <td>'.$row['customerAddress'].'</td>
                    <td>'.$row['customerMembership'].'</td>
                    <td align="center"><a href="customerUpdate.php?id='.$row['customerID'].'">Update</a></td>
                    <td align="center"><a href="customerDelete.php?id='.$row['customerID'].'">Delete</a></td>
                    </tr>';
                }
                //close the table
                echo '</table>';

                //free up the resources
                mysqli_free_result ($result);
                //if failed to run
                }
                else
                {
                    //error message
                    echo '<p class ="error"> The current user could not be retrieved.
                    We apologize for any inconvenience.</p>';

                    //debugging message
                    echo '<p>'.mysqli_error ($connect).'<br><br/>Query:'.$q.'</p>';
            
            } //end of if ($result)
            //close the datebase connection
            mysqli_close($connect);

?>

    <div class="row">
        <p align="center"><a href="Foodkies Management HomePages.php"><button class="darkred-button button1">Exit</button></a></p>
    </div>
</div>
</div>
</body>
</html>