<?php
include_once("config/database.php");
$postdata =file_get_contents("php://input");
if (isset($postdata) && !empty($postdata)) {
    $request = json_decode($postdata);

    $name=trim($request->Name);
    $mail=trim($request->Mail);
    $comments=trim($request->Comment);

    $sql="INSERT INTO comment(Name,Mail,Comment) VALUES('$name','$mail','$comments')";

    if($mysqli->query($sql)){
        $data=array('message' =>'success');
        echo json_encode($data);
    }
    else {
        // $data=array('message'=>'failed');
        // echo json_encode($data);
        echo "Error: " . $sql . "<br>" . $mysqli->error;

    }
}
?>