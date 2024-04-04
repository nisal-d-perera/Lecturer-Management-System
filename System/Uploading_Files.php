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
$lecturer_name=$row["lecturer_name"];
$lec_id = $row["lecturer_id"];

if(isset($_POST['upload'])){
	
	$sql = "SELECT MAX(document_id) FROM `uplodings`;";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$max_doc= $row["MAX(document_id)"];


    $filename=$_FILES["file"]["name"];
    $fileext=strstr($filename,'.');
    $url= ($max_doc+1) . $fileext;
	
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    } else {
      if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        rename($target_file,$target_dir.$url);
	    $sql= "INSERT INTO `uplodings`(`document_id`, `title`, `description`, `url`, `lecturer_id`) VALUES ('','".$_POST['title']."','".$_POST['description']."','$url','$lec_id');";
        $conn->query($sql);
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
    
}
if (isset($_GET['delete'])){
    $sql="DELETE FROM `uplodings` WHERE  document_id='".$_GET['delete']."' ";
    $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>My Files</title>
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
            <li class="nav-item active">
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
            <li class="nav-item">
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$lecturer_name?></span>
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
                        <h1 class="h3 mb-0 text-gray-800">Uploading Files</h1>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="card mb-4">
                                <div class="card-header">File Details</div>
                                <div class="card-body">
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label class="small mb-1" for="title">Title</label>
                                            <input class="form-control" id="title" type="text" name="title" placeholder="Title" require>
                                        </div>
                                        <div class="mb-3">
                                            <label class="small mb-1" for="description">Description</label>
                                            <input class="form-control" id="description" type="text" name="description" placeholder="Description" require>
                                        </div>
                                        <div class="mb-3">
                                            <label class="small mb-1" for="semester">File</label>
                                            <input class="form-control" type="file"  name="file" id="file" placeholder="File" require>
                                        </div>
                                        <input type="submit" class="btn btn-primary" value="Submit" name="upload">
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Files</h6>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>URL</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>URL</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            
                                        <?php
                                        $sql = "SELECT * FROM `uplodings` WHERE  uplodings.lecturer_id = '$lec_id' ;";
                                        $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {
                                                    echo "<tr>
                                                    <td>".$row["title"]."</td>
                                                    <td>".$row["description"]."</td>
                                                    <td><a href=uploads/".$row["url"].">".$row["url"]."</a></td>
                                                    <td><center> <a class='btn btn-primary' href=?delete=".$row["document_id"]."> DELETE </a></center></td>
                                                    </tr>"; 
                                                }
                                            } 
                                        ?>
                                        </tbody>
                                    </table>
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

