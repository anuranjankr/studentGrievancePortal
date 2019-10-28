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
                document.getElementById("EmailList").style.visibility = "visible";
                document.getElementById("submit-form").style.visibility = "hidden";
                document.getElementById("EmailList").style.width = "inherit";
                document.getElementById("EmailList").style.height = "500px";

                $('.not-active').click(function(){
                  var id = $(this).attr('id');
                  if(id == 'Home'){
                      document.getElementById("Home").className = "active";
                      document.getElementById("Compose").className = "not-active";
                      document.getElementById("EmailList").style.visibility = "visible";
                      document.getElementById("submit-form").style.visibility = "hidden";
                      document.getElementById("EmailList").style.width = "inherit";
                      document.getElementById("EmailList").style.height = "500px";
                  }
                  else if(id == 'Compose'){
                    document.getElementById("Compose").className = "active";
                    document.getElementById("Home").className = "not-active";
                    document.getElementById("EmailList").style.visibility = "hidden";
                    document.getElementById("EmailList").style.width = "0";
                    document.getElementById("EmailList").style.height = "0";
                    document.getElementById("submit-form").style.visibility = "visible";
                  }
                });
            }
            else if(id == 'Compose'){
              document.getElementById("Compose").className = "active";
              document.getElementById("Home").className = "not-active";
              document.getElementById("EmailList").style.visibility = "hidden";
              document.getElementById("EmailList").style.width = "0";
              document.getElementById("EmailList").style.height = "0";
              document.getElementById("submit-form").style.visibility = "visible";
              $('.not-active').click(function(){
                var id = $(this).attr('id');
                if(id == 'Home'){
                    document.getElementById("Home").className = "active";
                    document.getElementById("Compose").className = "not-active";
                    document.getElementById("EmailList").style.visibility = "visible";
                    document.getElementById("submit-form").style.visibility = "hidden";
                    document.getElementById("EmailList").style.width = "inherit";
                    document.getElementById("EmailList").style.height = "500px";
                }
                else if(id == 'Compose'){
                  document.getElementById("Compose").className = "active";
                  document.getElementById("Home").className = "not-active";
                  document.getElementById("EmailList").style.visibility = "hidden";
                  document.getElementById("EmailList").style.width = "0";
                  document.getElementById("EmailList").style.height = "0";
                  document.getElementById("submit-form").style.visibility = "visible";
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
    <a href="#logout">Logout</a>
  </div>

</div>


<div class="row">

  <div class="column side" style="background-color:#f1f1f1;">

    <div class="container">
        <label for="usrName" ><h2>Hi There</h2></label>
    </div>
    <br>
    <div class="active" id="Home">Home</div>
    <br>
    <div class="not-active" id="Compose">Compose Mail</div>


  </div>

  <div class="column middle" style="background-color:#bbb;">
    <div class="tab">

      <label for="category" style="padding-left:10px;"><button type= "button" id ="go-back" class="back"></button>Disable and enable</label>
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
      <form action="/action_page.php" method="post" enctype="multipart/form-data" id = "submit-form">
        <label for="sub">Subject</label>
        <input type="text" id="subject" name="subject" placeholder="Text Here">


        <label for="category">Category</label>

        <select id="category" name="category">
          <option value="hostel">Hostel</option>
          <option value="mess">Mess</option>
          <option value="academic">Academic</option>
          <option value="sports">Sports</option>
        </select>

        <label for="description">Description</label>

        <textarea id="description" name="description" placeholder="Write something.." rows="6"></textarea>

        <h5><input type="checkbox" name="agree1">&nbsp;Do You want to upload file in your support </h5>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="checkbox" name="agree2">
        <label>I hereby declare that the information/document provided above is correct.
           I shall be responsible for furnishing any wrong information/document.</label>
           <br>
      <input type="submit" value="Submit" style="margin-bottom:10px;">

  </form>
    <script>
         $(document).ready(function() {
                $("#EmailList").load("EmailCards.html");
                  $('.back').click(function(){
                       $("#EmailList").load("EmailCardsStudent.html");
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
