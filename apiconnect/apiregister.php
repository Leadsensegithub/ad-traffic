
<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE");
header("Access-Control-Allow-Headers: Content-Type, Origin, Accept, X-Requested-With");
if($_POST){
include 'apiconnect.php';

$key1 = $_GET['msisdn'];
$key2 = $_GET['transaction_id'];
$key2 = $_GET['statustr'];


try{
    header("Content-Type: application/json; charset=utf-8");

    $query="INSERT INTO apiconnect SET msisdn=:$key1,transaction_id=:$key2,statustr=:$key3";
    $stmt=$conn->prepare($query);   

    $uname=$_POST['msisdn']; 
    $mail=$_POST['transaction_id'];
    $age=$_POST['statustr'];
    
    $stmt->bindParam(':msisdn',$uname);
    $stmt->bindParam(':transaction_id',$mail);
    $stmt->bindParam(':statustr',$age);
    
   

    if($stmt->execute()){
        echo json_encode(array('message'=>'Its Created'));
        
    }else{
        echo json_encode(array('message'=> 'Its not created'));
    }
}
catch(PDOException $exception){
    echo "connection failed";
}
}
?>