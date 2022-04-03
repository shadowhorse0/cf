<?php
include $_SERVER['DOCUMENT_ROOT'] . '/partials/db/db.php';
?>

<!-- accepting get request for deleting user -->
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `cf`.`questions` WHERE `id`=$id";
    $conn->query($sql);
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
    <title>Questions</title>
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
        <h1 class="text-center">Add Question</h1>
        <div class="form-group">
            <label for="question">Question</label>
            <textarea class="form-control" id="question" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="answer" class="form-label">Answer</label>
            <input type="text" class="form-control" id="answer">
        </div>

        <button type="button" id="add_question" class="btn btn-primary">Add Question</button>
    </div>

    <center>
        <h1 class="text-center my-4">Questions</h1>
        <div class="container my-4 text-center" style="overflow:scroll; word-wrap: break-word;">
            <div id="formob" class="col">

                <div class="row py-4 bg-warning">
                    <div class="col-1">Id</div>
                    <div class="col-7">Question</div>
                    <div class="col-2">Answer</div>
                    <div class="col-2">Action</div>
                </div>

                <?php
                $sql = "SELECT * FROM `cf`.`questions`";
                $result = $conn->query($sql);

                if ($result->num_rows == 0) {
                    echo "<p class='my-4'>No quesitons found!</p>";
                }

                while ($row = $result->fetch_object()) {
                    echo "   <div class='row bg-info py-2 my-2'>
                                <div class='col-1'>$row->id</div>
                                <div class='col-7'>$row->question</div>
                                <div class='col-2'>$row->answer</div>
                                <div class='col-2'><a href='/admin/questions/?id=$row->id' class='btn btn-danger'>Delete</a></div>
                            </div>";
                }
                ?>
            </div>

        </div>
    </center>

    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/scripts/api.js?17"></script>


    <script>
        $("#add_question").click(() => {
            let question = $("#question").val();
            let answer = $("#answer").val();

            let data = {
                question: question,
                answer: answer
            };
            endpoint(data, "add_question").then(response => {
                window.location.href = "/admin/questions/";
            })

        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>