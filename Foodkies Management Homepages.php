<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Foodkies Management Homepages</title>
<style> 
    .header {
        background-color: #C0C0C0;
        color: white;
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    .logo {
        font-size: 24px;
    }

    .nav-links {
        list-style-type: none;
        margin: 0;
        padding: 0;
        display: flex;
    }

    .nav-links li {
        margin-right: 20px;
    }

    .nav-links li:last-child {
        margin-right: 0;
    }

    .nav-links a {
        color: white;
        text-decoration: none;
    }

    .nav-links a:hover {
        color: #ff7a59;
    }
    
    /*For Align The Row Of Pictures*/
    * {
        box-sizing: border-box;
    }

    .column {
        float: left;
        width: 33.33%;
        padding: 5px;
    }

    /* Clearfix (clear floats) */
    .row::after {
        content: "";
        clear: both;
        display: table;
    }
    
    /* Background Image */
    body {
        background-image: url('FoodkiesBackground.jpg');
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
</head>
<body>
    <header class="header">   
        <p><a href="Foodkies Management HomePages.php"><img src="Foodkies.png" width="100" height="33"></a></p>
    </header>

    <h2 align="center"> Welcome To Management Site</h2>

    <div class="row">
        <p align="center"><a href="managementList.php"><button class="darkred-button button1">Management List</button></a></p>
    </div>

    <div class="row">
        <p align="center"><a href="managementSearch.php"><button class="darkred-button button1">Search Management</button></a></p>
    </div>

    <div class="row">
        <p align="center"><a href="customerList.php"><button class="darkred-button button1">Customers List</button></a></p>
    </div>

    <div class="row">
        <p align="center"><a href="customerSearch.php"><button class="darkred-button button1">Search Customers</button></a></p>
    </div>

    <div class="row">
        <p align="center"><a href="purchasingList.php"><button class="darkred-button button1">Purchasing List</button></a></p>
    </div>

</body>

<style>
    /* CSS to style the button */
    .green-button {
        background-color: greenyellow;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
    }

    /* Hover effect */
    .green-button:hover {
        background-color: green;
    }

    .button1 {width: 200px;}
</style>

<body>

    <div class="row">
        <p align="center"><a href="Foodkies Global HomePages.php"><button class="green-button button1">Log Out</button></a></p>
    </div>

</body>

	<style>
            /* CSS to style the footer */
            footer {
              background-color: #C0C0C0; /* Set your desired background color */
              padding: 20px;
              text-align: center;
              color: #333; /* Text color */
              font-size: 14px;
            }
        </style>		

    <footer>
        <p align="left"> © FOODKIES 2024. ALL RIGHTS RESERVED </p>
    </footer>
</html>
