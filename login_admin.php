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

$name = $_POST['admin_id'];
$pass = md5($_POST['password']);

$sql = "select * from admin_details where id = '$name' && password ='$pass'";

$result = $con->query($sql);


if(isset($result->num_rows) && $result->num_rows > 0){
  $_SESSION['user']=$name;
  header('location:adminStartUpPage.php');
}
else{
  header('location:login_demo.html');
}
$con->close();
?>
