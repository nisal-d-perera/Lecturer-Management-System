<?php
session_start();

if(!(isset($_SESSION['username']))){
    header('Location: ../login.php');
}

require_once "config/database.php";
//require_once "config/session.php";

$sql = "SELECT * FROM `user` LEFT JOIN `lecturer` ON `user`.`user_id`=`lecturer`.`user_id` WHERE `user`.`user_name`='".$_SESSION['username']."' ;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$lec_name=$row["lecturer_name"];
$lec_id=$row["lecturer_id"];
$lec_email=$row["email"];
$lec_nic=$row["nic"];
$lec_sd=$row["start_date"];
$lec_phone=$row["phone_number"];
$lec_userid=$row["user_id"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title> My Profile</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary-x sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <img class="sidebar-brand-text mx-3" style="width:103px ;" src="img/bci.png" alt="">
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="L_Dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="L_Course.php">
                    <i class="fas fa-book"></i>
                    <span>Courses</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Activity
            </div>
            <li class="nav-item">
                <a class="nav-link" href="L_MyCourse.php">
                    <i class="fas fa-book-reader"></i>
                    <span>My Courses</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Uploading_Files.php">
                    <i class="fas fa-file-alt"></i>
                    <span>My Files</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Academic
            </div>
            <li class="nav-item">
                <a class="nav-link" href="L_Calander.php">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Calendar</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item active">
                <a class="nav-link" href="L_Profile.php">
                    <i class="fas fa-id-badge"></i>
                    <span>Profile</span></a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$lec_name?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="L_Profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>

                <div class="container-fluid">

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Lecturer Profile</h1>
                    </div>

                    <div class="row justify-content-center">
                    
                        <div class="col-lg-6">
                                
                                <div class="card mb-4">
                                    <div class="card-header">My Profile</div>
                                    <div class="card-body">
                                        <form method="POST">
                                            
                                            <div class="mb-3">
                                                <h5>Name :</h5>
                                                <center>
                                                    <?=$lec_name?>
                                                </center>
                                            </div>
                                            <div class="mb-3">
                                                <h5>Lecturer ID :</h5>
                                                <center>
                                                    <?=$lec_id?>
                                                </center>
                                            </div>
                                            <div class="mb-3">
                                                <h5>Email :</h5>
                                                <center>
                                                    <?=$lec_email?>
                                                </center>
                                            </div>
                                            <div class="mb-3">
                                                <h5>NIC Number :</h5>
                                                <center>
                                                    <?=$lec_nic?>
                                                </center>
                                            </div>
                                            <div class="mb-3">
                                                <h5>Phone Number :</h5>
                                                <center>
                                                    <?=$lec_phone?>
                                                </center>
                                            </div>
                                            <div class="mb-3">
                                                <h5>Start Date :</h5>
                                                <center>
                                                    <?=$lec_sd?>
                                                </center>
                                            </div>
                                            <div class="mb-3">
                                                <h5>Username :</h5>
                                                <center>
                                                    <?=$_SESSION['username']?>
                                                </center>
                                            </div>
                                            <br>
                                            <div class="mb-3">
                                                <center>
                                                    <h5>Do you want to edit your profile?</h5>
                                                    <a href="L_EditProfile.php">Edit</a>
                                                </center>
                                            </div>
                                            <div class="mb-3">
                                                <center>
                                                    <a href="CPL.php">Change Password</a>
                                                </center>
                                            </div>
                                            
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>

                </div>

            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; BCI Campus BSc.IT 2021 Batch Group D</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="js/demo/datatables-demo.js"></script>
</body>

</html>