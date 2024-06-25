<?php
include_once("config/database.php");
$postdata =file_get_contents("php://input");
if (isset($postdata) && !empty($postdata)) {
    $request = json_decode($postdata);
    $name = trim($request->Name);
    $l_name = trim($request->L_Name);
    $email = mysqli_real_escape_string($mysqli,trim($request->Email));
    $phone=trim($request->Phone);
    $company = trim($request->Company);
    $skypeortelegram = trim($request->SkypeorTelegram);
    $message = trim($request->Message);
    $sql = "INSERT INTO contact(Name,L_Name,Email,Phone,Company,SkypeorTelegram,Message)
    VALUES('$name','$l_name','$email','$phone','$company','$skypeortelegram','$message')";

    if ($mysqli->query($sql)) {
        $data = array('message' => 'success');
        echo json_encode($data);
    } else {
        // $data = array('message' => 'failed');
        // echo json_encode($data);
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
}
?>