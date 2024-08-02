

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
                        <a href="Account.php"> <p>Account</p> </a>
                    </ul>
                </nav>
            </div>
        </div>
        
        <div class="col-sm-4">
            <h1> <a href="./index.php"><b>NICECrocs Design</b></a></h2>
        </div>
        <div class="col-sm-4">
        <h2> <a href="./login.php"><b>Sign In</b></a></h2> 
        </div>
    </div>
</header>

<body>

<?php
include_once("../model/api.php");
session_start();
if (isset($_SESSION["keys"])) {
    $keys = $_SESSION["keys"];
} else {
    $keys = getKeys();
}

if ($_POST["success"] != "")
echo '
    <br><br><br>
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

$json_data = $keys;
$data = json_decode($json_data, true);

foreach ($data as $item) {

    echo '<div class="col-lg-6 col-md-6 col-sm-4">' ;
	echo '<h1>'.$item['title'].'</h1>';
    echo '<p>Platform:'.$item['platform'] .'</p>';
	echo '<p>Price: '.$item['credits'] .'</p>';
	echo '<p>Date uploaded: '.$item['upload_date'] .'</p>';
    $key_id = $item['id'];
    echo '<form action="../controller/buy_key.php" method="post">
        <input type="hidden" name="keyid" value="'.$key_id.'"/>
        <input class="quarterSize" type="submit" value="Buy" />
    </form>';
    echo '<br>';
	echo '</div>' ;
	echo '</div>' ;
	echo '</div>' ;

}
?>




</body>






<div id="footer">
<?php include 'footer.php';?>
</div>

</hmtl>