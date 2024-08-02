<?php
//dependences
session_start();
include "model/connection.php";


try {
    http_response_code(406); //assumes that the data is wrong
    $data = json_decode(file_get_contents('php://input'), true); //get the json
    $title = mysqli_real_escape_string($conn, $data['title']);
    $platform = mysqli_real_escape_string($conn, $data['platform']);
    $price = mysqli_real_escape_string($conn, $data['price']);
    $key = mysqli_real_escape_string($conn, $data['key']);
    $date = date("Y/m/d");
    $error = new stdClass();
    $error->err = "NULL";
    $prepSQL = $conn->prepare("INSERT INTO GAME_KEY(_key,owner_id,title,platform,credits,upload_date)VALUES(?,?,?,?,?,?)");
    $prepSQL->bind_param("sissis", $key, $_SESSION['name'],$title,$platform,$price,$date);
    if ($prepSQL->execute()) {
        $error->err = "NULL";
        http_response_code(200); //OK status code
    } else {
        $error->errs = $prepSQL->error_get_last;
    }
    // Clean up the SQL connection and statement
    $prepSQL->close();
    mysqli_close($conn);
}
 catch (Exception $exception) {
    die($exception->getMessage());
}


?>