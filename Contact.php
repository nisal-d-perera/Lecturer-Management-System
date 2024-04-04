<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="Contact.css">
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
                    <li id="firstlist">Contact</li>
                    <li><a href="Login.php">Login</a></li>
                </ul>
            </div>
        </div>
        <section class="contact">
            <div class="content">
                <h1>Contact Us</h1>
            </div>
               <div class="container">
                    <div class="contactinfo">
                        <div class="box">
                            <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                            <div class="text">
                                <h3>Address</h3>
                                <p>Benadict XVI Catholic Institute,495,MInuwangoda Road, Bolawalana, Negombo, Sri Lanka</p>
                            </div>
                        </div>
                        <div class="box">
                            <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                            <div class="text">
                                <h3>Phone</h3>
                                <p>+94 706035100 </p>
                                <p>+94 766989797</p>
                            </div>
                        </div>
                        <div class="box">
                            <div class="icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                            <div class="text">
                                <h3>Email</h3>
                                <p>info@bci.lk </p>
                            </div>
                        </div>
                    </div>
                </div>
               <div class="contactform">
                <form method="POST">
                    <h2>Send massage</h2>
                    <div class="inputBox">
                        <input type="text" name="name" required="required">
                        <span>Full name</span>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="email" required="required">
                        <span>Email</span>
                   </div>
                   <div class="inputBox">
                        <textarea name = "text" required="required"></textarea>
                        <span> Type your massage</span>
                   </div>
                  
                   <div class="inputBox">
                     <input type="submit" name="submit" value="Send">
                   </div>
                </form>
  
               </div>
            <div>
    
        </section>

    </div>
    
</body>
</html>
<?php
require_once "System/config/database.php";
if (isset($_POST['submit'])) {

    $name=$_POST['name'];
    $mail=$_POST['email'];
    $msg=$_POST['text'];
    
    $sql="INSERT INTO `message`( `id`, `full_name`, `email`, `body`) VALUES ('','$name','$mail','$msg')";
    $conn->query($sql);

    echo "<script>window.location.href='contact.php';</script>";
}
?>