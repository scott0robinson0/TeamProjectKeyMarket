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
    <link href='https://fonts.googleapis.com/css?family=Righteous' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <link rel="stylesheet" href="styles.css">
</head>

<header>
    <div class="row">
        <div class="col-sm-4">
            <div class="navbar">
                <nav>
                    <ul>
                        <a href=""> <p>Browse</p> </a>
                        <a href=""> <p>Keys</p> </a>
                        <a href=""> <p>About</p> </a>
                    </ul>
                </nav>
            </div>
        </div>
        
        <div class="col-sm-4">
            <h1> <b> NiceCROCS Design </b> </h2>
        </div>
        <div class="col-sm-4">
            <h1> <b> Sign In </b> </h2>
        </div>
    </div>
    
    <br> <br>

    <br><br> <br><br> 
</header>




<br><br> <br><br> 



<?php
include_once("../model/api_igdb.php");
// $gameId = $_POST["gameId"];
$gameId = 123;
echo "<pre>".getGameById($gameId)."</pre>";
?>

</hmtl>