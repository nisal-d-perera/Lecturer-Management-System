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
$lec_mail=$row["email"];
$lec_nic=$row["nic"];
$lec_sd=$row["start_date"];
$lec_phone=$row["phone_number"];
$lec_address=$row["address"];
$lec_birth=$row["birth_date"];
$lec_user=$row["user_id"];
$pass = $row["password"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Change Password</title>
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
                <a class="nav-link" href="C_Dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="C_Degree.php">
                    <i class="fas fa-user-graduate"></i>
                    <span>Degrees</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="C_Course.php">
                    <i class="fas fa-book"></i>
                    <span>Courses</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="C_Lecturer.php">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span>Lecturers</span></a>
            </li>
            
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Activity
            </div>
            <li class="nav-item">
                <a class="nav-link" href="C_MyCourse.php">
                    <i class="fas fa-book-reader"></i>
                    <span>My Courses</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Uploading_Files_C.php">
                    <i class="fas fa-file-alt"></i>
                    <span>My Files</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Academic
            </div>
            <li class="nav-item">
                <a class="nav-link" href="C_Calander.php">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Calendar</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item active">
                <a class="nav-link" href="C_Profile.php">
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
                                <a class="dropdown-item" href="C_Profile.php">
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
                        <h1 class="h3 mb-0 text-gray-800">Update</h1>
                    </div>

                    <div class="row justify-content-center">
                    
                        <div class="col-lg-6">
                                
                                <div class="card mb-4">
                                    <div class="card-header">Change Password[<?=$lec_id?>] </div>
                                    <div class="card-body">
                                        <form method="POST">
               
                                            
                                            <div class="mb-3">
                                                <label class="small mb-1" for="cpassword">Current Password</label>
                                                <input class="form-control" id="cpassword" name="cpassword" type="password" placeholder="Current Password" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="small mb-1" for="npassword">New Password</label>
                                                <input class="form-control" id="npassword" name="npassword" type="password" placeholder="New Password" required>
                                            </div>
                                            <h6 style="color:red;">*Does not match</h6>
                                            <div class="mb-3">
                                                <label class="small mb-1" for="conpassword">Confirm Password</label>
                                                <input class="form-control" id="conpassword" name="conpassword" type="password" placeholder="Confirm Password" required>
                                            </div>
                                            <input type="submit" class="btn btn-primary" value="Submit" name="submit">
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

<?php
if (isset($_POST['submit'])) {

    //$faculty_id=$_POST['faculty_id'];
    $cu_pass=$_POST['cpassword'];
    $ne_pass=$_POST['npassword'];
    $co_pass=$_POST['conpassword'];

    if ($pass == $cu_pass){
        if ($ne_pass == $co_pass){
            $sql="UPDATE `user` SET `password`='$co_pass' WHERE user.user_id = '$lec_user';";
            $conn->query($sql);
            echo "<script>window.location.href='C_Profile.php';</script>";
        }
        else {
            echo "The confirm password does not match the new password! Try again";
            echo "<script>window.location.href='CPCm.php';</script>";
        }
    }
    else{
        echo "Wrong Password! Try again";
        echo "<script>window.location.href='CPCw.php';</script>";
    }
}
?>