<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials:true");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json; charset=UTF-8");
// used to connect to the database
// $host = "localhost";
// $db_name = "addb";
// $username = "root";
// $password = "Leadsense@123";

$host = "localhost";
$username = "ADTraffic123";
$password = "Adtraffic@123";
$db_name = "AD_Traffic";
$mysqli=new mysqli($host,$username,$password,$db_name);

if($mysqli->connect_error){
    die('Error: ('.$mysqli->connect_errno .')'.$mysqli->connect_error);
}
// try {
//     $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
// }
  
// // show error
// catch(PDOException $exception){
//     echo "Connection error: " . $exception->getMessage();
// }
?>
