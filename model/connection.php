<?php

function getDatabaseConnection() {
    //  Database connections
    $servername = "lochnagar.abertay.ac.uk";
    $username = "sqlcmp308gp2205";
    $password = "33MVcA3ZZ6G2";
    $database = "sqlcmp308gp2205";
    $conn = mysqli_connect($servername,$username,$password,$database);
    // Check connection
    if (mysqli_connect_errno()) {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }
    return $conn ;
}

?>