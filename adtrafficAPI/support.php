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
        $query = "INSERT INTO support SET Mail=:email";
        // prepare query for execution
        $stmt = $con->prepare($query);
        // posted values
        $email = $_POST['Mail'];
        // bind the parameters
        $stmt->bindParam(':email', $email);
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