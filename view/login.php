<html>

<head>  
    <title>CMP306 - Web Services Development</title>
    <meta name="description" content="sample HTML 5 page">
    <meta name="viewport"content="width=device-width, initial-scale=1"><link rel="stylesheet"href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"> </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Righteous' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <link rel="stylesheet" href="style2.css">
<!--The HTML encoding that will be used-->
<meta charset="utf-8">
<!-- Bootsrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Bootsrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!--Jquery CDN-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!--My CSS and JS-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="Ajax.js"></script>
    <script src="server_side_functions.js"></script>
    
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
        <div class="col-sm-4">
        <h2> <a href="./login.php"><b>Sign In</b></a></h2> 
        </div>
    </div>
</header>
<div id="alertBox" class="alert alert-success d-none" role="alert">


</div>
<br><br> <br><br> 
<body>
<div class="row">
    <div class="col-sm-3">
    </div>

    <div class="col-sm-6">

        <div id="login_form"class="form">
            <form>
                <h1>Login</h1>

                <input type="text" id="Username" name="Username" placeholder="Your username.." required>
                <br><br>
                <input type="Password" id="Password" name="Password" placeholder="Your password.." required>
                <br><br>
            

                <input type="submit" value="Log in">
            </form>
        </div>
    <div class="col-sm-3">
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <p> <center> Don't have an account? <center></p>
        <p> <center> <a class="redText" href="./register.php">Register</a> <center> </p>
    </div>
</div>
    
    



</body>
<?php



?>
<div id="footer">
<?php include 'footer.php';?>
</div>
</hmtl>