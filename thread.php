<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Welcome To !Discuss Code - For Coding</title>
    <style>
        h2.text-center.my-5 {
            font-family: emoji;
            font-size: 30px;
            box-shadow: inset 0px 3px 31px 0px #fb5200;
            width: 800px;
            text-align: center;
            margin: auto;
            padding: 10px;
            border-radius: 11px;
            letter-spacing: 3px;
        }
    </style>
</head>

<body>

    <?php include 'partials/_header.php'; ?>
    <?php include 'partials/_dbconnect.php'; ?>

    <?php
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE thread_id=$id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {

        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
    }

    ?>

    <?php

    $method = $_SERVER['REQUEST_METHOD'];
    $showalert = false;

    if ($method == 'POST') {
        //insert comment into db
        $comment = $_POST['comment'];
        $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$comment', '$id', '0', current_timestamp());";
        $result = mysqli_query($conn, $sql);
        $showalert = true;
        if ($showalert) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your Comment Has Been Added Thanks For Keeping The Community Alive
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
    }


    ?>


    <!-- slider starts -->


    <!-- category container starts from here -->



    <div class="container my-5">

        <div class="jumbotron">
            <h1 class="display-4 text-center"><?php echo $title; ?></h1>
            <p class="lead"><?php echo $desc; ?></p>
            <hr class="my-4">
            <h2 class="text-capitalize my-2 text-center">this forum is to share knowledge with everyone</h2>
            <h1 class="my-3">Rules</h1>
            <p class=" mb-3"> No Spam / Advertising / Self-promote in the forums is not allowed. Do not post copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post questions. Remain respectful of other members at all times.</p>
            <p>posted by <b>hossain</b></p>
        </div>

    </div>


    <div class="container mt-5">
        <h1 class="text-capitalize my-3">Answer The Question</h1>
        <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">

            <div class="mb-3">
                <label for="desc" class="form-label">Your Comment</label>
                <textarea class="form-control" id="comment" name="comment" col="30" rows="2"></textarea>
            </div>


            <button type="submit" class="btn btn-success btn-lg">Post Comment</button>
        </form>
    </div>


    <div class="container mt-5">
        <h3 class="">Discussions!</h3>

        <?php
        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `comments` WHERE thread_id=$id";
        $result = mysqli_query($conn, $sql);
        $noresult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noresult = false;
            $id = $row['comment_id'];
            $content = $row['comment_content'];
            $comment_time = $row['comment_time'];



            echo '<div class="d-flex my-4">
            <div class="flex-shrink-0">
                <img src="img/user.png" width="40px" alt="userpng">
            </div>
            <div class="flex-grow-1 ms-3">
            <p class="font-weight-bold my-0">Unknown User</p>
                <p class="text-capitalize mb-1 ">' . $content . '</p>
                <p class="mb-3 p-0 "style="font-size:12px">was posted at ' . $comment_time . '</p>
            </div>
        </div>

        ';
        }


        if ($noresult) {
            echo '<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <p class="display-4">No Answers Found</p>
    <p class="lead">Be The First One To Ask A Question</p>
  </div>
</div>';
        }



        ?>

    </div>


    <?php include 'partials/_footer.php' ?>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</body>

</html>