<?php
$conn = mysqli_connect("localhost","root","","tbl_events") ;

if (!$conn)
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>