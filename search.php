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

        .container {
            min-height: 80vh;
        }

        .container h2 {
            font-style: italic;
        }
    </style>
</head>

<body>
    <!-- ALTER TABLE threads ADD FULLTEXT(`thread_title`,`thread_desc`); -->
    <!-- SELECT * FROM `threads` WHERE MATCH (thread_title,thread_desc) against ('not able') -->
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_header.php'; ?>


    <!-- search result -->

    <div class="container my-4">
        <h2>Search Result For
            <?php echo $_GET['search'] ?>
        </h2>

        <?php
        $noresults = true;
        $query = $_GET['search'];
        $sql = "SELECT * FROM `threads` WHERE MATCH (thread_title,thread_desc) against ('$query')";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {

            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $thread_id = $row['thread_id'];
            $url = "thread.php?threadid=" . $thread_id;
            $noresults=false;

            //display the search result

            echo '    <div class="result">
            <h4><a href="' . $url . '" class="text-dark">' . $title . '</a></h4>
            <p>' . $desc . '.</p>
        </div>';
        }

        if ($noresults) {

            echo '<div class="jumbotron">
  <div class="containerr">
    <p class="display-4">No results Found</p>
    <p class="lead">Your search -....- did not match any documents.

            Suggestions:<ul>

            <li>Make sure that all words are spelled correctly.</li>
            <li>Try different keywords.</li>
            <li>Try more general keywords.</li></ul></p>

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