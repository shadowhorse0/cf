<?php
include $_SERVER['DOCUMENT_ROOT'] . '/classes/page.php';
$page = new page();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Log in Codefiesta!</title>
    <?php
    $page->favicons();
    ?>

</head>

<body id="full_s">

    <div class="d-flex justify-content-around align-items-center flex-wrap">
        <div>
            <img src="/mcoe_logo.png" alt="pesmcoe" width="100" class="m-2">
        </div>

        <div>
            <img src="/cf_logo.jpeg" alt="codefiesta" width="115" class="mx-2">
        </div>


    </div>


    <div>
        <h1 class="text-center my-4">CODEFIESTA: Chase the Py</h1>
    </div>

    <div class="container">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Username</label>
            <input type="text" class="form-control" id="username">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Password</label>
            <input type="password" class="form-control" id="password">
        </div>
        <div class="text-center">
            <div class="alert bg-danger text-white my-2 d-none" id="alert" role="alert">
                This is a warning alert—check it out!
            </div>
            <div class="spinner-border my-2 d-none" id="spinner" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <br>
            <button type="button" class="btn btn-primary my-1   " id="login">Login</button>
        </div>

        <div class="text-center m-4">
            <span style="font-size: 20px;">Sponsored by </span>
            <img src="/sponsors/logo_blue_tiny.png" alt="ai-adventures" width="350">
        </div>

    </div>

    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/scripts/api.js?20"></script>
    <script src="js/index.js?1"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>