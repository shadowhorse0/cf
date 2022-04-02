<?php
header("Access-Control-Allow-Origin: *");
include $_SERVER['DOCUMENT_ROOT'] . '/partials/db/db.php';
$response = null;
try {

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
    } else {
        throw new Exception("Username or Passoword is missing!");
    }

    $sql = "SELECT * FROM `cf`.`users` WHERE `username`='$username' AND `password`='$password'";
    $result = $conn->query($sql);
    if (!$result->num_rows > 0) {
        throw new Exception("Invali credentials!");
    }

    $response['msg'] = "Login successfull!";
    $response['result'] = true;
} catch (Exception $e) {
    $response['status'] = false;
    $response['msg'] = $e->getMessage();
}

$response = json_encode($response);
echo $response;
