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
mysqli_select_db($con, 'sgp');

$usrName = $_GET['adName'];
$OTP = rand(1001,9999);

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
$mail->addAddress($usrName);
$mail->Subject = "Student Grievance Portal : ONE TIME PASSWORD";
$mail->Body = "YOUR OTP : $OTP <br> DON'T SHARE THIS TO ANYONE.";
if(!$mail->send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
 }
 $sql_OTP = "UPDATE admin_details SET otp = $OTP WHERE id = '$usrName'";
 $result_OTP = $con->query($sql_OTP);
echo "<script>alert('AN OTP HAS BEEN SENT TO YOUR EMAIL ADDRESS');</script>";
?>

<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>IIIT Bhagalpur</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="google-site-verification" content="mYwq4kbzhLz2dI8Vg4EGJodW6puVKaFdzln7U-5aH-A" />

  <link href="css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="css/custom-styles.css">
  <link rel="stylesheet" href="css/centerNav.css">
  <link rel="stylesheet" href="css/login_demo.css">

  <link rel="shortcut icon" href="img/150dpi.png" type="image/x-icon" />

  <link rel = "stylesheet" href ="css/EmailCards.css">
  <script src="js/3.4.1-jquery.min.js"></script>
</head>

<body>

  <div class="header-wrapper">
    <div class="site-name">
      <table><tr><td><a href="iiitbh.ac.in"><img src="img/150dpi.png" height=80px></a></td><td><h1>भारतीय सूचना प्रौद्योगिकी संस्थान भागलपुर<br>Indian Institute of Information Technology Bhagalpur</h1></td></tr></table>
    </div>
  </div>
  <!-- Top navigation -->
<div class="topnav">
  <!-- Centered link -->
  <div class="topnav-centered">
    <a><h1>Student Grievance Portal</h1><a>
  </div>


  <!-- Right-aligned links -->
  <div class="topnav-right">
    <a href="iiitbh.ac.in">IIITBH</a>
  </div>

</div>

  <div class="form-box">

    <form id="user" class="input-group" action="changePasswordAdmin.php?adName=<?php echo $usrName;?>" method="post">
    <div class="head-box" style="margin-top:-50px;">
      <label style="font-size:25px; display:inline-block;">Change Your Password</label>
    </div>
    <br>
    <input type="text" name="otp" class="input-field" placeholder="OTP" id="o_t_p"required>
    <input type="text" name="newPass" class="input-field" placeholder="New Password" id="new_pass"required>
    <input type="text" name="cnfPass" class="input-field" placeholder="Confirm Password" id="cnf_pass"required>
    <button type="submit" class="submit-btn">Change Password</button>
    </form>
    <script>
    $(document).ready(function() {
    $('.submit-btn').click(function(e){
      var pass = document.getElementById("new_pass").value;
      var cnf = document.getElementById("cnf_pass").value;
      var OTP = document.getElementById("o_t_p").value;
        if (!(pass == cnf &&  OTP == <?php echo $OTP;?>)){
          alert("Enter Correct Details..");
              e.preventDefault();
              return false;
        }
      });
      });
    </script>

  </div>

<div class="footer">
  <p>Footer</p>
</div>


</body>
</html>
