
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
$sql = "select subject,complain_number,description from complaint_box where complain_number =  ".$_POST['c_num']."; ";

$result = $con->query($sql);
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
  var description = `<?php while($row=mysqli_fetch_array($result)) echo nl2br($row['description']); ?>`;
  //var descrp=description.replace(/(\r\n|\n|\r)/gm,"<br>");
  $('.email-body').append('<div class="Subject"> '+subject+'</div>');
  $('.email-body').append('<div class="Information-Mail"> '+sender+'</div>');
  $('.email-body').append('<div class ="mail-page">'+description+'</div>');
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
  $isDisplay = 0;
  if($isDisplay){ ?>
  <div class ="approve" id="myBtn" onclick="location.href='raiseDispute.php?c_num=<?php echo $_POST["c_num"]; ?>&uName=<?php echo $_POST["uName"]; ?>'">Raise Dispute</div>
  <?php }
  ?>
  <div class ="download" id="PDFDownload">Save As PDF</div>
  </body>
</html>
