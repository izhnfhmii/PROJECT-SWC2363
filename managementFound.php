<html>
<head>
    <title> Foodkies Friendlies Customer Relationship Management System </title>
</head>
<body>
    <?php
    // Call file to connect server foodkies friendlies
    include("header.php");

    // Check if the form was submitted
    if(isset($_POST['managementName'])) {
        $in = $_POST['managementName'];
        $in = mysqli_real_escape_string($connect, $in);

        // Make the query
        $q = "SELECT managementID, managementPassword, managementName,
        managementEmail, managementPhoneNo FROM management WHERE managementName ='$in'
        ORDER BY managementID";

        // Run the query and assign it to the variable $result
        $result = mysqli_query($connect, $q);

        // Check if query executed successfully
        if ($result) {
            // Table heading
            echo '<h2> Search Result </h2>';
            echo '<table border="2">
                <tr>
                    <td align="center"> <strong> ID </strong> </td>
                    <td align="center"> <strong> NAME </strong> </td>
                    <td align="center"> <strong> EMAIL </strong> </td>
                    <td align="center"> <strong> PHONE NO </strong> </td>
                </tr>';

            // Fetch and print all the records
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo '<tr>
                    <td>'.$row['managementID'].'</td>
                    <td>'.$row['managementName'].'</td>
                    <td>'.$row['managementEmail'].'</td>
                    <td>'.$row['managementPhoneNo'].'</td>
                </tr>';
            }

            // Close the table
            echo '</table>';
            // Free up the resources
            mysqli_free_result($result);
        } else {
            // Error message
            echo '<p class="error"> If no record is shown, this is because you had an incorrect or missing entry in the search form. <br> Click the back button on the browser and try again.</p>';

            // Debugging message
            echo '<p>' . mysqli_error($connect) . '<br><br/>Query:' . $q . '</p>';
        }
    }

    // Close the database connection
    mysqli_close($connect);
    ?>

    <style>
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

    <div class="row">
        <p align="center"><a href="Foodkies Management HomePages.php"><button class="darkred-button button1">Exit</button></a></p>
    </div>
</body>
</html>
