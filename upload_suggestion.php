<?php
// Check if the form was submitted
session_start();
$name=$_GET['uName'];
//echo $_SESSION['user'];
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


//  }
///////////////
  $subject=$_POST['subject'];
  $category=$_POST['category'];
  $description=$_POST['description'];

  $sql3="INSERT INTO suggestion_table (user_id, subject, category, suggestion)VALUES ('$name','$subject', '$category', '$description');";

  if ($con->query($sql3) === TRUE){
      $_SESSION['user']=$name;
      header('location:studentStartUpPage.php');
  }


?>
