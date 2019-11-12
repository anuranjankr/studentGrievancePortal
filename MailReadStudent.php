
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

//echo $_POST['c_num'];
$sql = "select * from complaint_box where complain_number =  ".$_POST['c_num']."; ";
$result = $con->query($sql);

$sql1 = "select * from solved_complain where complain_number =  ".$_POST['c_num']."; ";
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
  var subject = "<?php while($row=mysqli_fetch_array($result)) echo $row['subject']; $result->data_seek(0); ?>";
  var sender = "<?php while($row=mysqli_fetch_array($result)) echo $row['complain_number']; $result->data_seek(0); ?>";
  var description = `<?php while($row=mysqli_fetch_array($result)) echo nl2br($row['description']); $result->data_seek(0);?>`;
  var remark = `<?php while($row=mysqli_fetch_array($result1)) echo nl2br($row['Remarks']); $result1->data_seek(0);?>`;
  var solved_by = "<?php while($row=mysqli_fetch_array($result)) echo $row['solved_by']; $result->data_seek(0); ?>";

  $('.email-body').append('<div class="Subject"> '+'<b>Subject</b> : '+subject+'</div>');
  $('.email-body').append('<div class="Information-Mail"> '+'<b>Complain No.<b> : '+sender+'</div>');
  $('.email-body').append('<div class ="mail-page">'+description);
  <?php
  $isDisplay='';
  while($row=mysqli_fetch_array($result)){
      $isDisplay = $row['solved_by'];
    }
  if($isDisplay != "NONE"){?>
  $('.email-body').append('Remarks : '+remark+'<br><b>Solved By : </b>'+solved_by+'</div>');
  <?php }?>
});
</script>

<script>
$("#PDFDownload").click(function () {

  domtoimage.toPng(document.getElementById('PDFcontentStudent'))
        .then(function (blob) {
            var pdf = new jsPDF('l', 'pt', [$('#PDFcontentStudent').width(), $('#PDFcontentStudent').height()]);

            pdf.addImage(blob, 'PNG', 0, 0, $('#PDFcontentStudent').width(), $('#PDFcontentStudent').height());
            pdf.save("Complain.pdf");

            that.options.api.optionsChanged();
        });

});

</script>
</head>
<body>
  <div class="email-body" id="PDFcontentStudent">
    <link rel = "stylesheet" href ="css/EmailCards.css">
  </div>
  <?php
  $isDisplay='';
  $lvl_disp=-99;
  $result->data_seek(0);
  while($row=mysqli_fetch_array($result)){
      $lvl_disp=$row['level'];
      $isDisplay = $row['solved_by'];
    }
  if($isDisplay != "NONE" && $lvl_disp > 0){ ?>
  <div class ="approve" id="myBtn" onclick="location.href='raiseDispute.php?c_num=<?php echo $_POST["c_num"]; ?>&uName=<?php echo $_POST["uName"]; ?>'">Raise Dispute</div>
  <?php }
  ?>
  <div class ="download" id="PDFDownload">Save As PDF</div>
  </body>
</html>
