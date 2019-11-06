<?php
  session_start();
  if(isset($_SESSION['user'])==0){
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
              document.getElementById("Compose").className = "not-active";
              document.getElementById("Sent").className = "not-active";
              document.getElementById("MyForm").style.visibility = "hidden";
              document.getElementById("EmailListSent").style.display = "none";
              document.getElementById("EmailListSent").style.width = "0";
              document.getElementById("EmailListSent").style.height = "0";
              document.getElementById("EmailList").style.visibility = "visible";
              document.getElementById("EmailList").style.width = "inherit";
              document.getElementById("EmailList").style.height = "500px";
              document.getElementById("enable").style.display = "none";
              document.getElementById("disable").style.display = "none";

                $('.not-active').click(function(){
                  var id = $(this).attr('id');
                  if(id == 'Home'){
                    document.getElementById("Home").className = "active";
                    document.getElementById("Compose").className = "not-active";
                    document.getElementById("Sent").className = "not-active";
                    document.getElementById("MyForm").style.visibility = "hidden";
                    document.getElementById("EmailListSent").style.display = "none";
                    document.getElementById("EmailListSent").style.width = "0";
                    document.getElementById("EmailListSent").style.height = "0";
                    document.getElementById("EmailList").style.visibility = "visible";
                    document.getElementById("EmailList").style.width = "inherit";
                    document.getElementById("EmailList").style.height = "500px";
                    document.getElementById("enable").style.display = "none";
                    document.getElementById("disable").style.display = "none";
                  }
                  else if(id == 'Compose'){
                    document.getElementById("Compose").className = "active";
                    document.getElementById("Home").className = "not-active";
                    document.getElementById("Sent").className = "not-active";
                    document.getElementById("EmailList").style.visibility = "hidden";
                    document.getElementById("EmailList").style.width = "0";
                    document.getElementById("EmailList").style.height = "0";
                    document.getElementById("MyForm").style.visibility = "visible";
                    document.getElementById("EmailListSent").style.display = "none";
                    document.getElementById("EmailListSent").style.width = "0";
                    document.getElementById("EmailListSent").style.height = "0";
                    document.getElementById("enable").style.display = "inline-block";
                    document.getElementById("disable").style.display = "inline-block";
                  }
                  else if(id == 'Sent'){
                    document.getElementById("Compose").className = "not-active";
                    document.getElementById("Home").className = "not-active";
                    document.getElementById("Sent").className = "active";
                    document.getElementById("EmailList").style.visibility = "hidden";
                    document.getElementById("EmailList").style.width = "0";
                    document.getElementById("EmailList").style.height = "0";
                    document.getElementById("MyForm").style.visibility = "hidden";
                    document.getElementById("EmailListSent").style.display = "block";
                    document.getElementById("EmailListSent").style.width = "inherit";
                    document.getElementById("EmailListSent").style.height = "500px";
                    document.getElementById("enable").style.display = "none";
                    document.getElementById("disable").style.display = "none";
                  }
                });
            }
            else if(id == 'Compose'){
              document.getElementById("Compose").className = "active";
              document.getElementById("Home").className = "not-active";
              document.getElementById("Sent").className = "not-active";
              document.getElementById("EmailList").style.visibility = "hidden";
              document.getElementById("EmailList").style.width = "0";
              document.getElementById("EmailList").style.height = "0";
              document.getElementById("MyForm").style.visibility = "visible";
              document.getElementById("EmailListSent").style.display = "none";
              document.getElementById("EmailListSent").style.width = "0";
              document.getElementById("EmailListSent").style.height = "0";
              document.getElementById("enable").style.display = "inline-block";
              document.getElementById("disable").style.display = "inline-block";
              $('.not-active').click(function(){
                var id = $(this).attr('id');
                if(id == 'Home'){
                    document.getElementById("Home").className = "active";
                    document.getElementById("Compose").className = "not-active";
                    document.getElementById("Sent").className = "not-active";
                    document.getElementById("MyForm").style.visibility = "hidden";
                    document.getElementById("EmailListSent").style.display = "none";
                    document.getElementById("EmailListSent").style.width = "0";
                    document.getElementById("EmailListSent").style.height = "0";
                    document.getElementById("EmailList").style.visibility = "visible";
                    document.getElementById("EmailList").style.width = "inherit";
                    document.getElementById("EmailList").style.height = "500px";
                    document.getElementById("enable").style.display = "none";
                    document.getElementById("disable").style.display = "none";
                }
                else if(id == 'Compose'){
                  document.getElementById("Compose").className = "active";
                  document.getElementById("Home").className = "not-active";
                  document.getElementById("Sent").className = "not-active";
                  document.getElementById("EmailList").style.visibility = "hidden";
                  document.getElementById("EmailList").style.width = "0";
                  document.getElementById("EmailList").style.height = "0";
                  document.getElementById("EmailListSent").style.display = "none";
                  document.getElementById("EmailListSent").style.width = "0";
                  document.getElementById("EmailListSent").style.height = "0";
                  document.getElementById("MyForm").style.visibility = "visible";
                  document.getElementById("enable").style.display = "inline-block";
                  document.getElementById("disable").style.display = "inline-block";
                }
                else if(id == 'Sent'){
                  document.getElementById("Compose").className = "not-active";
                  document.getElementById("Home").className = "not-active";
                  document.getElementById("Sent").className = "active";
                  document.getElementById("EmailList").style.visibility = "hidden";
                  document.getElementById("EmailList").style.width = "0";
                  document.getElementById("EmailList").style.height = "0";
                  document.getElementById("MyForm").style.visibility = "hidden";
                  document.getElementById("EmailListSent").style.display = "block";
                  document.getElementById("EmailListSent").style.width = "inherit";
                  document.getElementById("EmailListSent").style.height = "500px";
                  document.getElementById("enable").style.display = "none";
                  document.getElementById("disable").style.display = "none";
                }
              });
            }
            else if(id == 'Sent'){
              document.getElementById("Compose").className = "not-active";
              document.getElementById("Home").className = "not-active";
              document.getElementById("Sent").className = "active";
              document.getElementById("EmailList").style.visibility = "hidden";
              document.getElementById("EmailList").style.width = "0";
              document.getElementById("EmailList").style.height = "0";
              document.getElementById("MyForm").style.visibility = "hidden";
              document.getElementById("EmailListSent").style.display = "block";
              document.getElementById("EmailListSent").style.width = "inherit";
              document.getElementById("EmailListSent").style.height = "500px";
              document.getElementById("enable").style.display = "none";
              document.getElementById("disable").style.display = "none";
              $('.not-active').click(function(){
                var id = $(this).attr('id');
                if(id == 'Home'){
                    document.getElementById("Home").className = "active";
                    document.getElementById("Compose").className = "not-active";
                    document.getElementById("Sent").className = "not-active";
                    document.getElementById("MyForm").style.visibility = "hidden";
                    document.getElementById("EmailListSent").style.display = "none";
                    document.getElementById("EmailListSent").style.width = "0";
                    document.getElementById("EmailListSent").style.height = "0";
                    document.getElementById("EmailList").style.visibility = "visible";
                    document.getElementById("EmailList").style.width = "inherit";
                    document.getElementById("EmailList").style.height = "500px";
                    document.getElementById("enable").style.display = "none";
                    document.getElementById("disable").style.display = "none";
                }
                else if(id == 'Compose'){
                  document.getElementById("Compose").className = "active";
                  document.getElementById("Home").className = "not-active";
                  document.getElementById("Sent").className = "not-active";
                  document.getElementById("EmailList").style.visibility = "hidden";
                  document.getElementById("EmailList").style.width = "0";
                  document.getElementById("EmailList").style.height = "0";
                  document.getElementById("EmailListSent").style.display = "none";
                  document.getElementById("EmailListSent").style.width = "0";
                  document.getElementById("EmailListSent").style.height = "0";
                  document.getElementById("MyForm").style.visibility = "visible";
                  document.getElementById("enable").style.display = "inline-block";
                  document.getElementById("disable").style.display = "inline-block";
                }
                else if(id == 'Sent'){
                  document.getElementById("Compose").className = "not-active";
                  document.getElementById("Home").className = "not-active";
                  document.getElementById("Sent").className = "active";
                  document.getElementById("EmailList").style.visibility = "hidden";
                  document.getElementById("EmailList").style.width = "0";
                  document.getElementById("EmailList").style.height = "0";
                  document.getElementById("MyForm").style.visibility = "hidden";
                  document.getElementById("EmailListSent").style.display = "block";
                  document.getElementById("EmailListSent").style.width = "inherit";
                  document.getElementById("EmailListSent").style.height = "500px";
                  document.getElementById("enable").style.display = "none";
                  document.getElementById("disable").style.display = "none";
                }
              });
            }
          });
      });
    </script>
</head>

<body style="overflow:hidden;">

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
  <a >User DashBoard</a>


  <!-- Right-aligned links -->
  <div class="topnav-right">
    <a href="login_demo.html" onclick="logout_user()">Logout</a>
    <script>
      function logout_user(){
        <?php session_destroy(); ?>
      }
    </script>
  </div>
</div>


<div class="row">

  <div class="column side" style="background-color:#f1f1f1;">

    <div class="container">
        <label for="usrName" ><h2>Hi <h4> <?php echo $_SESSION['user'];?></h4></h2></label>
    </div>
    <br>
    <div class="active" id="Home">Inbox</div>
    <br>
    <div class="not-active" id="Compose">Compose Mail</div>
    <br>
    <div class="not-active" id="Sent">Sent</div>


  </div>

  <div class="column middle" style="background-color:#bbb;">
    <div class="tab">
      <script>
          $(document).ready(function(){
              $('#disable').click(function(){
                  var name = $(this).attr('class');
                  if(name == "Complain")
                  {
                    document.getElementsByClassName("Complain")[0].id = "enable";
                    document.getElementsByClassName("Suggestion")[0].id = "disable";
                    document.getElementById("submit-form").style.display="block";
                    document.getElementById("suggestion-form").style.display="none";
                    $("#submit-form").load("complain_form.php",{uName: val});
                    $('#disable').click(function(){
                        var name = $(this).attr('class');
                        if(name == "Complain")
                        {
                          document.getElementsByClassName("Complain")[0].id = "enable";
                          document.getElementsByClassName("Suggestion")[0].id = "disable";
                          document.getElementById("submit-form").style.display="block";
                          document.getElementById("suggestion-form").style.display="none";
                          $("#submit-form").load("complain_form.php",{uName: val});
                        }
                        else if(name == "Suggestion")
                        {
                          document.getElementsByClassName("Complain")[0].id = "disable";
                          document.getElementsByClassName("Suggestion")[0].id = "enable";
                          document.getElementById("submit-form").style.display="none";
                          document.getElementById("suggestion-form").style.display="block";
                          $("#suggestion-form").load("suggestion_form.php",{uName: val});
                        }
                    });
                  }
                  else if(name == "Suggestion")
                  {
                    document.getElementsByClassName("Complain")[0].id = "disable";
                    document.getElementsByClassName("Suggestion")[0].id = "enable";
                    document.getElementById("submit-form").style.display="none";
                    document.getElementById("suggestion-form").style.display="block";
                    $("#suggestion-form").load("suggestion_form.php",{uName: val});
                    $('#disable').click(function(){
                        var name = $(this).attr('class');
                        if(name == "Complain")
                        {
                          document.getElementsByClassName("Complain")[0].id = "enable";
                          document.getElementsByClassName("Suggestion")[0].id = "disable";
                          document.getElementById("submit-form").style.display="block";
                          document.getElementById("suggestion-form").style.display="none";
                          $("#submit-form").load("complain_form.php",{uName: val});
                        }
                        else if(name == "Suggestion")
                        {
                          document.getElementsByClassName("Complain")[0].id = "disable";
                          document.getElementsByClassName("Suggestion")[0].id = "enable";
                          document.getElementById("submit-form").style.display="none";
                          document.getElementById("suggestion-form").style.display="block";
                          $("#suggestion-form").load("suggestion_form.php",{uName: val});
                        }
                    });
                  }
              });
        });
      </script>
      <button type= "button" id ="go-back" class="back"></button><div class="Complain" id="enable">Complain</div><div class="Suggestion" id="disable">Suggestion</div>
      <div class="search-container">
        <form action="/action_page.php">
          <input type="text" placeholder="Search.." name="search"style="width:84%;border-radius: 0px;padding-bottom:10px;">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
     </div>

    </div>
    <div class="tab" style="height:80% ;">


    <div class="container">
      <div class="Email" id="EmailList"></div>
      <div class="EmailSent" id="EmailListSent"></div>
      <div id="MyForm">
      <div class ="ComplainForm" id="submit-form"></div>
      <div class ="SuggestionForm" id="suggestion-form"></div>
    </div>

      <!--  complain form -->


      <!--  suggestion form -->


    <script>
         var val = "<?php echo $_SESSION['user'];?>";
         $(document).ready(function() {
                $("#EmailList").load("EmailCardsStudent.php",{uName: val});

                  $('.back').click(function(){
                      if($(".active").attr('id') == "Home")
                        $("#EmailList").load("EmailCardsStudent.php",{uName: val});
                      else if($(".active").attr('id') == "Sent")
                        $("#EmailListSent").load("EmailCardsSent.php",{uName: val});
                });
                $('#Sent').click(function(){
                    $("#EmailListSent").load("EmailCardsSent.php",{uName: val});
                });
                $('#Home').click(function(){
                    $("#EmailList").load("EmailCardsStudent.php",{uName: val});
                });
                $('#Compose').click(function(){
                    $("#submit-form").load("complain_form.php",{uName: val});
                });
         });
     </script>
  </div>


</div>

<div class="footer">
  <p>Copyright(c) Indian Institute of Information Technology Bhagalpur</p>
</div>


</body>
</html>
