<?php
include_once("../model/api.php");
session_start();
if (!isset($_SESSION["name"]))
    echo "<script>location.href='../view/login';</script>";

if (!isset($_POST["keyid"]))
    echo "<script>location.href='../view/keys';</script>";

$keyid = $_POST["keyid"];

$userid = $_SESSION["name"];

$redirect = "";
$result = buyKey($userid, $keyid);
if ($result == 1) {
    $redirect = "Key successfully purchased.";
    $_key = viewKey($userid, $keyid);
    $redirect = $redirect." KEY: ".$_key;
} else {
    $redirect = $result;
}

echo '
<form id="donate_success" action="../view/keys" method="post">
    <input type="hidden" name="success" value="'.$redirect.'">
</form>
<script type="text/javascript">
    document.getElementById("donate_success").submit();
</script>
'; 
?>