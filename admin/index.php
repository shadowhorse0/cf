<?php
include $_SERVER['DOCUMENT_ROOT'] . '/classes/page.php';
$page = new page();
session_start();
if (isset($_SESSION['username']) &&  $_SESSION['username'] == "admin") {
} else {
    header('Location: ' . "/login");
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

    <title>Admin</title>
    <?php
    $page->favicons();
    ?>
</head>

<body>
    <h1 class="text-center">Admin</h1>
    <div class="text-center my-4">
        <a href="/admin/users/" type="button" class="btn btn-primary">Users</a>
        <a href="/admin/questions/" type="button" class="btn btn-primary">Questions</a>
        <a href="/logout/" type="button" class="btn btn-primary">Logout</a>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>