<?php
header("Access-Control-Allow-Origin: *");
include $_SERVER['DOCUMENT_ROOT'] . '/partials/db/db.php';
$response = null;

try {
    if (isset($_POST['request_type'])) {
        $request_type = $_POST['request_type'];
    }

    switch ($request_type) {

        case "login":
            if (isset($_POST['data'])) {
                $data = $_POST['data'];
            }
            $data = json_decode($data, true);

            $username = $data['username'];
            $password = $data['password'];

            $sql = "SELECT * FROM `cf`.`users` WHERE `username`='$username' AND `password`='$password'";
            $result = $conn->query($sql);

            if (!$result->num_rows > 0) {
                throw new Exception("Invali credentials!");
            }

            // starting user session
            session_start();
            $_SESSION['username'] = $username;

            $response['msg'] = "Login successfull!";
            $response['status'] = true;
            break;
    }
} catch (Exception $e) {
    $response['status'] = false;
    $response['msg'] = $e->getMessage();
}

$response = json_encode($response);
echo $response;
