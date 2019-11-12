<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


session_start();
$uName=$_GET['uName'];
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

$sql_lvl_adm="SELECT solved_by FROM complaint_box WHERE complain_number='$c_num'; ";
$result_lvl_adm=$con->query($sql_lvl_adm);

$adm_lvl ='';
while($row=mysqli_fetch_array($result_lvl_adm)){
  $adm_lvl = $row['solved_by'];
}


$sql_lvl_adm_up="SELECT id FROM admin_details WHERE (category=(SELECT category FROM admin_details WHERE id='$adm_lvl') && level=(SELECT level FROM admin_details WHERE id='$adm_lvl')-1)||(category='all' && ((SELECT level FROM admin_details WHERE id='$adm_lvl')-1)=0)";
$result_lvl_adm_up=$con->query($sql_lvl_adm_up);
$adm_up ='';
while($row=mysqli_fetch_array($result_lvl_adm_up)){
  $adm_up = $row['id'];


$sql = "select * from solved_complain where complain_number = '$c_num'; ";

$result = $con->query($sql);
while($row=mysqli_fetch_array($result))
 $subject = $row['subject'];
$result->data_seek(0);

while($row=mysqli_fetch_array($result))
 $description = $row['description'];
$result->data_seek(0);

while($row=mysqli_fetch_array($result))
 $remarks = $row['Remarks'];
$result->data_seek(0);



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
  $mail->addAddress($adm_lvl);
  $mail->AddCC($uName);
  $mail->Subject = "[FWD: ".$subject." ]";
  $mail->Body = "A Dispute was raised by :".$uName." on "."<b><u>Complain No. : </u></b>".$c_num."<br>"."<b><u>Description </u><b>"."<br>".$description."<br>"."<b><u>Remark by </u><b>".$adm_lvl."<br>".$remarks;
  if(!$mail->send()) {
     echo 'Message could not be sent.';
     echo 'Mailer Error: ' . $mail->ErrorInfo;
     exit;
   }


 $sql_lvl_query="UPDATE complaint_box SET level=(SELECT level FROM complaint_box WHERE complain_number='$c_num')-1 WHERE complain_number='$c_num';";
 $result_lvl_query=$con->query($sql_lvl_query);


   $_SESSION['user']=$uName;
   header('location:studentStartUpPage.php');

}

?>
