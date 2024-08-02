<?php
include "model/connection.php";
session_start();
try{
    $conn = getDatabaseConnection();
    $prepSQL = $conn->prepare("SELECT is_admin FROM USER WHERE id = ?");//gets the is admin checker
    $prepSQL->bind_param("s", $_SESSION['name']);
    $prepSQL->execute();
    $result = $prepSQL->get_result();
    echo $result; //gets the result back to the js file that called it
}

catch (Exception $exception) {
    echo $exception;
    die($exception->getMessage());
}
?>