<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
if ($_POST) {
    // include database connection
    include 'config/database.php';
    try {
        header("Content-type: application/json; charset=utf-8");
        // insert query
        $query = "INSERT INTO contact SET Name=:name,L_Name=:l_name, Email=:email, Phone=:phone, Company=:company, Skype=:skype, Message=:message";
        // prepare query for execution
        $stmt = $con->prepare($query);
        // posted values
        $name = $_POST['Name'];
        $l_name = $_POST['L_Name'];
        $email = $_POST['Email'];
        $phone = $_POST['Phone'];
        $company = $_POST['Company'];
        $skype = $_POST['Skype'];
        $message = $_POST['Message'];
        // bind the parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':l_name', $l_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':company', $company);
        $stmt->bindParam(':skype', $skype);
        $stmt->bindParam(':message', $message);
        // Execute the query
        if ($stmt->execute()) {
            echo json_encode(array('result' => 'success'));
        } else {
            echo json_encode(array('result' => 'fail'));
        }
    }
    // show error
    catch (PDOException $exception) {
        die('ERROR: ' . $exception->getMessage());
    }
}
?>