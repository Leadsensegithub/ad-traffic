<?php
include_once("config/database.php");
$postdata =file_get_contents("php://input");
if (isset($postdata) && !empty($postdata)) {
    $request = json_decode($postdata);
    $fname = trim($request->First_Name);
    $lname =trim($request->Last_Name);
    $cname=trim($request->companyname);
    $mail=mysqli_real_escape_string($mysqli,trim($request->Email));
    $pass=mysqli_real_escape_string($mysqli,trim($request->Password));
    $cpass=trim($request->Confirm_Password);
    $website=trim($request->website);
    $sql="INSERT INTO signup(First_Name,Last_Name,companyname,Email,Password,Confirm_Password,website)
    VALUES('$fname','$lname','$cname','$mail','$pass','$cpass','$website')";
    
    if($mysqli->query($sql)){
        $data=array('message' =>'success');
        echo json_encode($data);
    }
    else {
        $data=array('message'=>'failed');
        if(strstr($mysqli->error, "signup.Unique_Email")) {
            $data['error'] = 'Email Id Already Exists';
        } else {
            $data['error'] = 'Something went wrong';
        }
        echo json_encode($data);
    }
}
?>