<html>
<?php
session_start();

?>
<head>  
    <meta charset="utf-8">
    <title>CMP306 - Web Services Development</title>
    <meta name="description" content="sample HTML 5 page">
    <meta name="viewport"content="width=device-width, initial-scale=1"><link rel="stylesheet"href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"> </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Righteous' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <link rel="stylesheet" href="styles.css">
    <script src="Ajax.js"></script>
    <script src="server_side_functions.js"></script>
</head>

<body onload="isUserLogin('<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : 'NULL' ?>')">

<header>
    <div class="row">
        <div class="col-sm-4">
            <div class="navbar">
                <nav>
                    <ul>
                        <a href="index.php"> <p>Browse</p> </a>
                        <a href="keys.php"> <p>Keys</p> </a>
                        <a href="Account.php"> <p>Account</p> </a>
                        <a href="about.php"> <p>About</p> </a>
                    </ul>
                </nav>
            </div>
        </div>
        
        <div class="col-sm-4">
            <h1> <b> NiceCROCS Design </b> </h2>
        </div>
        <div class="col-sm-4">
            <div id="login_btn">
            <a href="login.php"> <h1> <b> Sign In </b> </h2> </a>
            </div>
            <div id="account_btn">
            <a href="Account.php"> <h1> <b> view account </b> </h2> </a>
            </div>
        </div>
    </div>
    
    <br> <br>

    <div class="row">
    <center> <h1 class="redText"> Find Your Next Game </h2> </center>
    <center> <p> Search our extensive game library with hundreds of game keys </p> </center>
    </div>
    <div class="row">
        <div class="search-container">
            <center>
            <form action="../controller/search_keys.php" method="post">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit">Search</button>   
            </form>
            </center>
        </div>
    </div>
    <br><br> <br><br> 
</header>




<br><br> <br><br>


<div class="row">
    <div class="col-sm-2"> </div>
    <div class="col-sm-6"> <h1> Browse </h1> </div>
    <!--<div class="col-sm-3"> <center> <h3> Filters <img src="../images/filters.PNG"; width=35px; height=35px;> </img> </h1> </center></div>-->
    <div class="col-sm-2"> </div>
</div> 
<?php
include_once("../model/api.php");
$previews = json_decode(getPreviews());
//echo"<pre>".json_encode($previews[0], JSON_PRETTY_PRINT)."</pre>";
?>
<div class="row">
    <div class="col-sm-2">
        
    </div>
    <div class="col-sm-2">
        <?php 
        echo '<img class="img-fluid" width=200px, height=200px, src='.$previews[0] -> coverImageSrc.'></img>';
        echo '<h3> '.$previews[0] -> name.'</h3>';
        echo '<h5> '.$previews[0] -> platform.'</h3>';
        echo '<h5> '.$previews[0] -> credits.' Credits</h3>';
        echo '<h5> '.round($previews[0] -> rating).'/100</h5>';
        ?>
    </div>
    <div class="col-sm-1">
        
    </div>
    <div class="col-sm-2">
    <?php 
        echo '<img class="img-fluid" width=200px, height=200px, src='.$previews[1] -> coverImageSrc.'></img>';
        echo '<h3> '.$previews[1] -> name.'</h3>';
        echo '<h5> '.$previews[1] -> platform.'</h3>';
        echo '<h5> '.$previews[1] -> credits.' Credits</h3>';
        echo '<h5> '.round($previews[1] -> rating).'/100</h5>';
        ?>
    </div>
    <div class="col-sm-1">
        
    </div>
    <div class="col-sm-2">
    <?php 
        echo '<img class="img-fluid" width=200px, height=200px, src='.$previews[2] -> coverImageSrc.'></img>';
        echo '<h3> '.$previews[2] -> name.'</h3>';
        echo '<h5> '.$previews[2] -> platform.'</h3>';
        echo '<h5> '.$previews[2] -> credits.' Credits</h3>';
        echo '<h5> '.round($previews[2] -> rating).'/100</h5>';
        ?>
    </div>
    <div class="col-sm-2">

    </div>
</div>

<br>

<div class="row">
    <div class="col-sm-2">
        
    </div>
    <div class="col-sm-2">
    <?php 
        echo '<img class="img-fluid" width=200px, height=200px, src='.$previews[3] -> coverImageSrc.'></img>';
        echo '<h3> '.$previews[3] -> name.'</h3>';
        echo '<h5> '.$previews[3] -> platform.'</h3>';
        echo '<h5> '.$previews[3] -> credits.' Credits</h3>';
        echo '<h5> '.round($previews[3] -> rating).'/100</h5>';
        ?>
    </div>
    <div class="col-sm-1">
        
    </div>
    <div class="col-sm-2">
    <?php 
        echo '<img class="img-fluid" width=200px, height=200px, src='.$previews[4] -> coverImageSrc.'></img>';
        echo '<h3> '.$previews[4] -> name.'</h3>';
        echo '<h5> '.$previews[4] -> platform.'</h3>';
        echo '<h5> '.$previews[4] -> credits.' Credits</h3>';
        echo '<h5> '.round($previews[4] -> rating).'/100</h5>';
        ?>
    </div>
    <div class="col-sm-1">
        
    </div>
    <div class="col-sm-2">
    <?php 
        echo '<img class="img-fluid" width=200px, height=200px, src='.$previews[5] -> coverImageSrc.'></img>';
        echo '<h3> '.$previews[5] -> name.'</h3>';
        echo '<h5> '.$previews[5] -> platform.'</h3>';
        echo '<h5> '.$previews[5] -> credits.' Credits</h3>';
        echo '<h5> '.round($previews[5] -> rating).'/100</h5>';
        ?>
    </div>
    <div class="col-sm-2">

    </div>
</div>

<br>

<div class="row">
    <div class="col-sm-2">
        
    </div>
    <div class="col-sm-2">
    <?php 
        echo '<img class="img-fluid" width=200px, height=200px, src='.$previews[6] -> coverImageSrc.'></img>';
        echo '<h3> '.$previews[6] -> name.'</h3>';
        echo '<h5> '.$previews[6] -> platform.'</h3>';
        echo '<h5> '.$previews[6] -> credits.' Credits</h3>';
        echo '<h5> '.round($previews[6] -> rating).'/100</h5>';
        ?>
    </div>
    <div class="col-sm-1">
        
    </div>
    <div class="col-sm-2">
    <?php 
        echo '<img class="img-fluid" width=200px, height=200px, src='.$previews[7] -> coverImageSrc.'></img>';
        echo '<h3> '.$previews[7] -> name.'</h3>';
        echo '<h5> '.$previews[7] -> platform.'</h3>';
        echo '<h5> '.$previews[7] -> credits.' Credits</h3>';
        echo '<h5> '.round($previews[7] -> rating).'/100</h5>';
        ?>
    </div>
    <div class="col-sm-1">
        
    </div>
    <div class="col-sm-2">
    <?php 
        echo '<img class="img-fluid" width=200px, height=200px, src='.$previews[8] -> coverImageSrc.'></img>';
        echo '<h3> '.$previews[8] -> name.'</h3>';
        echo '<h5> '.$previews[8] -> platform.'</h3>';
        echo '<h5> '.$previews[8] -> credits.' Credits</h3>';
        echo '<h5> '.round($previews[8] -> rating).'/100</h5>';
        ?>
    </div>
    <div class="col-sm-2">

    </div>
</div>


<div id="footer">
<?php include 'footer.php';?>
</div>
</body>
</hmtl>
