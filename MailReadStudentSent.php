
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


  $sql1 = "select subject,complain_number,description from complaint_box where complain_number =  ".$_POST['s_num']."; ";
  $result1 = $con->query($sql1);

  $sql2 = "select subject,suggestion_number,suggestion from suggestion_table where suggestion_number =  ".$_POST['s_num']."; ";
  $result2 = $con->query($sql2);


?>


<html>
<head>
<title>Mail-Page</title>
<script src="js/3.4.1-jquery.min.js"></script>
<script src="js/jsPDF.js"></script>
<script src="js/dom-to-image.js"></script>
<script>
  $(document).ready(function() {
  if(<?php echo $result2->num_rows; ?>){
  var subject = "<?php while($row=mysqli_fetch_array($result2)) echo $row['subject']; $result2->data_seek(0); ?>";
  var sender = "<?php while($row=mysqli_fetch_array($result2)) echo $row['suggestion_number']; $result2->data_seek(0); ?>";
  var description = `<?php while($row=mysqli_fetch_array($result2)) echo nl2br($row['suggestion']);  ?>`;
  $('.email-body').append('<div class="Subject"> '+'<b>Subject</b> : '+subject+'</div>');
  $('.email-body').append('<div class="Information-Mail"> '+'<b>Suggestion No.<b> : '+sender+'</div>');
  $('.email-body').append('<div class ="mail-page">'+description+'</div>');

}
else if(<?php echo $result1->num_rows; ?>){
  var subject = "<?php while($row=mysqli_fetch_array($result1)) echo $row['subject']; $result1->data_seek(0); ?>";
  var sender = "<?php while($row=mysqli_fetch_array($result1)) echo $row['complain_number']; $result1->data_seek(0); ?>";
  var description = `<?php while($row=mysqli_fetch_array($result1)) echo nl2br($row['description']); ?>`;
  $('.email-body').append('<div class="Subject"> '+'<b>Subject</b> : '+subject+'</div>');
  $('.email-body').append('<div class="Information-Mail"> '+'<b>Complain No.<b> : '+sender+'</div>');
  $('.email-body').append('<div class ="mail-page">'+description+'</div>');

}

  });
</script>
</head>
<body>
  <div class="email-body" id="PDFcontentSent">
    <link rel = "stylesheet" href ="css/EmailCards.css">
  </div>
  </body>
</html>
