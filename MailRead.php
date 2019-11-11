<?php
//echo $_SESSION['user'];
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
$sql = "select * from complaint_box where complain_number =  ".$_POST['c_num']."; ";

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
    var filename = "<?php while($row=mysqli_fetch_array($result)) echo $row['uploaded_filename']; $result->data_seek(0); ?>";
    var description = `<?php while($row=mysqli_fetch_array($result)) echo nl2br($row['description']); ?>`;

  $('.email-body').append('<div class="Subject"> '+subject+'</div>');
  $('.email-body').append('<div class="Information-Mail"> '+sender+'</div>');
  $('.email-body').append('<div class ="mail-page">'+description+'</div>');
  if(filename != 'none')
    $('.email-body').append('<a href="upload/'+filename+'" download > Download Attachment </a> ');
  });
</script>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
<script>
$("#PDFDownload").click(function () {

  domtoimage.toPng(document.getElementById('PDFcontent'))
        .then(function (blob) {
            var pdf = new jsPDF('l', 'pt', [$('#PDFcontent').width(), $('#PDFcontent').height()]);

            pdf.addImage(blob, 'PNG', 0, 0, $('#PDFcontent').width(), $('#PDFcontent').height());
            pdf.save("Complain.pdf");

            that.options.api.optionsChanged();
        });

});

</script>
</head>
<body>
  <div class="email-body" id="PDFcontent">
    <link rel = "stylesheet" href ="css/EmailCards.css">
  </div>
  <div class ="approve" id="myBtn">Approve</div>
  <div class ="approve" id="myBtn2" onclick="location.href='forward_category.php?c_num=<?php echo $_POST['c_num']; ?>&adName=<?php echo $_POST['adName']; ?>'">Forward</div>

  <div class ="download" id="PDFDownload">Save As PDF</div>
  <div id="editor"></div>
  <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
      <form action="solved_table_update.php?c_num=<?php echo $_POST['c_num']; ?>&adName=<?php echo $_POST['adName']; ?> " method="post">
      <span class="close">&times;</span>
      <label for="remark">Remarks</label><br /><br />
      <textarea id="approveRemark" name="approve-remark" placeholder="Write how the problem was solved or can be solved...." rows="6" required></textarea>
      <button  type="submit" class ="approve" id="approve-confirm">Confirm Approval</button>
    </form>
    </div>

  </div>
  </body>
</html>
