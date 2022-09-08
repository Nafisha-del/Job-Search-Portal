﻿<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>

    <title>Job Seeker Profile</title>
</head>

<body style="margin-bottom: 100px;">
    <?php 
    session_start();
    if (! empty($_SESSION['logged_in'])){ ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Job Search</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="apply.html">Job Application</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../php/joblist.php">Jobs List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../php/signout.php">Sign Out</a>
                </li>
            </ul>
            <form method = "POST" class="form-inline my-2 my-lg-0" action="../php/search.php">
                <input name="position" class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div class="container">

        <div class="row">
            <div class="col-md-3">
                <h1></h1>
            </div>
            <div class="col-md-7">
                    <h1>Welcome to Job Search Portal</h1>
            </div>
            <div class="col-md-2">
                 <h1></h1>
            </div>

        </div>

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../res/home1.jpg" class="d-block w-100" alt="..." style="height: 400px;">
                </div>
                <div class="carousel-item">
                    <img src="../res/home2.jpg" class="d-block w-100" alt="..." style="height: 400px;">
                </div>
                <div class="carousel-item">
                    <img src="../res/home3.jpg" class="d-block w-100" alt="..." style="height: 400px;">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>        
    </div>
    <?php
    }else{
    echo 'You are not logged in';}
    ?>
</body>

</html>