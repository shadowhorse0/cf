<?php
include $_SERVER['DOCUMENT_ROOT'] . '/partials/db/db.php';
session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM `cf`.`users` WHERE `username`='$username'";
    $result = $conn->query($sql)->fetch_assoc();
    $candidate_name = $result['candidate_name'];
    $score = $result['score'];
} else {
    header('Location: ' . "/login");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Dashboard</title>
</head>

<style>
    .unselectable {
        -webkit-user-select: none;
        -webkit-touch-callout: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .spacer {
        float: right;
    }
</style>

<body>
    <nav class="navbar navbar-light bg-light justify-content-between">
        <a class="navbar-brand" style="margin-left: 1%;">Codefiesta</a>
        <button id="logout" class="btn btn-outline-danger my-2 my-sm-0" style="margin-right: 1%;">Log out</button>
    </nav>

    <br>
    <div>
        <h4><a style="margin: 1%;">Score: <span id="score"><?php echo $score; ?></span> </a>
            <span class="spacer" style="margin-right: 1%;"> Time Left: <span id="mins"> </span> <span id="secs"></span></span>
        </h4>
        <br>
        <div class="text-center my-4">
            <h4><a> Name: <?php echo $candidate_name  ?></a></h4>
        </div>

    </div>
    <br>
    <div id="question" class="d-none container">
        <div>

            <div class="card unselectable">
                <h3 class="text-center"> Question: <span id="qns_id_incr"></span></h3>
                <div class="card-body">
                    <div class="form-group">
                        <textarea class="form-control" id="qns" rows="3" style=" -webkit-user-select: none; /* Safari */
  -ms-user-select: none; /* IE 10 and IE 11 */
  user-select: none;" readonly></textarea>
                    </div>
                </div>
            </div>

            <br>

            <input class="form-control mr-sm-2" type="text" placeholder="Enter answer here" id="qns_ans" aria-label="Search">

        </div>
        <br>
        <br>
        <div class="container text-center">
            <div class="alert bg-danger text-white d-none my-2" role="alert" id="ans_alert">
                A simple danger alert—check it out!
            </div>
            <div class="spinner-border my-2 d-none my-2" id="ans_spinner" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <br>
            <button type="button" class="btn btn-success my-2" id="submit">Submit & next</button>
        </div>
    </div>
    <div class="container text-center" style="margin-top:80px;">
        <div class="alert bg-danger text-white d-none" role="alert" id="alert">
            A simple danger alert—check it out!
        </div>
        <div class="spinner-border my-2 d-none" id="spinner" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>


    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="/scripts/api.js?17"></script>
    <script src="js/index.js?1"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>