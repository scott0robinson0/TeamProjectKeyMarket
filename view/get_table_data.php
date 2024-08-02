<?php
include "connection.php";

$functionName = $_GET['function'];//This is going to check wheather a function exisits and if it does run that code
if(function_exists($functionName)) {
  $result = call_user_func($functionName);
  echo json_encode($result);
}

function get_account_data(){//gets all the data from the user table

    $conn = getDatabaseConnection();//starts the connection
    $prepSQL = $conn->prepare("SELECT * FROM USER");//preps the satement
    $prepSQL->execute();//executes it the statement
    $result = $prepSQL->get_result();
    $rows = [];
    while($row = $result->fetch_object()) {
        $rows[] = $row;
    }

    $result->close();
    $prepSQL->close();
    $conn->close();

    return $rows;
}

function get_key_data(){//gets all the data from the user table

    $conn = getDatabaseConnection();//starts the connection
    $prepSQL = $conn->prepare("SELECT * FROM GAME_KEY");//preps the satement
    $prepSQL->execute();//executes it the statement
    $result = $prepSQL->get_result();
    $rows = [];
    while($row = $result->fetch_object()) {
        $rows[] = $row;
    }
    $result->close();
    $prepSQL->close();
    $conn->close();
    return $rows;
}
function get_purchase_data(){//gets all the data from the user table

    $conn = getDatabaseConnection();//starts the connection
    $prepSQL = $conn->prepare("SELECT * FROM PURCHASED_GAME_KEY");//preps the satement
    $prepSQL->execute();//executes it the statement
    $result = $prepSQL->get_result();
    $rows = [];
    while($row = $result->fetch_object()) {
        $rows[] = $row;
    }
    $result->close();
    $prepSQL->close();
    $conn->close();

    return $rows;
}

?>

