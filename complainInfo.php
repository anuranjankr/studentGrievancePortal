<?php
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

$sql_total = "select * from complaint_box;";
$result_total = $con->query($sql_total);

$sql_pending = "select * from complaint_box where solved_by='NONE'; ";
$result_pending = $con->query($sql_pending);

$completed=$result_total->num_rows - $result_pending->num_rows;

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

<a href="login_demo.html">Back To Portal</a>
  <!-- Right-aligned links -->
  <div class="topnav-right">
    <a href="iiitbh.ac.in">IIITBH</a>
  </div>

</div>

<br><br><br><br><br><br><br>
<div class="Complain-info" style="width:350px;height:200px;margin-left:auto;margin-right:auto;padding:30px 25px 30px 25px;background-color:rgba(0,220,140,0.4);border-radius: 10px;box-shadow: 0px 1px 1px 1px rgba(0,0,0,0.15);
-webkit-box-shadow: 0px 1px 1px 1px rgba(0,0,0,0.15);
-moz-box-shadow: 0px 1px 1px 1px rgba(0,0,0,0.15);">

  <label id="total-complain"> Total complain :
    <?php echo "<label style='color:rgba(255,0,0,0.8);'>".$result_total->num_rows."</label>";?>
  </label>
  <br><br>
  <label id="total-solved-complain"> Total complains solved:
       <?php echo "<label style='color:rgba(255,0,0,0.8);'>".$completed."</label>";?>
  </label>
  <br><br>
  <label id="total-pending-complain"> Total complain pending:
  <?php echo "<label style='color:rgba(255,0,0,0.8);'>".$result_pending->num_rows."</label>";?>
  </label>
</div>


<div class="footer-box">
              Copyright &copy Indian Institute of Information Technology Bhagalpur
    </div>
</body>
</html>
