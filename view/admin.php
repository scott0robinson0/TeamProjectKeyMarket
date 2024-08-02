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
    <script src="table_generator.js"></script>

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
            <h1> Admin </h1>
        </div>
    </div>
</header>
<body>



<div class="row">
    <div class="col-sm-3">
    </div>

    <div class="col-sm-6">
        <h1>Accounts</h1>
        <!--Put code here to get all data from accounts-->
        <div id="account_table">

        </div>
    </div>
    <div class="col-sm-3">
    </div>
</div>
<br><br><br>

<div class="row">
    <div class="col-sm-3">
    </div>

    <div class="col-sm-6">
    <h1>Keys</h1>
        <!--Put code here to get all data from keys-->
        <div id="key_table">

        </div>
    </div>
    <div class="col-sm-3">
    </div>
</div>
<br><br><br>
<br>
<div class="row">
    <div class="col-sm-3">
    </div>

    <div class="col-sm-6">
    <h1>Transactions</h1>
        <!--Put code here to get all data from transactions-->
        <div id="transactions_table">

        </div>
    </div>
    <div class="col-sm-3">
    </div>
</div>
<br><br><br>

            
</div>
<br><br><br>

    





</body>
<div id="footer">
<?php include 'footer.php';?>
</div>

</hmtl>