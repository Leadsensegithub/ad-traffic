<?php
include_once("config/database.php");
$postdata = file_get_contents("php://input");
if (isset($postdata) && !empty($postdata)) {
    $request = json_decode($postdata);
    $mail = mysqli_real_escape_string($mysqli, trim($request->Email));
    $pass = mysqli_real_escape_string($mysqli, trim($request->Password));

    $sql = "SELECT * FROM signup where Email='$mail' and Password='$pass'";
    $result = mysqli_query($mysqli, $sql);

    $nums = mysqli_num_rows($result);

    if ($nums > 0) {
        $data = array('message' => 'success', 'email' => $mail);
        echo json_encode($data);
    } else {
        $data = array('message' => 'failed');
        if ($nums == 0) {
            $data['error'] = 'User not registered';
        } else {
            $data['error'] = 'Something went wrong';
        }
        echo json_encode($data);
    }
}

// if ($_POST) {
//     // include database connection
//     include 'config/database.php';
//     try {
//         header("Content-type: application/json; charset=utf-8");
//         // insert query
//         $query = "INSERT INTO login SET Email=:email, Password=:password";
//         // prepare query for execution
//         $stmt = $con->prepare($query);
//         // posted values
//         $email = $_POST['Email'];
//         $password = $_POST['Password'];

//         // bind the parameters
//         $stmt->bindParam(':email', $email);
//         $stmt->bindParam(':password', $password);
//         // Execute the query
//         if ($stmt->execute()) {
//             echo json_encode(array('result' => 'success'));
//         } else {
//             echo json_encode(array('result' => 'fail'));
//         }
//     }
//     // show error
//     catch (PDOException $exception) {
//         die('ERROR: ' . $exception->getMessage());
//     }
// }
?>