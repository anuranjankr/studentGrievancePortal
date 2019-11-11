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

$usrName=$_POST['uName'];
$sql1 = "select complain_number,subject from complaint_box where user_id = '".$_POST['uName']."' ORDER BY arrival_date DESC; ";
$result1 = $con->query($sql1);

$sql2 = "select suggestion_number,subject from suggestion_table where user_id = '".$_POST['uName']."' ORDER BY arrival_date DESC ; ";
$result2 = $con->query($sql2);

$numRows= $result1->num_rows + $result2->num_rows;
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
    var pageLimit=<?php echo $numRows;?>;
    var emailsLeft = pageLimit;
    var i;
    $(document).ready(function() {
/*  for(i = 1; i <= pageLimit; i++) {
        $(".EmailList").append('<div id="myCard" class="card'+i+'"><div class="card-content"><input type="checkbox" id="Checkbox'+i+'" /><span class="card-hyperlink'+i+'" id="hrefing"><span class="mail-title"><b>SAMPLE MAIL'+i+' SUBJECT</b></span><span class="mail-description"><b>DESCRIPTION FOR MAIL'+i+'</b></span></span><button type= "button" id = "closed" class="'+ i +'"></button></div></div>');
      }*/
      var passNoDelete = -1;
      for(i=1;i<=pageLimit;i++)
      {
        var pass1 = '.'+i;
        var pass2 = '#'+"Checkbox"+i;
        $(pass1).click(function(e) {
            var myClass = $(this).attr("class");
            var closePass1 = '.'+'card'+myClass;
            if(confirm("Want to delete?"))
              {
                $(closePass1).remove();
                emailsLeft--;
                if(emailsLeft == 0){
                  $('.EmailList1').append('<h1 class="no_mails"><center> No mails for you </center><h1>');
                }
              }
              else {
                e.stopPropagation();
              }
        });
        $(pass2).click(function(e) {
          e.stopPropagation();
        });
      }
      for(i=1;i<=pageLimit;i++)
      {
        var pass1 = '.'+'card'+i;
        $(pass1).click(function() {
          var myClass = $(this).attr("class");
          var res_id=myClass.substr(4);
          var pass2 = '.'+'mail-title1'+res_id;
          var val = parseInt($(pass2).text());
        $(".EmailList1").load("MailReadStudentSent.php", {s_num: val });

        });
      }
  });
  </script>
  <div class="EmailList1">
    <?php
    $k = 1;
  //  if($result2 || $result1){
    while($row=mysqli_fetch_array($result2)){
    //  echo $row['complain_number']." ";
    //  echo $row['subject'];
    //  echo "<br>";
    echo '<div id="myCard" class="card'.$k.'"><div class="card-content"><input type="checkbox" id="Checkbox'.$k.'" /><span class="card-hyperlink'.$k.'" id="hrefing"><span class="mail-title1'.$k.'"><b>'.$row['suggestion_number'].'</b></span><span class="mail-description"><b>'.$row['subject'].'</b></span></span><button type= "button" id = "closed" class="'.$k.'"></button></div></div>';
    //$sql3="Insert Into temp Select suggestion_number,subject,suggestion From suggestion_table; ";
  //  $result3=$con->query($sql3);

      $k++;
    }
      while($row=mysqli_fetch_array($result1)){

          echo '<div id="myCard" class="card'.$k.'"><div class="card-content"><input type="checkbox" id="Checkbox'.$k.'" /><span class="card-hyperlink'.$k.'" id="hrefing"><span class="mail-title1'.$k.'"><b>'.$row['complain_number'].'</b></span><span class="mail-description"><b>'.$row['subject'].'</b></span></span><button type= "button" id = "closed" class="'.$k.'"></button></div></div>';
      //    $sql4="Insert Into temp Select complain_number,subject,description From complaint_box; ";
      //    $result4=$con->query($sql4);
        $k++;
      }
    //}
    //  else {
    //    echo '<h1 class="no_mails"><center> No mails for you </center><h1>';
    //  }
    ?>
  </div>
</body>
</html>
