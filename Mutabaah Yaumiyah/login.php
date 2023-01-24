<?php

/*page session*/
session_start();
// session_destroy();

#----------------------------------
require 'function/function.php';

if(isset($_POST["login"])){

    $usr = $_POST['username']; 
    $pass = $_POST['pass'];

    $result = mysqli_query($conn,"SELECT *FROM `student` WHERE username ='$usr'");
    echo mysqli_num_rows($result);
    
    if(mysqli_num_rows($result) === 1){
        $_SESSION["login"] = true; // session
        $_SESSION["position"] = "Student";
        $row = mysqli_fetch_assoc($result);
        // var_dump($row);
        $_SESSION["data"] = $row;
        // var_dump($_SESSION);
        // exit();
        if(password_verify($pass,$row["password"])){
            header("Location:student-index.php");
            exit;
        }
        if(isset($_SESSION["login"])){
            header('Location:student-index.php');
        }
    }
}


if(isset($_POST["login"])){
    $usr = $_POST['username']; 
    $pass = $_POST['pass'];

    $result = mysqli_query($conn,"SELECT *FROM `guest` WHERE username ='$usr'");
    
    if(mysqli_num_rows($result) === 1){
        $_SESSION["login"] = true; // session
        $_SESSION["position"] = "Guest";
        $row = mysqli_fetch_assoc($result);
        // var_dump($row);
        $_SESSION["data"] = $row;
        // var_dump($_SESSION);
        // exit();
        if(password_verify($pass,$row["password"])){
            header("Location:guest-index.php");
            exit;
        }
        if(isset($_SESSION["login"])){
            header('Location:guest-index.php');
        }
    }
}

if(isset($_POST["login"])){
    $usr = $_POST['username']; 
    $pass = $_POST['pass'];

    $result = mysqli_query($conn,"SELECT *FROM `admin` WHERE username ='$usr'");
    
    if(mysqli_num_rows($result) === 1){
        $_SESSION["login"] = true; // session
        $_SESSION["position"] = "Admin";
        $row = mysqli_fetch_assoc($result);
        // var_dump($row);
        $_SESSION["data"] = $row;
        // var_dump($_SESSION);
        // exit();
        if(password_verify($pass,$row["password"])){
            header("Location:admin-index.php");
            exit;
        }
        if(isset($_SESSION["login"])){
            header('Location:admin-index.php');
        }
    }
}

if(isset($_POST["login"])){
    $usr = $_POST['username']; 
    $pass = $_POST['pass'];

    $result = mysqli_query($conn,"SELECT *FROM `teacher` WHERE username ='$usr'");
    
    if(mysqli_num_rows($result) === 1){
        $_SESSION["login"] = true; // session
        $_SESSION["position"] = "Teacher";
        $row = mysqli_fetch_assoc($result);
        // var_dump($row);
        $_SESSION["data"] = $row;
        // var_dump($_SESSION);
        // exit();
        if(password_verify($pass,$row["password"])){
            header("Location:teacher-index.php");
            exit;
        }
        if(isset($_SESSION["login"])){
            header('Location:teacher-index.php');
        }
    }
}

$error = true;

?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" type="text/css" href="For Login/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->

    <link href="For Login/Login_asset/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Template Main CSS File -->
    <link href="For Login/Login_asset/css/style.css" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>

<nav class="navbar navbar-expand-lg navbar-dark shadow-sm fixed-top" style="background-color:   #008080;">
      <div class="container">
        <a class="navbar-brand" href="utama.php">
          <img src="https://seeklogo.com/images/H/halqat-alquran-alkarim-logo-1B8224BAF3-seeklogo.com.png" alt="" width="40" height="40" />
        </a>
        <a class="navbar-brand" href="utama.php">PESANTREN DAARUT TAUHID</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <!--mepet kanan-->
            <li class="nav-item">
              <a class="nav-link"  href="utama.php#jumbotron">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="utama.php#harapan">Vision & Mission</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="utama.php#program">Featured Program</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="utama.php#addresses">Addresses</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="register_home.php">Sign Up</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Sign In</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

<!-- Navbar-->
<header class="header">
    <nav class="navbar navbar-expand-lg navbar-light py-3">
        <div class="container">
            <!-- Navbar Brand -->
            <a href="#" class="navbar-brand">
               
            </a>
        </div>
    </nav>
</header>

<body>
<div class="container">
    <div class="row py-5 mt-4 align-items-center me-5">
        
        <!-- For Demo Purpose -->
        <div class="col-md-3 col-lg-6 pr-lg-5 mb-5 mb-md-0">
            <div class="pb-5 pr-5">
                <center>
                <i class="bi bi-person-workspace" style="font-size: 300px; color: #008080;"></i></center>
            </div>
        </div>
        <!-- Registeration Form -->
        <div class="col-md-3 col-lg-6 mt-5 ml-auto" style="margin-top: 50px;">
            <form action="#" method="POST">
                <div class="row">
                    <!-- First Name -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <input id="username" type="text" name="username" placeholder="Username" class="form-control bg-white border-left-0 border-md">
                    </div>

                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                        </div>
                        <input id="pass" type="text" name="pass" placeholder="Password" class="form-control bg-white border-left-0 border-md">
                    </div>
                    <!-- Email Address -->
                   <div class="row px-3 mb-4 form-group col-lg-12 mx-auto mb-0">
                        <div class="custom-control custom-checkbox custom-control-inline"> <input id="chk1" type="checkbox" name="chk" class="custom-control-input"> <label for="chk1" class="custom-control-label text-sm">Remember me</label> </div> <a href="#" class="ml-auto mb-0 text-sm">Forgot Password?</a>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group col-lg-12 mx-auto mb-0">
                        <button class="btn btn-primary btn-block py-2 font-weight-bold" type="submit" name="login" style="background-color:   #008080;">Login</button>
                    </div>


                    <!-- Divider Text -->
                    <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                        <div class="border-bottom w-100 ml-5"></div>
        
                        <div class="border-bottom w-100 mr-5"></div>
                    </div>

                    <!-- Social Login -->
                    

                    <!-- Already Registered -->
                    <div class="text-center w-100">
                        <p class="text-muted font-weight-bold">Don't have an account? <a href="register_home.php" class="text-primary ml-2">Register</a></p>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
</body>
    </html>