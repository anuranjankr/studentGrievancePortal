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


$sql = "select complain_number,subject from complaint_box,admin_details where admin_details.id = '".$_POST['uName']."' && complaint_box.category = admin_details.category && complaint_box.level >= admin_details.level && solved_by == 'NONE' ; ";
$result = $con->query($sql);
?>

<html>
<head>
<title>
  Student Portal
</title>
</head>
<body>
  <link rel = "stylesheet" href ="css/EmailCards.css">
  <script src="js/3.4.1-jquery.min.js"></script>
  <script>
    var cardNo = 0;
    var pageLimit="<?php echo $result->num_rows;?>";
    var emailsLeft = pageLimit;
    var i;
    $(document).ready(function() {
      var passNoDelete = -1;
      for(i=1;i<=pageLimit;i++)
      {
        var pass1 = '.'+i;
        var pass2 = '#'+"Checkbox"+i;
        var modal = document.getElementById("myModal");
        $(pass1).click(function(e) {
            var myClass = $(this).attr("class");
            var closePass1 = '.'+'card'+myClass;
            cardNo = closePass1;
            e.stopPropagation();

            // Get the button that opens the modal
            //  var btn = document.getElementById("closed");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

              modal.style.display = "block";

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
              modal.style.display = "none";
            }

        });
        $(pass2).click(function(e) {
          e.stopPropagation();
        });
      }

      $('#approve-reject').click(function(e) {
      var val = document.getElementById('approveRemark').value;
    //  document.getElementById('myModal').style.display="none";
      if(val != 0)
        {
          $(cardNo).remove();
          document.getElementById('myModal').style.display="none";
          emailsLeft--;
          if(emailsLeft == 0){
            $('.EmailList').append('<h1 class="no_mails"><center> No mails for you </center><h1>');
          }
        }
        else {
          e.stopPropagation();
        }
      });
      var adm="<?php echo $_POST['uName'];?>";
      for(i=1;i<=pageLimit;i++)
      {
        var pass1 = '.'+'card'+i;
        $(pass1).click(function() {
          var myClass = $(this).attr("class");
          var res_id=myClass.substr(4);
          var pass2 = '.'+'mail-title'+res_id;
          var val = parseInt($(pass2).text());
              $(".EmailList").load("MailRead.php",{c_num: val,adName: adm});
        });
      }
  });
  </script>
  <div class="EmailList">
    <?php
    $k = 1;
    if($result)
    {
      while($row=mysqli_fetch_array($result)){
        echo '<div id="myCard" class="card'.$k.'"><div class="card-content"><input type="checkbox" id="Checkbox'.$k.'" /><span class="card-hyperlink'.$k.'" id="hrefing"><span class="mail-title'.$k.'"><b>'.$row['complain_number'].'</b></span><span class="mail-description"><b>'.$row['subject'].'</b></span></span><button type= "button" id = "closed" class="'.$k.'"></button></div></div>';
        $k++;
      }
    }
    else {
      echo '<h1 class="no_mails"><center> No mails for you </center><h1>';
    }
    ?>
  </div>
  <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
      <span class="close">&times;</span>
      <label for="remark">Reject (Remarks) :</label><br /><br />
      <textarea id="approveRemark" name="approve-remark" placeholder="Write why it was rejected..." rows="6"></textarea>
      <br>
      <br>
      <div class ="approve" id="approve-reject">Confirm Rejection</div>
    </div>

  </div>
</body>
</html>
