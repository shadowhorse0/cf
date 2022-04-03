<?php
header("Access-Control-Allow-Origin: *");
include $_SERVER['DOCUMENT_ROOT'] . '/partials/db/db.php';
$response = null;

if (isset($_POST['request_type'])) {
    $request_type = $_POST['request_type'];
}

switch ($request_type) {

    case "login":
        try {

            if (isset($_POST['data'])) {
                $data = $_POST['data'];
            }
            $data = json_decode($data, true);

            $username = $data['username'];
            $password = $data['password'];

            $sql = "SELECT * FROM `cf`.`users` WHERE `username`='$username' AND `password`='$password'";
            $result = $conn->query($sql);

            if (!$result->num_rows > 0) {
                throw new Exception("Invalid credentials!");
            }

            if ($username != "admin") {

                // checking user has already given test
                $sql = "SELECT `time_left` FROM `cf`.`users` WHERE `username`='$username'";
                $time_left = $conn->query($sql)->fetch_assoc()['time_left'];
                if ($time_left == 0) {
                    throw new Exception("Test already submitted!");
                }
            }

            // starting user session
            session_start();
            $_SESSION['username'] = $username;
            $response['username'] = $username;
            $response['msg'] = "Login successfull!";
            $response['status'] = true;
        } catch (Exception $e) {
            $response['status'] = false;
            $response['msg'] = $e->getMessage();
        }

        break;

    case "time_left":
        session_start();
        $username = $_SESSION['username'];
        try {
            if (isset($_POST['data'])) {
                $data = $_POST['data'];
            }
            $data = json_decode($data, true);
            $time_ded = $data['time_ded'];


            $sql = "SELECT `time_left` FROM `cf`.`users` WHERE `username`='$username'";
            $time_left = $conn->query($sql)->fetch_assoc()['time_left'];
            $time_left = $time_left - $time_ded;

            if ($time_left <= 0) {
                $time_left = 0;
            }

            //deducting specified time;
            $sql = "UPDATE `cf`.`users` SET `time_left`='$time_left' WHERE `username`='$username'";
            $conn->query($sql);

            // logout user after time finished
            if ($time_left == 0) {
                throw new Exception("Time Over, test submitted!");
            }

            $response['time_left'] = $time_left;
            $response['status'] = true;
        } catch (Exception $e) {
            $response['msg'] = $e->getMessage();
            $response['status'] = false;
        }
        break;

    case "get_question":
        session_start();
        $username = $_SESSION['username'];
        try {
            $sql = "SELECT `id`,`question` FROM `cf`.`questions` WHERE `id` NOT IN(SELECT `question_id` FROM `cf`.`attempted` WHERE `username`='$username') ORDER BY RAND() LIMIT 1";
            $result = $conn->query($sql);

            if ($result->num_rows == 0) {
                throw new Exception("All questions attempted!");
            }

            $question = $result->fetch_assoc();

            // updating attempted table
            $question_id = $question['id'];
            $sql = "INSERT INTO `cf`.`attempted`( `username`, `question_id`) VALUES ('$username','$question_id')";
            $conn->query($sql);

            $response['question'] = $question;
            $response['status'] = true;
        } catch (Exception $e) {
            $response['status'] = false;
            $response['msg'] = $e->getMessage();
        }
        break;

    case "verify":
        session_start();
        $username = $_SESSION['username'];
        try {
            if (isset($_POST['data'])) {
                $data = $_POST['data'];
            }
            $data = json_decode($data, true);
            $qns_id = $data['qns_id'];
            $answer = $data['answer'];

            // getting anser of question from database
            $sql = "SELECT `answer` FROM `cf`.`questions` WHERE `id`='$qns_id'";
            $crt_answer = $conn->query($sql)->fetch_assoc()['answer'];
            $flag = false;

            if ($answer == $crt_answer) {
                $flag = true;
            }

            // updating attempted table
            $sql = "UPDATE `cf`.`attempted` SET `answer`='$answer', `flag`='$flag' WHERE `username`='$username' AND `question_id`='$qns_id'";
            $conn->query($sql);

            // check user current score
            $sql = "SELECT COUNT(*) AS `score` FROM `cf`.`attempted` WHERE `username`='$username' AND `flag`='1'";
            $crnt_score = $conn->query($sql)->fetch_assoc()['score'];

            if (!$flag) {
                throw new Exception("Wrong answer!");
            }

            // updating user score in user table
            $sql = "UPDATE `cf`.`users` SET `score`='$crnt_score' WHERE `username`='$username'";
            $conn->query($sql);

            $response['msg'] = "Correct answer!";
            $response['crnt_score'] = $crnt_score;
            $response['status'] = true;
        } catch (Exception $e) {
            // check user current score
            $sql = "SELECT COUNT(*) AS `score` FROM `cf`.`attempted` WHERE `username`='$username' AND `flag`='1'";
            $crnt_score = $conn->query($sql)->fetch_assoc()['score'];
            $response['crnt_score'] = $crnt_score;

            $response['status'] = false;
            $response['msg'] = $e->getMessage();
        }
        break;
}

$response = json_encode($response);
echo $response;
