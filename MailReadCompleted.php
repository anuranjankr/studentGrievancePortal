
<?php
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


  $sql1 = "select * from solved_complain where complain_number =  ".$_POST['s_num']."; ";
  $result1 = $con->query($sql1);

?>


<html>
<head>
<title>Mail-Page</title>
<script src="js/3.4.1-jquery.min.js"></script>
<script src="js/jsPDF.js"></script>
<script src="js/dom-to-image.js"></script>
<script>
  $(document).ready(function() {

  var usrname = "<?php while($row=mysqli_fetch_array($result1)) echo $row['user_id']; $result1->data_seek(0); ?>";
  var subject = "<?php while($row=mysqli_fetch_array($result1)) echo $row['subject']; $result1->data_seek(0); ?>";
  var sender = "<?php while($row=mysqli_fetch_array($result1)) echo $row['complain_number']; $result1->data_seek(0); ?>";
  var description = `<?php while($row=mysqli_fetch_array($result1)) echo nl2br($row['description']); ?>`;
  $('.email-body').append('<div class="Username"> ' + '<b>From</b> : &lt ' + usrname + ' &gt' + '</div>');
  $('.email-body').append('<div class="Subject"> '+'<b>Subject</b> : '+subject+'</div>');
  $('.email-body').append('<div class="Information-Mail"> '+'<b>Complain No.<b> : '+sender+'</div>');
  $('.email-body').append('<div class ="mail-page">'+description+'</div>');


  });
</script>
</head>
<body>
  <div class="email-body" id="PDFcontentSent">
    <link rel = "stylesheet" href ="css/EmailCards.css">
  </div>
  </body>
</html>
