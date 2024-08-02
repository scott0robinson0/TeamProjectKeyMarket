<?php

include "connection.php";

try {
    $conn = getDatabaseConnection();
    $data = json_decode(file_get_contents('php://input'), true);
    $name = mysqli_real_escape_string($conn, $data['name']);
    $password = $data['pass'];
    $error = "Incorrect username and password";
    
    $prepSQL = $conn->prepare("SELECT * FROM USER WHERE username = ?");
    $prepSQL->bind_param("s", $name);
    $prepSQL->execute();
    $result = $prepSQL->get_result();
    $resultobj = $result->fetch_object();
    
    if ($result->num_rows == 0 || !password_verify($password, $resultobj->password)) {
        http_response_code(401);
        throw new Exception($error);
    } else {
        http_response_code(200);
        session_start();
        $_SESSION["name"] = $resultobj->id;
    }
    
    $result->close();
    $prepSQL->close();
    $conn->close();
} catch (Exception $exception) {
    http_response_code(401);
    die($exception->getMessage());
}

?>