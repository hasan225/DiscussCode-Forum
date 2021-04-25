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

        .jumbotron {
            padding: 3rem 3rem;
            margin-bottom: 8rem;
            background-color: #009688fc;
            border-radius: .3rem;
            color: white;
            letter-spacing: 1px;
            border-radius: 12px;
            box-shadow: inset 2px 6px 23px 0px grey;
            font-family: sans-serif;
            line-height: 25px;
            word-spacing: 5px;
            font-size: x-large;
        }

        h1.py-2 {
            margin: 24px auto;
            text-align: center;
            background: antiquewhite;
            border-radius: 10px;
            letter-spacing: 2px;
            font-family: cursive;

        }

        .lead {
            font-size: 1.34rem;
            font-weight: 300;
        }

        h1.my-3 {
            color: brown;
            letter-spacing: 2px;
            font-family: monospace;
            font-size: 42px;
            background: darkgray;
            width: 200px;
            border-radius: 10px;
            text-align: center;
        }

        .jumbotron.jumbotron-fluid {
            background: #000c63a6;
        }

        a.btn.btn-warning.btn-lg {
            background: linear-gradient(45deg, #ff4a4a, transparent);
            color: white;
            padding: 10px;
            letter-spacing: 2px;
            border-radius: 10px;
        }

        img.rounded-circles {
            width: 45px;
            height: 40px;
            border-radius: 50%;
        }

        p.lead.display-4 {
            font-family: auto;
            font-size: 17px;
            margin-bottom: 36px;
            box-shadow: inset 0px 3px 32px 0px darkgrey;
            padding: 8px;
            width: 555px;
            text-align: center;
            border-radius: 10px;
            letter-spacing: 2px;
        }
    </style>
</head>

<body>

    <?php include 'partials/_header.php'; ?>
    <?php include 'partials/_dbconnect.php'; ?>

    <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `categories` WHERE category_id=$id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {

        $catname = $row['category_name'];
        $catdesc = $row['category_description'];
    }

    ?>
    <?php

    $method = $_SERVER['REQUEST_METHOD'];
    $showalert = false;

    if ($method == 'POST') {
        //insert thread into db
        $th_title = $_POST['title'];
        $th_desc = $_POST['desc'];
        $sno = $_POST['sno'];
        $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$th_title', '$th_desc', '$id', '$sno', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        $showalert = true;
        if ($showalert) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your Question Has Been Added Wait For Someone To Look Over It
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
    }


    ?>


    <!-- category container starts from here -->



    <div class="container my-5">

        <div class="jumbotron">
            <h1 class="display-4 text-center mb-4">welcome to
                <?php echo $catname; ?> forums!
            </h1>
            <p class="lead">
                <?php echo $catdesc; ?>
            </p>
            <hr class="my-4">
            <h2 class="text-capitalize my-2 text-center">this forum is to share knowledge with everyone</h2>
            <h1 class="my-3">Rules</h1>
            <p class=" mb-3"> No Spam / Advertising / Self-promote in the forums is not allowed. Do not post
                copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post
                questions. Remain respectful of other members at all times.</p>
            <p class="lead">
                <a class="btn btn-warning btn-lg" href="#" role="button">Learn More</a>
            </p>
        </div>

    </div>

    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo '<div class="container mt-5">
        <form action=" ' . $_SERVER['REQUEST_URI'] . '" method="post">
            <h1 class="text-capitalize text-center my-5">Ask About Your Concerns</h1>

            <div class="mb-3">
                <label for="name" class="form-label">Name Your Issue</label>
                <input type="text" class="form-control" id="title" name="title">
                <div id="emailHelp" class="form-text">Make It Understandable To That We Can Understand & Help You</div>
            </div>

            <div class="mb-3">
                <label for="desc" class="form-label">Elaborate Your Issue</label>
                  <input type="hidden" name="sno" value="' . $_SESSION["sno"] . '">
                <textarea class="form-control" id="desc" name="desc" col="30" rows="3"></textarea>
            </div>


            <button type="submit" class="btn btn-success btn-lg">Submit</button>
        </form>
    </div>';
    } else {
        echo '
         <div class="container">
            <p class="lead display-4">You Are Not logged in. Please Log In To Start A Discussion</p>
         </div>
    ';
    }
    ?>



    <div class="container">
        <h1 class="py-2">Share Your problems To Solve IT With The Help Of Experts</h1>

        <?php
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id";
        $result = mysqli_query($conn, $sql);
        $noresult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noresult = false;
            $id = $row['thread_id'];
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $thread_time = $row['timestamp'];
            $thread_user_id =$row['thread_user_id'];
            $sql2= "SELECT `user_email` FROM `users` WHERE sno='$thread_user_id'";
            $result2=mysqli_query($conn,$sql2);
            $row2=mysqli_fetch_assoc($result2);
           



            echo '<div class="d-flex my-4">
            <div class="flex-shrink-0">
                <img class="rounded-circles" src="https://source.unsplash.com/200x100/?code,programming" width="60px" alt="userpng">
            </div>
            <div class="flex-grow-1 ms-3">
                 <h5>' . $row2['user_email'] . '</h5>
                <h6 ><a class="text-dark text-decoration-none" href="thread.php?threadid=' . $id  . '">' . $title . '</a></h6>
                <p class="text-capitalize mb-1">' . $desc . '</p>
                <p class="mb-3 p-0 "style="font-size:12px">was posted at ' . $thread_time . '</p>
            </div>
        </div>
       
        ';
        }
        // echo var_dump($noresult);
        if ($noresult) {
            echo '<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <p class="display-4">No Answers Found</p>
    <p class="lead">Be The First One To Ask A Question</p>
  </div>
</div>';
        }

        ?>


        <!-- <div class="d-flex my-4">
            <div class="flex-shrink-0">
                <img src="img/user.png" width="60px" alt="userpng">
            </div>
            <div class="flex-grow-1 ms-3">
                <h5>Hasan Bijoy</h5>
                <p class="text-capitalize">hello i have been facing problems with python on my pc </p>
            </div>
        </div> -->

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