<?php
//dependences
include "connection.php";
session_start();

try {
    $conn = getDatabaseConnection();
    http_response_code(406); //assumes that the data is wrong
    $data = json_decode(file_get_contents('php://input'), true); //get the json
    $name = mysqli_real_escape_string($conn, $data['name']);
    $email = mysqli_real_escape_string($conn, $data['email']);
    $phone = mysqli_real_escape_string($conn, $data['phone']);
    $password = $data['cleanPass'];
    $error = new stdClass();
    $error->err = "NULL";
    //this is to test to make sure there are no two users with the same name
    $prepSQL = $conn->prepare("SELECT username FROM USER WHERE username = ?");
    $prepSQL->bind_param("s", $name);
    $prepSQL->execute();
    $result = $prepSQL->get_result();

    if ($result->num_rows > 0) {
        $error->err = "User already exsists";
    }

    if ($error->err == "NULL") {
        $sql_statement = "UPDATE USER SET";

        if($name != "NULL"){//this will make sure we dont update any field that is not go an entry
            $sql_statement .= " username = ";//if there is an entry we append to the current sql statement
            $sql_statement .= $name;
        }
        if($email != "NULL"){
            $sql_statement .= " email = ";
            $sql_statement .= $email;
        }
        if($phone != "0000000000"){
            $sql_statement .= " phone = ";
            $sql_statement .= $phone;
        }
        if($password != ""){
            $options = [ 
                'cost' => 12,
            ];//this creates a salt
            $epass = password_hash($password, PASSWORD_BCRYPT, $options); //this will salt and hash the password
            $sql_statement .= " password = ";
            $sql_statement .= $epass;
        }
        
        $sql_statement .= "WHERE id = ";
        $sql_statement .= $_SESSION['name'];
        $prepSQL = $conn->prepare($sql_statement);
        if ($prepSQL->execute()) {
            $error->err = "NULL";
            http_response_code(200); //OK status code
        } else {
            $error->errs = error_get_last();
        }
        // Clean up the SQL connection and statement
        $prepSQL->close();
        mysqli_close($conn);
    } else {
        die($error->err);
    }
}


catch (Exception $exception) {
    die($exception->getMessage());
}

?>