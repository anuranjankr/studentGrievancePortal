<?php
session_start();
$_SESSION['user']='anuranjan.cse.1713@iiitbh.ac.in';//$_POST['uName2'];
$_SESSION['roll']=substr($_SESSION['user'],-17,-13);
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

  <link rel="stylesheet" href="css/complain.css">

  <link rel="shortcut icon" href="img/150dpi.png" type="image/x-icon" />
  <script src="js/3.4.1-jquery.min.js"></script>

</head>

<body>
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
    <form action="upload-manager.php" method="post" enctype="multipart/form-data" id = "submit-form">
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

      <textarea id="description" name="description" placeholder="Write something.." rows="6" style="white-space: pre-wrap;" required></textarea>

      <h5><input type="checkbox" id="agree1" name="agree1">&nbsp;Do You want to upload file in your support </h5>
      <input type="file" name="fileToUpload" id="fileToUpload">
      <input type="checkbox" id="agree2">
      <label>I hereby declare that the information/document provided above is correct.
         I shall be responsible for furnishing any wrong information/document.</label>
         <br>
    <input type="submit" value="Submit" style="margin-bottom:10px;" id="complain-button">
</body>
</html>
