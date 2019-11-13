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


$sql = "select * from complaint_box where user_id = '".$_POST['uName']."' && inbox_read=1; ";
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

    var pageLimit=<?php echo $result->num_rows;?>;
    var emailsLeft = pageLimit;
    var i;

    $(document).ready(function() {
      var passNoDelete = -1;
      var clickedCardNo;
      for(i=1;i<=pageLimit;i++)
      {
        var pass1 = '.'+i;
        $(pass1).click(function(e) {
            var myClass = $(this).attr("class");
            var closePass1 = '.'+'card'+myClass;
            if(confirm("Want to delete?"))
              {
              //  var res_id=myClass.substr(4);
                var pass2 = '.'+'mail-title'+myClass;
                var val = parseInt($(pass2).text());
                location.href="closeCardStudent.php?c_num="+val+"&uName=<?php echo $_POST['uName']; ?>";
              }
              else {
                e.stopPropagation();
              }
        });
      }
      //var val = "<?php// echo $_POST['uName'];?>";
      for(i=1;i<=pageLimit;i++)
      {
        var pass1 = '.'+'card'+i;

        $(pass1).click(function() {
            var myClass = $(this).attr("class");
            var res_id=myClass.substr(4);
            var pass2 = '.'+'mail-title'+res_id;
            var val = parseInt($(pass2).text());
            $(".EmailList").load("MailReadStudent.php", {c_num: val, uName:"<?php echo $_POST['uName']?>"});
        });
      }
  });
  </script>
  <div class="EmailList">
    <?php
    $k = 1;
    if($result->num_rows){
      while($row=mysqli_fetch_array($result)){
      //  echo $row['complain_number']." ";
      //  echo $row['subject'];
      //  echo "<br>";
        echo '<div id="myCard" class="card'.$k.'"><div class="card-content"><span class="dot" id="dot'.$k.'"></span><span class="card-hyperlink'.$k.'" id="hrefing"><span class="mail-title'.$k.'"><b>'.$row['complain_number'].'</b></span><span class="mail-description"><b>'.$row['subject'].'</b></span></span><button type= "button" id = "closed" class="'.$k.'"></button></div></div>';
        ?>
        <script>
        var IsComplete = "<?php echo $row['solved_by'];?>";
        var disp = 'dot'+<?php echo $k;?>;
        if(IsComplete != "NONE"){
          document.getElementById(disp).style.background = 'rgba(0,255,0,0.75)';
        }
        </script>
        <?php
        $k++;
      }
    }
      else {
       echo '<h1 class="no_mails"><center> No mails for you </center><h1>';
     }
    ?>
  </div>
</body>
</html>
