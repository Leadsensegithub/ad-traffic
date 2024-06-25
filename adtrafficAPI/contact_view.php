<?php
include_once("config/database.php");

// delete message prompt will be here
header("Content-type: application/json; charset=utf-8");

// select all data
$query = "SELECT * FROM `contact` ORDER BY `ID` DESC";
$stmt = $con->prepare($query);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($results);
echo $json;
?>