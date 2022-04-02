<?php
//Code to solve CORS policy error
if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');    // cache for 1 day
}
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        // may also be using PUT, PATCH, HEAD etc
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    exit(0);
}
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
