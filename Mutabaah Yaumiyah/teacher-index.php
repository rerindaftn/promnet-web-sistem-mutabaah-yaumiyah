<?php
session_start();

if(!isset($_SESSION["login"])){
  header('Location:login.php');
}
if($_SESSION["data"]["position"] == "Admin"){
    header('Location:admin-index.php');
}
if($_SESSION["data"]["position"] == "Student"){
    header('Location:student-index.php');
}
if($_SESSION["data"]["position"] == "Guest"){
    header('Location:guest-index.php');
}
require 'function/function.php';
$data = query("SELECT * FROM `student`");

$teacher = query("SELECT * FROM `teacher`");
foreach($teacher as $user) :
    if($user["id"] == $_SESSION["data"]["id"]) :
        $name       = $user["name"];
        $username   = $user["username"];
        $position   = $user["position"];
        $nip        = $user["nip"];
        $address    = $user["address"];
        $number     = $user["number"];
    endif;
endforeach;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Mutaba'ah Yaumiyah</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="teacher-index.php">Mutaba'ah Yaumiyah</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user fa-fw me-1"></i><?= $name?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="teacher-index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link" href="teacher-profile.php">
                                <div class="sb-nav-link-icon"><i class="bi bi-person-square"></i></div>
                                Profile
                            </a>
                            <a class="nav-link" href="teacher-todolist.php">
                                <div class="sb-nav-link-icon"><i class="bi bi-pencil-square"></i></div>
                                To Do List
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Manage Class
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="teacher-class1.php">Class 1</a>
                                    <a class="nav-link" href="teacher-class2.php">Class 2</a>
                                    <a class="nav-link" href="teacher-class3.php">Class 3</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Teacher
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"><i class="fas fa-tachometer-alt me-3"></i>Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-6 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <center>
                                    <div class="card bg-primary"><i class="bi bi-person-square" style="font-size: 3rem;"></i></div>
                                    <div class="card-body" style="font-size:20px">Profile</div></center>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="teacher-profile.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <center>
                                    <div class="card bg-primary"><i class="bi bi-pencil-square" style="font-size: 3rem;"></i></div>
                                    <div class="card-body" style="font-size:20px">To Do List</div></center>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="teacher-todolist.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <center>
                                    <div class="card bg-success"><i class="bi bi-columns-gap" style="font-size: 3rem;"></i></div>
                                    <div class="card-body" style="font-size:20px;">Manage Class 1</div></center>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="teacher-class1.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <center>
                                    <div class="card bg-success"><i class="bi bi-columns-gap" style="font-size: 3rem;"></i></div>
                                    <div class="card-body" style="font-size:20px;">Manage Class 2</div></center>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="teacher-class2.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <center>
                                    <div class="card bg-success"><i class="bi bi-columns-gap" style="font-size: 3rem;"></i></div>
                                    <div class="card-body" style="font-size:20px;">Manage Class 3</div></center>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="teacher-class3.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                List Student
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Class</th>
                                            <th>NIS</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Class</th>
                                            <th>NIS</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $i = 1; ?>
	                                    <?php foreach( $data as $row ) : ?>
                                        <tr>
                                            <td class="align-middle"><?= $row["name"]; ?></td>
                                            <td class="align-middle"><?= $row["class"]; ?></td>
                                            <td class="align-middle"><?= $row["nis"]; ?></td>
                                            <td class="align-middle"><?= $row["email"]; ?></td>
                                            <td class="align-middle"><?= $row["number"]; ?></td>
                                        </tr>
                                        <?php $i++; ?>
	                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Mutaba'ah Yaumiyah</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
