<style>
    nav.navbar.navbar-expand-lg.navbar-dark.bg-dark {
        background-color: #20547d !important;
    }

    .rounded {
        border-radius: 11px !important;
        letter-spacing: 2px;
        font-family: emoji;
        box-shadow: inset 0px 2px 7px;
    }

    p.mb-0.text-white.mx-2.text-center {
        width: 165%;
        margin-top: 5px;
        font-family: cursive;
        color: #34efff !important;
        box-shadow: inset 3px -1px 37px -8px #00ffff;
        border-radius: 10px;
        padding: 0px 4px;
        letter-spacing: 0.3px;
        text-shadow: 3px 7px 14px black;
    }
    </style>
<?php
session_start();


echo '


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid " >
            <a class="navbar-brand" href="/forum">!Discuss Code</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
             
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/forum">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/forum/about.php">About</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Top Catagories
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';

                          $sql= "SELECT category_name, category_id FROM `categories` LIMIT 10";
                          $result=mysqli_query($conn,$sql);
                          while($row=mysqli_fetch_assoc($result)){
                        echo ' <li><a class="dropdown-item" href="threadlist.php?catid='. $row['category_id'].'">'.$row['category_name'].'</a></li>';         
                          }
            
                        


        echo '                    <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="contact.php" tabindex="-1">Contact</a>
                    </li>

                </ul>';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

    echo '   <form action="search.php" method="get" class="d-flex">
                        <input class="form-control me-2 rounded" name="search" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-success rounded" type="submit">Search</button>
                       <p class="mb-0 text-white mx-2 text-center">welcome ' . $_SESSION['user_email'] . '</p> 
                       <a href="partials/_logout.php" class="btn btn-outline-warning rounded ms-2 px-3">Logout</a>
             </form>';
} else {
    echo '     <form class="d-flex">
                        <input class="form-control me-2 rounded" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-success rounded" type="submit">Search</button>
                </form>
                    <button class="btn btn-outline-warning rounded ms-2 px-3" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                    <button class="btn btn-outline-info rounded mx-2" data-bs-toggle="modal" data-bs-target="#signupModal">SignUp</button>';
}

echo '       </div>
                </div>
            </nav>';

include 'partials/_loginModal.php';
include 'partials/_signupModal.php';
if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true") {
    echo '<div class="my-0 alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your Account Has Been Created Successfully.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

?>