<html>

<head>  
    <meta charset="utf-8">
    <title>CMP306 - Web Services Development</title>
    <meta name="description" content="sample HTML 5 page">
    <meta name="viewport"content="width=device-width, initial-scale=1"><link rel="stylesheet"href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"> </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style3.css">
    <link href='https://fonts.googleapis.com/css?family=Righteous' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <script src="Ajax.js"></script>
    <script src="server_side_functions.js"></script>
    <script src="loading_admin.js"></script>

    <script>
        function Func1() {
            document.getElementById("payment1").style.borderColor = "FF0044";
            document.getElementById("payment2").style.borderColor = "111133";
            document.getElementById("payment3").style.borderColor = "111133";
            document.getElementById("Total").innerHTML = "£15";
        }
        function Func2() {
            document.getElementById("payment2").style.borderColor = "FF0044";
            document.getElementById("payment1").style.borderColor = "111133";
            document.getElementById("payment3").style.borderColor = "111133";
            document.getElementById("Total").innerHTML = "£10";
        }
        function Func3() {
            document.getElementById("payment3").style.borderColor = "FF0044";
            document.getElementById("payment2").style.borderColor = "111133";
            document.getElementById("payment1").style.borderColor = "111133";
            document.getElementById("Total").innerHTML = "£5";
        }
        function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
        }

        function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
        }
    </script>

</head>

<header>
    <div class="row">
        <div class="col-sm-4">
            <div class="navbar">
                <nav>
                    <ul>
                        <a href="./index.php"> <p>Browse</p> </a>
                        <a href="./keys.php"> <p>Keys</p> </a>
                        <a href="./about.php"> <p>About</p> </a>
                    </ul>
                </nav>
            </div>
        </div>
        
        <div class="col-sm-4">
            <h1> <a href="./index.php"><b>NICECrocs Design</b></a></h2>
        </div>

    </div>
</header>
<body>

<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="#Details">Details</a>
  <a href="#payment">Payments</a>
  <a href="#history">History</a>
  <a href="#SubmitKey">Submit Key</a>
  <a href="#contact" onclick="$_SESSION['name'] = 'NULL'">Sign Out</a>
  <a id="admin" herf ="./admin.php">Admin pannel</a>
</div>
<br><br> <br><br> 
<body>
<div id="main" class="row">
<div class="col-sm-3">
    </div>
    <div class="col-sm-6">
        <button class="openbtn" onclick="openNav()">☰ Jump to</button>  
    </div>
</div>

<?php

session_start();
if (!isset($_SESSION["name"] ) || $_SESSION["name"] == "")
    echo "<script>location.href='../view/login';</script>";

    if ($_POST["success"] != "")
        echo '
            <div class="row">
                <div class="col-sm-3">
                </div>

                <div class="col-sm-6">
                    <div class="history">
                        <h4>'.$_POST["success"].'</h4>
                    </div>
                </div>
            </div>

            <br><br><br>
        ';
        
?>

<div class="row">
    <div class="col-sm-3">
    </div>

    <div class="col-sm-6">

    
        <div class="form">
                <form id="edit_form">

                        <h1 id="Details">Account Details</h1>
                        <h4>Member Status:</h4>

                        <input class="lengthy" type="text" id="Username" style="width: 100%" name="Username" placeholder="edit username..">
                        <br><br>
                        <input class="lengthy" type="text" id="email" style="width: 100%" name="email" placeholder="edit email..">
                        <br><br>
                        <input class="lengthy" type="number" id="mobile" name="mobile" placeholder="edit mobile..">
                        <br><br>
                        <input class="lengthy" type="password" id="Password" name="Password" placeholder="edit password..">
                        <br><br>
                        <input class="lengthy" type="password" id="CPassword" name="confirmPassword" placeholder="confirm password..">
                        <br><br>
                    

                        <input class="fullSize" type="submit" value="Confirm">
                </form>
                </div>
            <div class="col-sm-3">
        </div>
    </div>
</div>
<br><br><br>

<div class="row">
    <div class="col-sm-3">
    </div>

    <div class="col-sm-6">
        <div class="payment">
                <h1 id="payment">Payments</h1>
                <h4>Member Status:</h4>

 
                <form id="key_form">

                        <input class="lengthy" type="text" id="cardName" style="width: 100%" name="cardName" placeholder="Cardholder name">
                        <br><br>
                        <input class="lengthy" type="text" id="cardNum" style="width: 100%" name="cardNum" placeholder="Card number">
                        <br><br>
                        <input class="shortened" type="date" id="expiryDate" name="expiryDate" placeholder="Expiry Date">
                        <input class="shortened" type="CVC" id="CVC" name="CVC" maxlength="3" placeholder="CVC">
                        <br><br>

                        <h4>Total: </h4><h4 id="Total">£0</h4>
                    

                        <input class="fullSize" type="submit" value="Confirm">
                </form>
                </div>
            <div class="col-sm-3">
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-3">
    </div>

    <div class="col-sm-2">
        <div id="payment1" class="payment">
                <h4>Option 1<h4>
                <p>This the first option</p>
                <p>£15</p>
                <button id="button1" type="button" onclick="Func1()">Select</button>
                </div>
    </div>
    <div class="col-sm-2">
        <div id="payment2" class="payment">
                <h4>Option 2<h4>
                <p>This the second option</p>
                <p>£10</p>
                <button id="button2" type="button" onclick="Func2()">Select</button>
                </div>
    </div>
    <div class="col-sm-2">
        <div id="payment3" class="payment">
                <h4>Option 3<h4>
                <p>This the third option</p>
                <p>£5</p>
                <button id="button3" type="button" onclick="Func3()">Select</button>
                </div>
    </div>
    
</div>
<br><br><br>


<div class="row">
    <div class="col-sm-3">
    </div>

    <div class="col-sm-6">
        <div class="history">
            <h1 id="history">History</h1>
            <form action="searchTransactions.php"
                    method="get">

                        <input class="seventyFive" type="text" style="width: 75%" id="gameTitle" name="gameTitle" placeholder="Game Title">             
                        <input class="quarterSize" type="submit" value="Search">
                </form>
                </div>
            <div class="col-sm-3">
        </div>
    </div>
</div>
<br><br><br>


<div class="row">
    <div class="col-sm-3">
    </div>

    <div class="col-sm-6">
        <div class="submitkey">
                <h1 id="SubmitKey">Submit Key</h1>

                <form action="../controller/donate_key.php"
                    method="post">

                        <input class="lengthy" type="text" style="width: 100%" id="gameTitle" name="gameTitle" placeholder="Game Title">
                        <br><br>
                        <input class="lengthy" type="text" style="width: 100%" id="platform" name="platform" placeholder="Platform">  
                        <br><br>  
                        <input class="lengthy" type="text" style="width: 100%" id="price" name="price" placeholder="Price">   
                        <br><br>  
                        <input class="lengthy" type="text" style="width: 100%" id="Key" name="Key" placeholder="Key">
                        <br><br>


                        <input class="fullSize" type="submit" value="Submit">
                </form>



                </div>
            <div class="col-sm-3">
        </div>
    </div>
</div>
<br><br><br>
<div class="row">
    <div class="col-sm-3">
    </div>

    <div class="col-sm-6">
    <button class="fullSize" onclick="window.location.href='./admin.php'">Admin Area</button>
            <div class="col-sm-3">
        </div>
    </div>
</div>
    





</body>
<?php



?>

<div id="footer">
<?php include 'footer.php';?>
</div>

</hmtl>