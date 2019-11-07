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

//echo $_POST['c_num'];
$sql = "select * from complaint_box where complain_number =  ".$_GET['c_num']."; ";

$result = $con->query($sql);

    $arrivalDate='';
    $level=0;
    $sub='';
    $cp_num='';
    $descrp='';
    $usr='';
    $category='';
    $sol_by=$_GET['adName'];
    $result->data_seek(0);
    while($row=mysqli_fetch_array($result)){
      $usr = $row['user_id'];
      $sub = $row['subject'];
      $category = $row['category'];
      $cp_num = $row['complain_number'];
      $descrp = $row['description'];
      $arrivalDate = $row['arrival_date'];
      $level = $row['level'];
    }

    $sql_app="INSERT INTO solved_complain (complain_number, user_id, category, level, subject, description, arrival_date, solved_by, Remarks)VALUES ('$cp_num', '$usr', '$category', '$level', '$sub', '$descrp', '$arrivalDate', '$sol_by', '".$_POST['approve-remark']."')";
    if($con->query($sql_app) == TRUE){
      $_SESSION['user']=$_GET['adName'];
      header('location:adminStartUpPage.php');
    }

?>
