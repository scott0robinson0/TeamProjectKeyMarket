<?php

include ("../model/api.php");

try {
    session_start();
    if (!isset($_SESSION["name"] ) || $_SESSION["name"] == "")
        echo "<script>location.href='../view/login';</script>";
    
    $userid = $_SESSION["name"];
    $title = $_POST["gameTitle"];
    $platform = $_POST["platform"];
    $price = $_POST["price"];
    $key = $_POST["Key"];

    $gameIGDB = json_decode(searchGameByName($title))[0];
    $gameid = $gameIGDB->id;

    $redirect = "Key could not be donated.";
    if (donateKey($key, $title, $gameid, $userid, $platform, $price))
        $redirect = "Key successfully donated.";
        
    echo '
    <form id="donate_success" action="../view/Account" method="post">
        <input type="hidden" name="success" value="'.$redirect.'">
    </form>
    <script type="text/javascript">
        document.getElementById("donate_success").submit();
    </script>
    '; 

} catch (Exception $exception) {
    http_response_code(401);
    die($exception->getMessage());
}
?>