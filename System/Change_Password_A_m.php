<?php
session_start();

if(!(isset($_SESSION['username']))){
    header('Location: ../login.php');
}
require_once "config/database.php";
//require_once "config/session.php";

$sql = "SELECT * FROM `user` LEFT JOIN `admin` ON `user`.`user_id`=`admin`.`user_id` WHERE `user`.`user_name`='".$_SESSION['username']."' ;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$admin_name=$row["admin_name"];
$admin_id=$row["admin_id"];
$admin_mail=$row["email"];
$admin_nic=$row["nic"];
$admin_sd=$row["start_date"];
$admin_phone=$row["phone_number"];
$admin_user=$row["user_id"];
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
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Faculties"
                    aria-expanded="true" aria-controls="Faculties">
                    <i class="fas fa-university"></i>
                    <span>Faculties</span>
                </a>
                <div id="Faculties" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Faculties option :</h6>
                        <a class="collapse-item" href="ManageFaculties.php">Manage Faculties</a>
                        <a class="collapse-item" href="Add_New_Faculties.php">Add New Faculty</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Departments"
                    aria-expanded="true" aria-controls="Departments">
                    <i class="fas fa-graduation-cap"></i>
                    <span>Departments</span>
                </a>
                <div id="Departments" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="ManageDepartment.php">Manage Departments</a>
                        <a class="collapse-item" href="Add_New_Department.php">Add New Department</a>

                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Degrees"
                    aria-expanded="true" aria-controls="Degrees">
                    <i class="fas fa-user-graduate"></i>
                    <span>Degrees</span>
                </a>
                <div id="Degrees" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="ManageDegress.php">Manage Degrees</a>
                        <a class="collapse-item" href="Add_New_Degress.php">Add New Degree</a>

                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Courses"
                    aria-expanded="true" aria-controls="Courses">
                    <i class="fas fa-book"></i>
                    <span>Courses</span>
                </a>
                <div id="Courses" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="ManageCourse.php">Manage Courses</a>
                        <a class="collapse-item" href="Add_New_Course.php">Add New Course</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Lecturers"
                    aria-expanded="true" aria-controls="Lecturers">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span>Lecturers</span>
                </a>
                <div id="Lecturers" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="ManageLectures.php">Manage Lecturers</a>
                        <a class="collapse-item" href="Add_New_Lectures.php">Add New Lecturer</a>

                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Users"
                    aria-expanded="true" aria-controls="Users">
                    <i class="fas fa-user"></i>
                    <span>Users</span>
                </a>
                <div id="Users" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="ManageUser.php">Manage Users</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Academic
            </div>
            <li class="nav-item">
                <a class="nav-link" href="Calander.php">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Calendar</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="Message.php">
                    <i class="fas fa-envelope"></i>
                    <span>Messages</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="Profile.php">
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$admin_name?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="Profile.php">
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
                                    <div class="card-header">Change Password [<?=$admin_id?>] </div>
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
            $sql="UPDATE `user` SET `password`='$co_pass' WHERE user.user_id = '$admin_user';";
            $conn->query($sql);
            echo "<script>window.location.href='profile.php';</script>";
        }
        else {
            echo "The confirm password does not match the new password! Try again";
            echo "<script>window.location.href='Change_Password_A_m.php';</script>";
        }
    }
    else{
        echo "Wrong Password! Try again";
        echo "<script>window.location.href='Change_Password_A_w.php';</script>";
    }
}
?>