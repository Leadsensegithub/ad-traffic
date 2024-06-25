<?php

// Connect to the database
$servername = "localhost";
$username = "ADTraffic123";
$password = "Adtraffic@123";
$dbname = "AD_Traffic";


try{
    // Create connection
    $conn = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
    echo json_encode("Connected successfully!!");
    }
    catch(PDOException $exception){
    echo "Connection failed!!";}
    ?>

$conn->close();
?>
