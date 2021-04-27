<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Welcome To !Discuss Code - For Coding</title>
    <style>
        h2.text-center.my-5 {
            font-family: emoji;
            font-size: 30px;
            box-shadow: inset 0px 3px 31px 16px #00cff8;
            width: 800px;
            text-align: center;
            margin: auto;
            padding: 10px;
            border-radius: 11px;
            letter-spacing: 3px;
        }

        img.card-img-top {
            width: auto;
            height: 175px;
        }

        body {
            margin: 0;
            font-family: var(--bs-font-sans-serif);
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: transparent;
            background: #1a1a1d;
        }

        .card:hover{transform:scale(1.1);
                    transition: .4s;
                  
        }
    </style>
</head>

<body>

    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_header.php'; ?>

    <!-- slider starts -->

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://source.unsplash.com/2400x900/?code,php" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>PHP</h5>
                    <p>PHP is a general-purpose scripting language especially suited to web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1994</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/2400x900/?code,javascript" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>JavaScript</h5>
                    <p>JavaScript, often abbreviated as JS, is a programming language that conforms to the ECMAScript specification. JavaScript is high-level, often just-in-time compiled, and multi-paradigm</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/1200x450/?code,microsoft" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Python</h5>
                    <p>Python is an interpreted high-level general-purpose programming language. Python's design philosophy emphasizes code readability with its notable use of significant indentation. </p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- category container starts from here -->

    <div class="container my-5">
        <h2 class="text-center my-5">Welcome To !Discuss Code - Browse Codes </h2>
        <div class="row ">

            <!-- fetch all the categories use a loop to iterate through catagories -->

            <?php
            $sql = "SELECT * FROM `categories`";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {

                //   echo $row['category_id'];
                //   echo $row['category_name'];
                $id = $row['category_id'];
                $cat = $row['category_name'];
                $desc = $row['category_description'];
                echo '  <div class="col-md-4 my-3 d-block d-lg-flex">
                <div class="card" style="width: 18rem;">
                   
                     <img src="img/card-' . $id . '.jpg" style="box-sizing:border-box" class="card-img-top" alt="...">
                    <div class="card-body my-3">
                        <h5 class="card-title"><a href="/threadlist.php?catid=' . $id . '">' . $cat . '</a></h5>
                        <p class="card-text text-justify">' . substr($desc, 0, 90) . '....</p>
                        <a class="card-link stretched-link text-capitalize coloring" href="threadlist.php?catid=' . $id . '" class="btn btn-primary">See More</a>
                    </div>
                </div>
            </div>  ';
            }

            ?>



        </div>

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