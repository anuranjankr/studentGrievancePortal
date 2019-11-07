<?php
  session_start();
  $usrName=$_SESSION['user'];
  //if(isset($_GET['user']))
    //$usrName=$_GET['user'];
  if(isset($usrName)==0){
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
              document.getElementById("submit-form").style.visibility = "hidden";
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
                    document.getElementById("submit-form").style.visibility = "hidden";
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
                    document.getElementById("submit-form").style.visibility = "visible";
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
                    document.getElementById("submit-form").style.visibility = "hidden";
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
              document.getElementById("submit-form").style.visibility = "visible";
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
                    document.getElementById("submit-form").style.visibility = "hidden";
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
                  document.getElementById("submit-form").style.visibility = "visible";
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
                  document.getElementById("submit-form").style.visibility = "hidden";
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
              document.getElementById("submit-form").style.visibility = "hidden";
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
                    document.getElementById("submit-form").style.visibility = "hidden";
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
                  document.getElementById("submit-form").style.visibility = "visible";
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
                  document.getElementById("submit-form").style.visibility = "hidden";
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
        <label for="usrName" ><h2>Hi <h4> <?php echo $usrName;?></h4></h2></label>
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
                    $('#disable').click(function(){
                        var name = $(this).attr('class');
                        if(name == "Complain")
                        {
                          document.getElementsByClassName("Complain")[0].id = "enable";
                          document.getElementsByClassName("Suggestion")[0].id = "disable";
                          document.getElementById("submit-form").style.display="block";
                          document.getElementById("suggestion-form").style.display="none";
                        }
                        else if(name == "Suggestion")
                        {
                          document.getElementsByClassName("Complain")[0].id = "disable";
                          document.getElementsByClassName("Suggestion")[0].id = "enable";
                          document.getElementById("submit-form").style.display="none";
                          document.getElementById("suggestion-form").style.display="block";
                        }
                    });
                  }
                  else if(name == "Suggestion")
                  {
                    document.getElementsByClassName("Complain")[0].id = "disable";
                    document.getElementsByClassName("Suggestion")[0].id = "enable";
                    document.getElementById("submit-form").style.display="none";
                    document.getElementById("suggestion-form").style.display="block";
                    $('#disable').click(function(){
                        var name = $(this).attr('class');
                        if(name == "Complain")
                        {
                          document.getElementsByClassName("Complain")[0].id = "enable";
                          document.getElementsByClassName("Suggestion")[0].id = "disable";
                          document.getElementById("submit-form").style.display="block";
                          document.getElementById("suggestion-form").style.display="none";
                        }
                        else if(name == "Suggestion")
                        {
                          document.getElementsByClassName("Complain")[0].id = "disable";
                          document.getElementsByClassName("Suggestion")[0].id = "enable";
                          document.getElementById("submit-form").style.display="none";
                          document.getElementById("suggestion-form").style.display="block";
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

      <!-- complain form -->

      <form action="upload-manager2.php?uName=<?php echo $usrName; ?>" method="post" enctype="multipart/form-data" id = "submit-form">
        <label for="sub">Subject</label>
        <input type="text" id="subject" name="subject" placeholder="Text Here" required>


        <label for="category">Category</label>

        <select id="category" name="category">
          <option value="hostel">Hostel</option>
          <option value="mess">Mess</option>
          <option value="academic">Academic</option>
          <option value="sports">Sports</option>
          <option value="others">Others</option>
        </select>

        <label for="description">Description</label>

        <textarea id="description" name="description" placeholder="Write something.." rows="6" required></textarea>

        <h5><input type="checkbox" id="agree1">&nbsp;Do You want to upload file in your support </h5>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="checkbox" id="agree2">
        <label>I hereby declare that the information/document provided above is correct.
           I shall be responsible for furnishing any wrong information/document.</label>
           <br>

      <input type="submit" value="Submit" style="margin-bottom:10px;" id="complain-button">


      <script>
        $(document).ready(function(){
          var fup= $('#fileToUpload');
          var btn= $('#complain-button');
          $(fup).attr('disabled','disabled');
          $(btn).attr('disabled','disabled');
          $('#agree1').click(function(){
              if($(fup).attr('disabled')) $(fup).removeAttr('disabled');
              else $(fup).attr('disabled','disabled');
          });
          $('#agree2').click(function(){
              if($(btn).attr('disabled')){
                  $(btn).removeAttr('disabled');
                }
              else $(btn).attr('disabled','disabled');
          });

        });

      </script>
  </form>

  <!-- suggestion form -->
  <form action="upload_suggestion.php?uName=<?php echo $usrName; ?>" method="post" enctype="multipart/form-data" id = "suggestion-form">
    <label for="sub">Subject</label>
    <input type="text" id="subject" name="subject" placeholder="Text Here" required>


    <label for="category">Category</label>

    <select id="category" name="category">
      <option value="hostel">Hostel</option>
      <option value="mess">Mess</option>
      <option value="academic">Academic</option>
      <option value="sports">Sports</option>
      <option value="others">Others</option>
    </select>

    <label for="description">Suggestion</label>

    <textarea id="description" name="description" placeholder="Write something.." rows="6" required></textarea>
    <br><br>
       <br>
  <input type="submit" value="Submit" style="margin-bottom:10px;" id="suggestion-button">

</form>
    <script>
        var val = "<?php echo $usrName;?>";
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
         });
     </script>
  </div>


</div>

<div class="footer">
  <p>Copyright(c) Indian Institute of Information Technology Bhagalpur</p>
</div>


</body>
</html>
