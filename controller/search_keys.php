<?php

include_once("../model/api.php");

if (!isset($_POST["search"]))
    echo "<script>location.href='../view';</script>";

$title = $_POST["search"];

if ($title == "")
    echo "<script>location.href='../view';</script>";
    
$keys = getKeys(15, "", $title);

if ($keys == "[]")
    echo "<script>location.href='../view';</script>";

session_start();
$_SESSION["keys"] = $keys;

echo "<script>location.href='../view/keys';</script>";
?>