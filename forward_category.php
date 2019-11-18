<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


session_start();
$adName=$_GET['adName'];
$c_num=$_GET['c_num'];
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

$sql_lvl_up="UPDATE complaint_box SET level=(SELECT level FROM complaint_box WHERE complain_number='$c_num')-1 WHERE complain_number='$c_num';";
$result_lvl_up=$con->query($sql_lvl_up);

$sql_lvl_adm="SELECT id FROM admin_details WHERE category=(SELECT category FROM admin_details WHERE id='$adName') && level=(SELECT level FROM admin_details WHERE id='$adName')-1;";
$result_lvl_adm=$con->query($sql_lvl_adm);

$sql = "select * from complaint_box where complain_number = '$c_num'; ";
$result = $con->query($sql);

while($row=mysqli_fetch_array($result))
 $subject = $row['subject'];
$result->data_seek(0);

while($row=mysqli_fetch_array($result))
 $description = $row['description'];
$result->data_seek(0);

$usrId ='';
while($row=mysqli_fetch_array($result))
  $usrId = $row['user_id'];
$result->data_seek(0);

$fileName ='NONE';
while($row=mysqli_fetch_array($result))
  $fileName = $row['uploaded_filename'];



$adm_up ='';
while($row=mysqli_fetch_array($result_lvl_adm)){
  $adm_up = $row['id'];


  require 'PHPMailer/vendor/autoload.php';

  $mail = new PHPMailer();

  $mail->isSMTP();
  $mail->SMTPAuth = true;
  $mail->SMTPDebug = 1;
  $mail->SMTPSecure = 'tls';
  $mail->Host = "smtp.gmail.com";
  $mail->Port = 587;
  $mail->isHTML(true);
  $mail->Username = "pritampal99@gmail.com";
  $mail->Password = "99914090";
  $mail->setFrom('pritampal99@gmail.com', 'Pritam Pal');
  $mail->addAddress($adm_up);
  $mail->addAddress($adName);
  $mail->AddCC($usrId);
  $mail->Subject = "[FWD: ".$subject." ]";
  $mail->Body = "The following complain was forwarded by :".$adName."<br>"."<b><u>Complain No. : </u></b>".$c_num."<br>"."<b><u>Description </u><b>"."<br>".$description;
  if($fileName != 'NONE')
    $mail->addAttachment("upload/".$fileName);
  if(!$mail->send()) {
     echo 'Message could not be sent.';
     echo 'Mailer Error: ' . $mail->ErrorInfo;
     exit;
   }

   $_SESSION['user']=$adName;
   header('location:adminStartUpPage.php');


}

?>
