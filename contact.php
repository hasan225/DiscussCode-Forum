<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <style>
        .container {
            min-height: 66vh;
            color: white;
        }

        h3 {
            margin-top: 16%;
            text-align: center;
            font-family: fangsong;
            font-size: 47px;
            letter-spacing: 2px;
        }

        hr {
            color: #54947f;
            padding: 2px;
        }

        h4 {
            font-size: 24px;
            margin: 60px 0px 30px 0px;
        }

        h6 {
            text-align: center;
            letter-spacing: 2px;
        }

        select {
            background: white;
            padding: 10px;
            border-radius: 13px;
            letter-spacing: 2px;
        }

        body {
            background: #4c75e6;
        }

        option {
            background: #037a92;
            color: white;
        }

        a.btn.btn-outline-primary.btn-dark {
            margin-top: 10px;
            padding: 5px 18px;
            letter-spacing: 2px;
            font-family: monospace;
            background: blueviolet;
            color: white;
            border-radius: 10px;
            font-size: 18px;
        }
    </style>



    <title>Welcome To !Discuss Code - For Coding</title>
</head>

<body>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_header.php'; ?>


    <div class="container">
        <h3> Contact us</h3>

        <hr>

        <h6>For All Kind Of Enquiries Bug & Problems Please Contact Us </h6>


        <h4>How May We Help You</h4>

        <select>
            <option>What's The Problem You Are Facing?</option>

            <option>Can't Log In?</option>
            <option>Couldn't Find Your Favorite Category?</option>
            <option>Can't Comment?</option>
            <option>Can't Reply?</option>
            <option>Found Some Internal Issue??</option>
            <option>See Something Changed?</option>
        </select><br />
        <a href="" class="btn btn-outline-primary btn-dark">Submit</a>
    </div>



    <?php include 'partials/_footer.php'; ?>





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