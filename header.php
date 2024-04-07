<html>
<head>
    <title> Foodkies Friendlies Database Connection </title>
</head>
<body>
    <?php

    //connect to server
    $connect = mysqli_connect("localhost", "root", "", "foodkies friendlies");

    if (!$connect)
    {
        die ('ERROR:' .mysqli_connect_error());
    }

    ?>
</body>
</html>