<?php
session_start();
$servername = "localhost";
$username = "root";//username
$password = ""; //password

$con = mysqli_connect($servername, $username, $password);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
else{
}
mysqli_select_db($con, 'sgp');

$val_c_num=$_GET['c_num'];

$sql_rd_upd = "UPDATE complaint_box SET inbox_read = 0 WHERE complain_number ='$val_c_num'; ";
$result_rd_upd = $con->query($sql_rd_upd);


$_SESSION['user']=$_GET['uName'];
header('location:studentStartUpPage.php');

?>
