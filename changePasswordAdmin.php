<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


$servername = "localhost";
$username = "root";//username
$password = ""; //password

$con = mysqli_connect($servername, $username, $password);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
else{
}
$pass=$_POST['newPass'];
$pass=md5($pass);
$usrName=$_GET['adName'];
mysqli_select_db($con, 'sgp');
    $sql_PASS = "UPDATE admin_details SET password = '$pass' WHERE id = '$usrName';";
    $result_PASS = $con->query($sql_PASS);
    require 'PHPMailer/vendor/autoload.php';

    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->isHTML(true);
    $mail->Username = "pritampal99@gmail.com";
    $mail->Password = "99914090";
    $mail->setFrom('pritampal99@gmail.com', 'Pritam Pal');
    $mail->addAddress($_GET['adName']);
    $mail->Subject = "Student Grievance Portal : PASSWORD CHANGED SUCCESSFULLY";
    $mail->Body = "YOUR PASSWORD WAS SUCCESSFULLY CHANGED <br><br> IF YOU DONOT RECOGNIZE THIS ACTIVITY, KINDLY CONTACT YOUR ADMIN.";
    $mail->send();

    header("location:login_demo.html");
?>
