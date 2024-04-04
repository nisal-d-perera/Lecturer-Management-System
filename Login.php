<?php
require_once "System/config/database.php";
session_start();


if (isset ($_POST['submit']) ) {

    if ($stmt = $conn->prepare('SELECT user_name, password ,type FROM user WHERE user_name = ?')) {
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result( $user_name, $password ,$type);
            $stmt->fetch();
            $post_password=$_POST['password'];
            if ($post_password== $password) { 
                session_regenerate_id();
                $_SESSION['Login']=$_POST['username'];
                $_SESSION['username'] =$user_name;
                if ($type == "admin"){
                    header('Location: System/index.php');
                }
                else if($type == "coordinator") {
                    header('Location: System/C_Dashboard.php');
                }
                else if($type == "lecturer") {
                    header('Location: System/L_Dashboard.php');
                }
            } else {
                echo "<script>alert('Incorrect Password');document.location='Login.php'</script>";
            }
        } else {
        echo "<script>alert('Incorrect User Name');document.location='Login.php'</script>";
        }
        $stmt->close();
    }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="Login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <div class="bgimage">
        <div class="menu">

            <div class="leftmenu">
                <img src="images/bci2.png" alt="">
            
            </div>

            <div class="rightmenu">
                <ul>
                    <li><a href="index.html"> Home</a></li>
                    <li><a href="AboutUs.html">About Us</a></li>
                    <li><a href="Contact.php">Contact</a></li>
                    <li id="firstlist">Login</a></li>
                </ul>
            </div>
        </div>

        <div class = "login-box">

            <h1>Login</h1>
            <form method="post">
                <div class = "user-box">
                    <input type = "text" name = "username" required = "">
                    <label>Username</label>
                </div>
                <div class = "user-box">
                    <input type = "password" name = "password" required = "">
                    <label>Password</label>
                </div>



                <a>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <input style="
                    font-size: 20px;
                    color: white;
                    background-color: transparent;
                    border-color: transparent;
                " type="submit" name="submit" value="Login">
                    
                </a> 
                <!-- <input type="submit" id="login" name="login" value="Login">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span> -->
                
            </form>
        
        </div>
    </div>
</body>
</html>
