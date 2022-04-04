<?php
session_start();
if (isset($_SESSION['username']) &&  $_SESSION['username'] == "admin") {
} else {
    header('Location: ' . "/login");
}
?>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/partials/db/db.php';
?>

<!-- accepting get request for deleting user -->
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id != 1) {

        //user attempted questions
        $sql = "DELETE FROM `cf`.`attempted` WHERE `username` IN (SELECT `username` FROM `cf`.`users` WHERE `id`='$id')";
        $conn->query($sql);

        // deleting user
        $sql = "DELETE FROM `cf`.`users` WHERE `id`=$id";
        $conn->query($sql);
    }
    header("Location: /admin/users/");
}
?>

<!-- accepting get request for adding user -->
<?php
if (isset($_GET['username'])) {
    $username = $_GET['username'];
    $username = preg_replace("/\s+/", "", $username);
    $candidate_name = $_GET['candidate_name'];
    $password = $_GET['password'];
    $password = preg_replace("/\s+/", "", $password);

    $sql = "INSERT INTO `cf`.`users`(`username`, `candidate_name`, `password`, `score`, `time_left`,`status`) VALUES ('$username','$candidate_name','$password','0','600','not_attempted')";
    $conn->query($sql);
    header("Location: /admin/users/");
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        @media only screen and (min-device-width : 360px) and (max-device-width : 640px) {
            #formob {
                width: 900px;
            }
        }
    </style>
    <title>Users</title>
</head>

<body>
    <h1 class="text-center">Admin</h1>
    <div class="text-center my-4">
        <a href="/admin/users/" type="button" class="btn btn-primary">Users</a>
        <a href="/admin/questions/" type="button" class="btn btn-primary">Questions</a>
        <a href="/logout/" type="button" class="btn btn-primary">Logout</a>
    </div>
    <hr>
    <br><br>
    <div class="container">
        <h1 class="text-center">Add User</h1>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username">
        </div>
        <div class="mb-3">
            <label for="candidate_name" class="form-label">Candidate Name</label>
            <input type="text" class="form-control" id="candidate_name">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="text" class="form-control" id="password">
        </div>

        <button type="button" id="add_user" class="btn btn-primary">Add User</button>
    </div>

    <center>
        <h1 class="text-center">Users</h1>
        <div class="container my-4 text-center" style="overflow:scroll; word-wrap: break-word;">
            <div id="formob" class="col">

                <div class="row py-4 bg-warning">
                    <div class="col-1">Id</div>
                    <div class="col-1">Username</div>
                    <div class="col-2">Candidate_name</div>
                    <div class="col-2">Password</div>
                    <div class="col-1">Score</div>
                    <div class="col-1">Time_left</div>
                    <div class="col-2">Status</div>
                    <div class="col-2">Action</div>
                </div>

                <?php
                $sql = "SELECT * FROM `cf`.`users` WHERE `id`>='2' ORDER BY `score` DESC, `time_left` DESC";
                $result = $conn->query($sql);

                if ($result->num_rows == 0) {
                    echo "<p class='my-4'>No users found!</p>";
                }

                while ($row = $result->fetch_object()) {
                    echo "   <div class='row bg-info py-2 my-2'>
                                <div class='col-1'>$row->id</div>
                                <div class='col-1'>$row->username</div>
                                <div class='col-2'>$row->candidate_name</div>
                                <div class='col-2'>$row->password</div>
                                <div class='col-1'>$row->score</div>
                                <div class='col-1'>$row->time_left</div>
                                <div class='col-2'>$row->status</div>
                                <div class='col-2'><a href='/admin/users/?id=$row->id' class='btn btn-danger'>Delete</a></div>
                            </div>";
                }
                ?>
            </div>

        </div>
    </center>

    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        $("#add_user").click(() => {
            let username = $("#username").val();
            let candidate_name = $("#candidate_name").val();
            let password = $("#password").val();

            window.location.href = "/admin/users/?username=" + username + "&candidate_name=" + candidate_name + "&password=" + password;
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>