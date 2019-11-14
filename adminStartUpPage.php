<?php
  session_start();
  $adminName=$_SESSION['user'];
  if(isset($adminName)==0){
      header('location:login_demo.html');
    }
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
<!--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  -->
  <link rel="stylesheet" href="css/centerNav.css">
  <link rel="stylesheet" href="css/section.css">
  <link rel="stylesheet" href="css/complain.css">

  <link rel="shortcut icon" href="img/150dpi.png" type="image/x-icon" />

  <link rel = "stylesheet" href ="css/EmailCards.css">
  <script src="js/3.4.1-jquery.min.js"></script>
  <script>
      $(document).ready(function(){
          $('.not-active').click(function(){
            var id = $(this).attr('id');
            if(id == 'Home'){
                document.getElementById("Home").className = "active";
                document.getElementById("ComplainComplete").className = "not-active";
                document.getElementById("EmailList2").style.display= "none";
                document.getElementById("EmailList2").style.width = "0";
                document.getElementById("EmailList2").style.height = "0";
                document.getElementById("EmailList").style.visibility = "visible";
                document.getElementById("EmailList").style.width = "inherit";
                document.getElementById("EmailList").style.height = "500px";

                $('.not-active').click(function(){
                  var id = $(this).attr('id');
                  if(id == 'Home'){
                      document.getElementById("Home").className = "active";
                      document.getElementById("ComplainComplete").className = "not-active";
                      document.getElementById("EmailList2").style.display = "none";
                      document.getElementById("EmailList2").style.width = "0";
                      document.getElementById("EmailList2").style.height = "0";
                      document.getElementById("EmailList").style.visibility = "visible";
                      document.getElementById("EmailList").style.width = "inherit";
                      document.getElementById("EmailList").style.height = "500px";
                  }
                  else if(id == 'ComplainComplete'){
                    document.getElementById("ComplainComplete").className = "active";
                    document.getElementById("Home").className = "not-active";
                    document.getElementById("EmailList").style.visibility = "hidden";
                    document.getElementById("EmailList").style.width = "0";
                    document.getElementById("EmailList").style.height = "0";
                    document.getElementById("EmailList2").style.display = "block";
                    document.getElementById("EmailList2").style.width = "inherit";
                    document.getElementById("EmailList2").style.height = "500px";
                  }
                });
            }
            else if(id == 'ComplainComplete'){
              document.getElementById("ComplainComplete").className = "active";
              document.getElementById("Home").className = "not-active";
              document.getElementById("EmailList").style.visibility = "hidden";
              document.getElementById("EmailList").style.width = "0";
              document.getElementById("EmailList").style.height = "0";
              document.getElementById("EmailList2").style.display = "block";
              document.getElementById("EmailList2").style.width = "inherit";
              document.getElementById("EmailList2").style.height = "500px";
              $('.not-active').click(function(){
                var id = $(this).attr('id');
                if(id == 'Home'){
                    document.getElementById("Home").className = "active";
                    document.getElementById("ComplainComplete").className = "not-active";
                    document.getElementById("EmailList2").style.display = "none";
                    document.getElementById("EmailList2").style.width = "0";
                    document.getElementById("EmailList2").style.height = "0";
                    document.getElementById("EmailList").style.visibility = "visible";
                    document.getElementById("EmailList").style.width = "inherit";
                    document.getElementById("EmailList").style.height = "500px";
                }
                else if(id == 'ComplainComplete'){
                  document.getElementById("ComplainComplete").className = "active";
                  document.getElementById("Home").className = "not-active";
                  document.getElementById("EmailList").style.visibility = "hidden";
                  document.getElementById("EmailList").style.width = "0";
                  document.getElementById("EmailList").style.height = "0";
                  document.getElementById("EmailList2").style.display = "block";
                  document.getElementById("EmailList2").style.width = "inherit";
                  document.getElementById("EmailList2").style.height = "500px";
                }
              });
            }
          });
      });
    </script>
</head>

<body >

  <div class="header-wrapper">
    <div class="site-name">
      <table><tr><td><a href="index.html"><img src="img/150dpi.png" height=80px></a></td><td><h1>भारतीय सूचना प्रौद्योगिकी संस्थान भागलपुर<br>Indian Institute of Information Technology Bhagalpur</h1></td></tr></table>
    </div>
  </div>
  <!-- Top navigation -->
<div class="topnav">
  <!-- Centered link -->
  <div class="topnav-centered">
    <a><h1>Student Grievance Portal</h1></a>
  </div>

  <!-- Left-aligned links (default) -->
  <a >Admin DashBoard</a>


  <!-- Right-aligned links -->
  <div class="topnav-right">
  <!--  <a href="login_demo.html">Logout</a>  -->
    <a href="login_demo.html" onclick="logout_admin()">Logout</a>
    <script>
      function logout_admin(){
        <?php session_destroy(); ?>
      }
    </script>
  </div>
</div>


<div class="row">

  <div class="column side" style="background-color:#f1f1f1;">

    <div class="container">
        <label for="usrName" ><h2>Hi <h4><?php echo $_SESSION['user'];?></h4></h2></label>
    </div>
    <br>
    <div class="active" id="Home">Inbox</div>
    <br>
  <div class="not-active" id="ComplainComplete">Complains Completed</div>


  </div>

  <div class="column middle" style="background-color:#bbb;">
    <div class="tab">

      <button type= "button" id ="go-back" class="back"></button><label for="category" style="padding-left:10px;"></label>
      <div class="search-container">
        <form action="resetPassAdmin.php?adName=<?php echo $adminName; ?>" method="post">
          <button type="submit"><span>Reset Password</span></button>
        </form>
     </div>
    </div>
    <div class="tab" style="height:80% ;">


    <div class="container">
      <div class="Email" id="EmailList"></div>
      <div class="Email2" id="EmailList2"></div>
    <script>
      var val="<?php echo $adminName;?>";
         $(document).ready(function() {
                $("#EmailList").load("EmailCards.php", {uName: val});
                $('.back').click(function(){
                    if($(".active").attr('id') == "Home")
                      $("#EmailList").load("EmailCards.php", {uName: val});
                    else if($(".active").attr('id') == "ComplainComplete")
                      $("#EmailList2").load("EmailCardsCompleted.php", {uName: val});
              });
         });
     </script>
     <script>
          $(document).ready(function() {
     $('#ComplainComplete').click(function(){
          $("#EmailList2").load("EmailCardsCompleted.php", {uName: val});
        });
        $('#Home').click(function(){
            $("#EmailList").load("EmailCards.php", {uName: val});
        });
    });
 </script>
  </div>

</div>

<div class="footer-box">
              Copyright &copy Indian Institute of Information Technology Bhagalpur
    </div>

</body>
</html>
