<?php
include_once("config/database.php");

// Get current page URL 
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://"; 
// $currentURL = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . $_SERVER['QUERY_STRING']; 
 
// Get server related info 
$user_ip_address = $_SERVER['REMOTE_ADDR']; 
$referrer_url = !empty($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:'/'; 
// $user_agent = $_SERVER['HTTP_USER_AGENT']; 
// $user_behavior = $_POST['user_behavior'];

// Insert visitor log into database 
$sql = "INSERT INTO cookie (referrer_url, user_ip_address,created) VALUES
 ('$referrer_url','$user_ip_address',NOW())"; 

if($mysqli->query($sql)){
    $data=array("message" => "Success");
    echo json_encode($data);
}
else{
    // $data=array("message" => "failed");
    // echo json_encode($data);
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}
?>
